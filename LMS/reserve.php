<link rel="stylesheet" href="css/bookList.css" type="text/css" />
<header><?php
include 'Books.php';
include 'menu.php';
$bk=new Books;
if(isset($_POST['res'])){
    $id = $_POST['id'];
    $bk->bookReserve($id);
}
?>
</header>

    <body>
        <div id="available">
            <h2>Your book has been reserved</h2>
            <table>
                <tr>
                    <td>Book</td>
                    <td style="padding:20px">Author</td>
                </tr>
                <tr>
                    <?php
                    $bk->showReserve($id);
                    ?>
                </tr>
            </table>
        </div>
    </body>
</html>