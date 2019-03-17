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
    <title>bookList</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
        <div id="available" style="margin-top:200px;">
            <table align="center">
            <h1 align="center">List of books available</h1>
                <tr>
                <td>S.No</td>
                    <td>book</td>
                    <td>Author</td>
                    <td>Price</td>
                </tr>
            
        
        <?php
            $db->deleteBook();
            
        ?>
        </table>
</div>
    </body>
</html>