<link rel="stylesheet" href="css/bookList.css" type="text/css" />

<header>
    <?php
    include "dbclass.php";
    include "adminmenu.php";

    $db=new dbclass;
?>
</header>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div id="available" style="height:150px">
        <form action="" method="POST">
            <label>Name of book</label>
            <input type="text" name="book"><br><br>
            <label>Author</label>
            <input type="text" name="author"><br><br>
            <label>Price</label>
            <input type="text" name="price"><br><br>
            <input type="submit" name="submit" value="submit">
        </form>
</div>
    </body>
</html>
<?php
    if(isset($_POST['submit'])){
        $book = $_POST['book'];
        $author = $_POST['author'];
        $price = $_POST['price'];

       $db->insertBooks($book,$author,$price);
    }
?>