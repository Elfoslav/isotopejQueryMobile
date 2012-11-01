//document.ready
$(function() {
	if(typeof currentIsotope !== 'undefined') {
		$container = $(currentIsotope);
		$container.isotope({
			itemSelector : '.isotope-item'
		});
	}
	
	$('.relayout').on('click', function(e) {
		e.preventDefault();
		console.log('relayout clicked');
		if(typeof currentIsotope !== 'undefined') {
			$container = $(currentIsotope);
			$container.isotope('reLayout');
			console.log(currentIsotope);
		}
	});
});

$(document).ajaxComplete(function() {
	if(typeof currentIsotope !== 'undefined') {
		$container = $(currentIsotope);
		console.log('ajaxComplete');
		if($container.is(':hidden')) {
			//container needs to be visible in order to isotope work
			$container.show().trigger('updatelayout').isotope({
				itemSelector : '.isotope-item'
			});
		}
	//	$container.isotope({
	//		itemSelector : '.isotope-item'
	//	});
		$container.isotope('reLayout', function() {
			console.log($container);
		}).trigger('pagecreate');
		$('.relayout').trigger('click');
	}
});

$( document ).live( 'pageinit',function(event){
	//$('.relayout').trigger('click');
	$container = $(currentIsotope);
//	if($container.is(':hidden')) {
//		//container needs to be visible in order to isotope work
//		$container.show();
//	}
//	$container.isotope({
//		itemSelector : '.isotope-item'
//	});
//	$container.isotope('reLayout', function() {
//		console.log($container);
//	});
});