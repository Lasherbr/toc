<?php
require_once "Db.class.php";
class User {
    public $id_user;
    public $user;

    public function Auth() {
        $Db = new Db;
        $qr = "select * from user where user = '$this->user' and password = sha1('$this->password')";
        $rs = $Db->m_query($qr);
        if($Db->m_num_rows($rs) > 0) {
            $Db->m_close();
            return true;
        }  else {
            $Db->m_close();
            return false;
        }
        
    }

}
?>