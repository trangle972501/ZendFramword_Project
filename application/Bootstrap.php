<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initAutoLoad() {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            "namespace" => "",
            "basePath" => dirname(__FILE__),
        ));
        return $autoloader;
    }

    protected function _initDatabase() {
        $db = $this->getPluginResource('db')->getDbAdapter();
        zend_Registry::set('db', $db);
    }

    protected function _initErrorHandle() {
        $front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new Zend_Controller_Plugin_ErrorHandler(array(
            'module' => 'error',
            'controller' => 'error',
            'action' => 'error'
        )));
    }

}
