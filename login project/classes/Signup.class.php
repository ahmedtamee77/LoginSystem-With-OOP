
<?php 

include_once("../classes/Dbh.class.php");
class Signup extends Dbh{

    protected function SetUser($uid, $email ,$pwd ){
        $stmt = $this->connect()->prepare(" INSERT INTO user(user_uid , user_mail , user_pass) VALUE (? , ? , ?);");

        $hashPwd = password_hash($pwd , PASSWORD_DEFAULT); 
        if(!$stmt->excute(array($uid, $hashPwd, $email))){
            $stmt = null; 
            header("location:../index.php?error=stmtfaild");
            exit();
        }
        $checkresult= true; 
        if($stmt->rowcount()>0){
            $checkresult = false; 
        }
        return $checkresult;
        
    }
    protected function CheckUser($uid , $email){
        $stmt = $this->connect()->prepare("SELECT user_uid FROM users WHERE  user_uid = ? OR user_mail = ? ");
        if(!$stmt->excute(array($uid, $email))){
            $stmt = null; 
            header("location:../index.php?error=stmtfaild");
            exit();
        }
        $checkresult= true; 
        if($stmt->rowcount()>0){
            $checkresult = false; 
        }
        return $checkresult;
    }

}