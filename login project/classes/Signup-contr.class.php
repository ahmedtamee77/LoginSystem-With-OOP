<?php 
include_once("../classes/Signup.class.php");
class SignupContr extends Signup{
    private  $uid;
    private  $email;
    private  $pwd;
    private  $confPwd;

    public function __construct($uid , $email , $pwd , $confPwd){
        $this->uid = $uid;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->confPwd = $confPwd;


    }

    public function SignUpUser(){
        if($this->empty()==false){
            //echo "empty input ";
            header("location:../index.php?error=emptyinput");
        }
        if($this->invaildUid()==false){
            //echo "invaildUid ";
            header("location:../index.php?error=invaildUid");
        }
        if($this->invaildEmail()==false){
            //echo "invaildEmail ";
            header("location:../index.php?error=invaildEmail");
        }
        if($this->passMatch()==false){
            //echo "passMatch ";
            header("location:../index.php?error=passMatch");
        }
        if($this->takenUidOrEmail()==false){
            //echo "takenUidOrEmail ";
            header("location:../index.php?error=takenUidOrEmail");
        }
        $this->SetUser($this->uid , $this->email , $this->pwd );
    }
   
    //// check if there are any empty input;
    private function empty(){

        $result = true ; 

        if(empty( $this->uid ||$this->email || $this->pwd ||   $this->confPwd )){
            $result = false ; 
        }
        return $result; 
    }

    //// check username validation
    private function invaildUid(){
        $result = true; 
        if(preg_match("/^[a-zA-Z0-9]*$/", $this->uid )){
            $result = false ;
        }
        return $result;
    }
    //// check email validation
    private function invaildEmail(){
        $result = true; 
        if(filter_var($this->email , FILTER_VALIDATE_EMAIL)){
            $result = false ;
        }
        return $result;
    }
    //// check password match
    private function passMatch(){
        $result = true; 
        if($this->pwd!==$this->confPwd){
         $result = false ;
        }
        return $result;
    }


    private function takenUidOrEmail(){
        $result = true; 
        if($this->CheckUser($this->uid , $this->email)){
            $result = false ;
        }
        return $result;
    }
}