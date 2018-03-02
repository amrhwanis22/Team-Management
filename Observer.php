<?php
require_once 'PatternObserver.php';

abstract class Observer
{
    
    abstract function Update(Subject $_Subject_In); 
    abstract function Query($_SQL);
}

?>
