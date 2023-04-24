<?php 
//include_once("include/myautoload.inc.php");
if(isset($_POST["submit"])){
    /// grab data from index page;
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $confPwd = $_POST["confPwd"];
    include_once("../classes/Dbh.class.php");
    include("../classes/signup.class.php");
    include("../classes/signup-contr.class.php");
    $singup = new SignupContr($uid , $email , $pwd , $confPwd);
    $singup->SignUpUser();
    header("location:../index.php?error=none");
}