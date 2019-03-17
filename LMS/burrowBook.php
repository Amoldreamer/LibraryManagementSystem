<link rel="stylesheet" href="css/bookList.css" type="text/css" />
<header><?php
include 'Books.php';
include 'menu.php';
session_start();
$bk = new Books;

if(isset($_POST['burrow'])){
    $id = $_POST['id'];
    $status = 'Not Available';
}
$result = $bk->updateStatus($id, $status);
if($result){
    $d = date("Y/m/d");
    $rDate = date('Y-m-d',strtotime($d. ' +30 days'));
    $bk->updateDate($d,$id);
    $iDate = $bk->issueDate($id);
    $rDate = $bk->updateRetDate($rDate,$id);
    $return = $bk->returnDate($id);
    $borrower = $_SESSION['username'];

?>
</header>
<div id="available" style="margin-top:50px; height:100px">
    <table>
        <tr>
            <td>Borrower's Name:</td>
        </tr>
        <tr>
            <td><?php echo $borrower; ?></td>
        <tr>
            <td>Issue Date</td>
            <td>Return Date</td>
        </tr>
        <tr>
            <td><?php echo $iDate; ?></td>
            <td><?php echo $return; ?></td>

        </tr>
    </table>
</div>
    <?php
}