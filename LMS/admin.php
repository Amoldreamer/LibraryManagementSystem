<?php
include 'adminclass.php';

$ac = new adminclass;
global $error;
global $wPass;
?>

<?php
    if(isset($_POST['submit'])){
        if($_POST['username']!="" || $_POST['password']!=""){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;

        $ac->checkPassword($password);
        }
        else{
            $error="The username and password must be filled";
        }
        
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/user.css" type="text/css" />
        <title>Library Management System</title>
    </head>
    <body>
    
    <div class="loginbox">
        <img src="Images/login.png" class="login" />
        <form action="admin.php" method="POST">
    <div >
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <label>Login:</label><br>
        <input style="margin-left:50px; margin-top:15px;" type="submit" value="Login" name="submit"><br><br>
        <label style="margin-left:-20px; margin-top:15px;">Not a member?</label><br><br>
        <a style="margin-left:55px; margin-top:30px;color:red" href="signup.php">Signup</a><br><br>
        <label style="margin-left:-100px; margin-top:15px; font-size:15px;">
        <?php echo $error;
            echo $wPass;
        ?>        
        </label>
    </div>
    </form>
    </div>
    </body>
</html>
