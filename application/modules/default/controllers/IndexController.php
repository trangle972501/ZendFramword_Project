<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexController extends Zend_Controller_Action{
    public function indexAction(){
    	$this->view->text = 'Default Action';
    } 
}

