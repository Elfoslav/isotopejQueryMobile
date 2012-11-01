<?php

use Nette\Database\Table\Selection,
    Nette\Database\Connection;

/**
 * Description of Orders
 *
 * @author Administrator
 */
class Role extends Selection {
    
    public function __construct(Connection $conn) {
	parent::__construct("role", $conn);
    }
}

?>
