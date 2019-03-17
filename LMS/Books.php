<?php
include 'dbh.inc.php';

if(isset($_SESSION['password'])){

}else{
    header('location:User.php');
}
class Books extends Dbh{
    public function availability($id){
        $stmt = $this->connect()->prepare("SELECT * FROM books WHERE id='$id'");
        $stmt->execute();

        $row = $stmt->fetch();
        if($row['bookReserve'] == 'y'){
            echo '<h3 style="color:red">The book is reserved</h3>';
            return;
        }
?>
<form action="burrowBook.php" method="POST">
<tr>
    <td><?php echo $row['book']; ?></td>
    <td style="padding-left:20px"><?php echo $row['author']; ?></td>
    <td><input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <td><input type="submit" name="burrow" value="<?php echo $row['status']; ?>"/>
</tr>
</form>
</table>
<?php
return $row['status'];
    }
    public function updateStatus($id,$status){
        
        $stmt = $this->connect()->prepare("UPDATE books SET status='$status' WHERE id = '$id'");
        $result = $stmt->execute();
        return $result;
    }
    public function updateDate($d, $id){

        $stmt = $this->connect()->prepare("UPDATE books SET Issue_date = '$d' WHERE id = '$id'");
        $stmt->execute();
        }
    public function issueDate($id){
        $stmt = $this->connect()->prepare("SELECT * FROM books WHERE id = '$id'");
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['Issue_date'];
    }
    public function updateRetDate($rDate, $id){

        $stmt = $this->connect()->prepare("UPDATE books SET Return_date = '$rDate' WHERE id = '$id'");
        $stmt->execute();
        }
    public function returnDate($id){
        $stmt = $this->connect()->prepare("SELECT * FROM books WHERE id = '$id'");
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['Return_date'];
        }
    public function bookReserve($id){
        $stmt = $this->connect()->prepare("UPDATE books SET bookReserve = 'y' WHERE id = '$id'");
        $stmt->execute();
    }
    public function showReserve($id){
        $stmt = $this->connect()->prepare("SELECT * FROM books WHERE id = '$id'");
        $stmt->execute();
        $row = $stmt->fetch();?>
        <td><?php echo $row['book']; ?></td>
        <td style="padding-left:20px;"><?php echo $row['author']; ?></td><?php
    }
}