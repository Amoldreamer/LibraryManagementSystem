<?php
if(isset($_SESSION['password'])){

}else{
    header('location:admin.php');
}
?>

<div style="float:right;margin-top:50px">
<a style="text-decoration:none; color:white;padding:10px" href="edit.php">Edit</a>
<a style="text-decoration:none; color:white;padding:10px" href="insert.php">Insert</a>
<a style="text-decoration:none; color:white;padding:10px" href="delete.php">Delete</a>
<a style="text-decoration:none; color:white;padding:10px" href="logout.php" >Logout</a>

</div>