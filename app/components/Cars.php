<?php

use Nette\Application\UI,
    Nette\Database\Table\Selection;

/**
 * Description of TaskList
 *
 * @author Administrator
 */
class Cars extends UI\Control {
    
    /** @var \Nette\Database\Table\Selection */
    private $cars;
    
    /** @var Cars */
    private $table;
    
    public function __construct(Selection $cars) {
        parent::__construct();
        $this->cars = $cars;
    }
    
    public function render()
    {
        $this->template->setFile(__DIR__ . '/Cars.latte');
		if($this->presenter->isAjax()) {
			$this->template->cars = $this->cars->get(1);
		} else {
			$this->template->cars = $this->cars;
		}
        $this->template->render();
    }
    
    public function handleMarkDone($taskId) {
        $this->table->where(array('id' => $taskId))->update(array('done' => 1));
        if(!$this->presenter->isAjax()) {
            $this->presenter->redirect('this');
        } else {
            $this->invalidateControl();
        }
    }
}

?>
