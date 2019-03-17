<?php
if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['password'])){

}else{
    header('location:User.php');
}
?>

<style>
    div a{
        text-decoration:none;
        padding:10px;
        margin-top:10px;
        color:white;
    }
</style>
<div align="right">
    <br><a href="bookList.php" >View</a>
    <a href="logout.php" >Logout</a>
    

</div>