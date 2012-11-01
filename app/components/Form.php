<?php

use Nette\Application\UI,
    Nette\Database\Table\Selection;

/**
 * Description of TaskList
 *
 * @author Administrator
 */
class MyForm extends UI\Control {
    
    public function __construct($name = null, $parent = null) {
        parent::__construct($name, $parent);
    }
    
    public function render()
    {
        $this->template->setFile(__DIR__ . '/form.latte');
		
		$this->template->render();
    }
	
	protected function createComponentNameForm($name) {
		$form = new UI\Form();
		$form->getElementPrototype()->class('ajax');
		$form->addText('name', 'Name');
		$form->addSubmit('submit', 'Submit');
		$form->onSuccess[] = callback($this, 'formSubmit');
		return $form;
	}
	
	public function formSubmit($form) {
		$values = $form->getValues(true);
		$payload = $this->presenter->getPayload();
		$payload->name = $values['name'];
		$template = $this->presenter->getTemplate();
		$template->name = $values['name'];
		$this->presenter->invalidateControl();
		$this->invalidateControl();
		//$this->presenter->sendPayload();
	}
}

?>
