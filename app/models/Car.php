<?php

use Nette\Database\Table\Selection,
    Nette\Database\Connection;

/**
 * Description of Orders
 *
 * @author Administrator
 */
class Car extends Selection {
    
    public function __construct(Connection $conn) {
		parent::__construct("cars", $conn);
    }
}

?>
