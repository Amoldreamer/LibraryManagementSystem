<?php
include 'dbh.inc.php';
if (!isset($_SESSION)) {
    session_start();
}
class dbclass extends Dbh{
    
    public function verifyPassword($password){
        $stmt = $this->connect()->prepare("SELECT * FROM admin WHERE password = '$password';");
        $stmt->execute();
    
        $row = $stmt->fetch();
            $pwd = $row['password'];
    
    
    if($password == $pwd){
        header("Location:bookList.php");
    }
    else{
        $GLOBALS['wPass'] = 'Sorry your password does not match. Try again.';    
}
    }
    public function signup($fName,$sName,$address,$email,$username,$password,$cPassword){
        $stmt = $this->connect()->prepare("INSERT into admin(first_name, second_name, address, email, username, password) 
        values(:fName, :sName, :address, :email, :username, :password)");
        $stmt->execute(array(
            ":fName"=>$fName,
            ":sName"=> $sName,
            ":address"=> $address,
            ":email"=> $email,
            ":username"=> $username,
            ":password"=> $password
        ));        
        header("Location:welcome.php");
        
    }
    public function showBooks(){
        $stmt = $this->connect()->prepare("SELECT * FROM books");
            $stmt->execute();
            
                $i=0;
                while($rows = $stmt->fetch()){
                    $i++;
                    ?>
                    <form action="availability.php" method="POST">
                        <tr>
                        <td><?php echo $i;  ?></td>
                            <td><?php echo $rows['book']; ?></td>
                            <td><?php echo $rows['author']; ?></td>
                            <input type="hidden" name='id' value="<?php echo $rows['id']; ?>" >
                            <td><input type="submit" value="status" name="bStatus"></td>
                        </tr>
                    </form>
               <?php
                    }
            $stmt = null;
            
        ?>
        </table>
        <?php
    }
    public function deleteBook(){
        $stmt = $this->connect()->prepare("SELECT * FROM books");
            $stmt->execute();
            
                $i=0;
                while($rows = $stmt->fetch()){
                    $i++;
                    ?>
                    <form action="deleteData.php" method="POST">
                        <tr>
                        <td><?php echo $i;  ?></td>
                            <td><?php echo $rows['book']; ?></td>
                            <td><?php echo $rows['author']; ?></td>
                            <td><?php echo $rows['price']; ?></td>
                            <td><input type='hidden' name='id' value="<?php echo $rows['id']; ?>"></td>
                                <td><input type="submit" value="Delete" name="submit"></td>
                        </tr>
                    </form>
               <?php
                    }
            $stmt = null;
            
        ?>
        </table>
        <?php
    }
    public function insertBooks($book,$author,$price){
        $stmt = $this->connect()->prepare("INSERT into books(book, author, price) values(:book, :author, :price)");        
        $stmt->execute(array(
            ":book"=>$book,
            ":author"=> $author,
            ":price"=> $price
        ));
            echo "<h2 align=center style=color:red;>Book inserted successfully</h2>";
    }
    public function delete(){
        
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $stmt = $this->connect()->prepare("Delete FROM books WHERE id = '$id'");
                $stmt->execute();
                
            
        }
        echo "<h2 align=center;>Deleted Successfully</h2>";
    }
    public function editData(){
        $stmt = $this->connect()->prepare("SELECT * FROM books");
            $stmt->execute();
            
                $i=0;
                while($rows = $stmt->fetch()){
                       $i++;
                       ?>
                       <tr><form action=editData.php method=post>
                       <td><?php echo $i; ?></td>
                       <td><input type='text' name='lbook' value="<?php echo $rows['book']; ?>"></td>
                       <td><input type='text' name='lauthor' value="<?php echo $rows['author']; ?>"></td>
                       <td><input type='text' name='lprice' value="<?php echo $rows['price']; ?>"></td>
                       <td><input type='hidden' name='id' value="<?php echo $rows['id']; ?>"></td>
                       <td><input type='submit' name='submit'></td>
                       </form> </tr>

                              
               <?php
                }
                $stmt=null;
            }

    public function edit($book, $price, $author, $id){
        $stmt = $this->connect()->prepare("UPDATE books SET book='$book',price='$price', author='$author' WHERE id = '$id'");
        $stmt->execute();

    }
}
?>