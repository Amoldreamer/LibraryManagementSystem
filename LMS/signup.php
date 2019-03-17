<?php
    include "dbclass.php";
    $db = new dbclass;
?>
<?php  
    
    if(isset($_POST['submit'])){
        $fName = $_POST['fName'];
        $sName = $_POST['sName'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cPassword = $_POST['cPassword'];

        if(empty($fName)||empty($sName)||empty($address)||empty($email)||empty($username)||empty($password)||empty($cPassword)){
            echo '<h4 style="color:red" align="center">All fields must be filled</h4>';
            
        }
        elseif(strlen($password) <=8){
            echo '<h4 style="color:red" align="center">Password must be at least 8 characters in length </h4>';
            }
        elseif(!preg_match('/[a-z]+[A-Z]+[0-9]+[@!£$%&*_+]+/',$password)){
            echo '<h4 style="color:blurede" align="center">Password must have at least a letter an uppercase, a number and a character </h4>';
        }     
        elseif($password != $cPassword){
            echo '<h4 style="color:red" align="center">Your passwords do not match. Try again </h4>';
        }   
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<h4 style="color:red" align="center">Invalid Email</h4>';

        }
        else{
        $db->signup($fName,$sName,$address,$email,$username,$password,$cPassword);

        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Signup page</title>
        <link rel="stylesheet" href="css/signup.css" type="text/css" />
    </head>
    <body>
        <div >
            <div id="register">
            <h2 style="color:rgb(255,82,56)">Please fill in the following form</h1>
            <form action="" method="POST">
                <input type="text" name="fName" placeholder="First Name" value="<?php echo isset($_POST['fName']) ? $_POST['fName'] : '' ?>" ><br><br>
                <input type="text" name="sName" placeholder="Second Name" value="<?php echo isset($_POST['sName']) ? $_POST['sName'] : '' ?>"><br><br>
                <input type="text" name="address" placeholder="Address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"><br><br>
                <input type="text" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"><br><br>
                <input type="text" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"><br><br>
                <input type="password" name="password" placeholder="Password"><br><br>
                <input type="password" name="cPassword" placeholder="Confirm Password"><br><br>
                <button name="submit">Submit</button>
            </form>
            </div>
        </div>
    </body>
</html>
