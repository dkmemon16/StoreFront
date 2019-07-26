<?php
//Query the database
echo '<h1>Login Result</h1>';

$dbServerName = "dkmpi.hopto.org";
$dbUsername = "remoteUser";
$dbPassword = "GoodThinking45!";
$dbName = "StoreFront";

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

# check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
# echo "Connected successfully";
?>
 
 <?php 
 // check if it exists
 
 $email = $_POST['email'];
 $passwd = $_POST['passwd'];
 $sql = "SELECT email FROM Accounts WHERE email = '$email'  AND passwd = '$passwd'";

 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
     echo 'Login Successful';
 }
 else 
     echo 'Login Failed';

 ?>