<?php
include 'dbh.inc.php';
session_start();
class adminclass extends Dbh{
    
    public function checkPassword($password){
        $stmt = $this->connect()->prepare("SELECT * FROM admin WHERE password = '$password';");
        $stmt->execute();
    
        $row = $stmt->fetch();
            $pwd = $row['password'];
    
    
    if($password == $pwd){
        header("Location:edit.php");
    }
    else{
        $GLOBALS['wPass'] = 'Sorry your password does not match. Try again.';    
}
    }
   
}
?>