<?php
include 'Connection.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//verify function
function VerifyAccount($email, $password){
    $sql = "SELECT email, passwd AS hashed_password FROM Accounts WHERE email = '$email'";
    $conn = connect();
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if ($result->num_rows > 0) {
        if(password_verify($password, $row['hashed_password'])){
            return true;
        }
        else{
            return false;
        }
    }
    else
        return false;
      
}

//insert into db function
function InsertAccount($email, $hashed_password, $name, $address){
    $conn = connect();
    $sql = "INSERT INTO Accounts(email, passwd, name, address) VALUES ('$email', '$hashed_password', '$name', '$address')";
    return  ($conn->query($sql) === TRUE);

}

//retrieve account function
function ReteiveAccount($email){
    $conn = connect();
    $sql = "SELECT name, address FROM Accounts WHERE email = '$email'";
    
    
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if ($result->num_rows > 0) {
            return array($row["name"], $row["address"]);
        }
        else{
            return false;
        }

}
//alter function 
function UpdateAccount($password, $email, $name, $address) {
    $conn = connect();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE Accounts SET passwd='$hashed_password', name='$name', address='$address' WHERE email ='$email'";
    if( ($conn->query($sql) === TRUE )){
        return true;
    }
    else{
        return false;
    }
    
}