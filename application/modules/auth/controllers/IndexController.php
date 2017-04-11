<?php

//require '/auth/models/AuthModel.php';
class Auth_IndexController extends Zend_Controller_Action {

    public function indexAction() {
        $authModel = new Auth_Model_Auth();
        // tra ve danh sach nguoi dung trong bang NguoiDung.
        $paginator = Zend_Paginator::factory($authModel->listNguoiDung());
        $paginator->setItemCountPerPage(4);
        $paginator->setPageRange(4);
        $currentPage = $this->_request->getParam('page', 1);
        $paginator->setCurrentPageNumber($currentPage);
        $this->view->data = $paginator;
//        $data = $authModel->listNguoiDung();
//            echo "<pre>";
//            print_r($data);
//            echo "<pre>";
//        $auth = Zend_Auth::getInstance();
//        if( $auth->hasIdentity() )
//         {
//              $infoUser = $auth->getIdentity();
//              $this->view->EMAIL = $infoUser->EMAIL;
//         }
//
    }

    public function loginAction() {

        //$params = $this->getRequest()->getParams();

        if ($this->getRequest()->getParam("username") != NULL && $this->getRequest()->getParam("username") != "") {
            $request = $this->getRequest()->getParams(); //getParams() lấy dữ liệu
            $user = $request['username'];
            $pass = $request['password'];

            $auth = Zend_Auth::getInstance();
            if ($auth->getIdentity()) {
                $adapter = new Zend_Auth_Adapter_DbTable();
                $adapter->setTableName("NguoiDung");
                $adapter->setIdentityColumn("EMAIL");
                $adapter->setCredentialColumn("MAT_KHAU");

                $adapter->setIdentity($user);
                $adapter->setCredential($pass);

                //$adapter->setCredentialTreatment("md5(?)");//Max hóa password

                if ( $auth->authenticate($adapter)->isValid()) {
                    //Chung thuc thanh cong
                    echo "successfully";
                    exit;
                    $getUserData = $adapter->getResultRowObject(array(null,'EMAIL'));
                    $getUserData = $adapter->getResultRowObject(array('DIEN_THOAI','TEN_NGUOI_DUNG'));
                    $auth->getStorage()->write($getUserData);
                } else {
                    echo "Fail";
                }
            } else {
                //var_dump($auth->getIdentity());exit;
                $this->redirect("/auth/index/index");
            }
        }
    }

    public function logoutAction() {
        Zend_Auth::getInstance()->clearIdentity();
        $this->redirect('/auth/index/login');
    }

}
