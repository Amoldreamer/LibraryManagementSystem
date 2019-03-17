<!DOCTYPE html>
<html>
    <head>
    <title>bookList</title>
    <link rel="stylesheet" type="text/css" href="css/bookList.css">
    <link rel="stylesheet" type="text/css" href="css/availability.css">

</head>
    <body>
        <header>
        <?php
            include 'Books.php';
            include 'menu.php';

            $bk=new Books;
        ?>
        </header>
        <?php
if(isset($_SESSION['password'])){

}else{
    header('location:User.php');
}
if(isset($_POST['id'])){
    $id = $_POST['id'];
}?>
<section id="design">
<table>
    <tr>
    <td><strong>Book</strong></td>
    <td style="padding-left:20px"><strong>Author</strong></td>
    </tr>
    <?php
$status = $bk->availability($id);

if($status == 'Not Available'){
    ?>
    <form action="reserve.php" method="POST">
        <table>
            <tr>      
                 <br>Do you want to reserve the book?
                 <input style="margin-left:100px" type="submit" name="res" value="reserve" />
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
            </tr>
        </table>
    </form>
    <a href="bookList.php" style="text-decoration:none;color:red">No Thanks</a>
    <?php
    
}
?>
</section>
    </body>
</html>









