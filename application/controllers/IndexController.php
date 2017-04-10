<?php 
class IndexController extends Zend_Controller_Action{ 
    public function indexAction(){
    	$a = 1;
    	$b = 2;
    	$c = $a + $b;
    	$this->view->sum = $c;
    } 
}
