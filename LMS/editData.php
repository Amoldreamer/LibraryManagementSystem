<link rel="stylesheet" href="css/bookList.css" type="text/css" />
<header>
<?php
    include "dbclass.php";
    $db=new dbclass;

?>
</header>

<?php
if(isset($_POST['submit'])){
    $book = $_POST['lbook'];
    $price = $_POST['lprice'];
    $author = $_POST['lauthor'];
    $id = $_POST['id'];
    
    $db->edit($book, $price, $author, $id);    
}
?>
<div style="height:30px" id="available">Updated Successfully</div>
