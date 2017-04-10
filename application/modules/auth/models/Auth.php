<?php

class Auth_Model_Auth {
    protected $_name = "NguoiDung";
    protected $_primary ="ID_NGUOIDUNG";
    protected $db;
    
    public function __construct() {
        $this->db = Zend_Registry::get('db');
    }
    
    public function listNguoiDung() {
        $sql = $this->db->query("SELECT * FROM NguoiDung");   
        //var_dump($db);exit;
       // return $sql->fetchAll();
        /*return $this->fetchAll();*/
        return $sql->fetchAll();
    }
    /*public function getDanhSachNguoiDungTheoDieuKien(){
        $a = $this->select()->from("NguoiDung")->where("ID_NGUOIDUNG = ?","100");
        return $a->query()->fetchAll();
    }
    public function insertNguoiDung(){
        $data = array(
            "TEN_NGUOIDUNG"=>"Le Thi Trang"
        );
        $this->insert($data);
    }
     public function listNguoiDung2(){
        $result = $this->db->query("select * from nguoidung")->fetchAll();
        return $result;
    }*/

}  
    
   