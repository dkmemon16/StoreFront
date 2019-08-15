<?php
 session_start();
 include 'Account.php';
 $conn = connect(); 
 if(isset($_POST['email'])){
     $email = strip_tags(mysqli_real_escape_string($conn, $_POST['email']));
     $password = strip_tags(mysqli_real_escape_string($conn, $_POST['passwd']));
     
     $result = VerifyAccount($email, $password);

     if ($result) {
         $_SESSION['logged_in_user_email'] = $email;
         header("Location: index.php");
     }
     else{
        echo 'Incorrect Email/Password';
     }
 }
 else{
     echo 'Error: No email entered';
 }
 ?>