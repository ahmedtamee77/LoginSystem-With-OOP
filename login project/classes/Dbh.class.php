<?php 
class Dbh{
    protected function connect(){

        try {
            $username = "root"; 
            $password = ""; 
            $pdo = new PDO('mysql:host=localhost;dbName=logingsystem',$username, $password );
        } catch (PDOException $e) {
            echo "Error!:".$e->getMessage() . "<br>";
        }
    }
}