<?php
class Application_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{

     public function preDispatch(Zend_Controller_Request_Abstract $request) {
       
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $redirector->goToUrlAndExit('/login');
        }
    }
}