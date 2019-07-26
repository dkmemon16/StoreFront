<?php
//Query the database
echo '<h1>Create Account Result</h1>';

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
 $name = $_POST['name'];
 $address = $_POST['address'];
 $creditcard = $_POST['creditcard'];
 
 $sql = "INSERT INTO Accounts VALUES ('$email', '$passwd', '$name', '$address', $creditcard)";

 $result = $conn->query($sql) === TRUE;
 if ($result) {
     echo 'Account Created';
 }
 else {
     echo 'Account Not Created';
 }

 ?>