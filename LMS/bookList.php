<!DOCTYPE html>
<html>
    <head>
    <title>bookList</title>
    <link rel="stylesheet" type="text/css" href="css/bookList.css">
    </head>
    <body>
        <header><?php
    include_once "menu.php";
    include_once "dbclass.php";
    $db = new dbclass;
    
    // if(isset($_SESSION['username'])){
        echo '<font color="green">Welcome '.$_SESSION['username'].'</font>';
    // }else{
    //     header('location:user.php');
    // }
?>
            <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="search">
                <button type="submit" name="submit">Search</button>
            </form>
        </header>
        <div id="available" style="margin-top:150px">
            <table align="center" >
            <h1 align="center">List of books available</h1>
                <tr>
                <td>S.No</td>
                    <td>book</td>
                    <td>Author</td>
                </tr>
            
        
        <?php
            $db->showBooks()
        ?>
        </div>
    </body>
</html>