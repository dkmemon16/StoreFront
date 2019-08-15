 <?php
 include 'Account.php';
 
 $email = $_POST['email'];
 $password = $_POST['passwd'];
 $name = $_POST['name'];
 $address = $_POST['address'];
 $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 

 $result = InsertAccount($email, $hashed_password, $name, $address);
 if ($result) {
     echo 'Account Created';
 }
 else {
     echo 'Account Not Created';
 }

 ?>