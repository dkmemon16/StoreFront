<?php
require_once('Connection.php');
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
//functions
function ExistingCard($email){
    $conn = connect();
    $sql = "SELECT ccnumber FROM CreditCards WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if ($result->num_rows > 0) {
        return "************". substr($row["ccnumber"], -4);
    }
    else 
        return false;
}

function GetCard($email){
    $conn = connect();
    $sql = "SELECT ccnumber FROM CreditCards WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if ($result->num_rows > 0) {
        return $row["ccnumber"];
    }
    else
        return false;
}

function DeleteAllCreditCards($email){
    $conn = connect();
    $sql = "DELETE FROM CreditCards WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result;
}

function InsertCreditCard($ccnumber, $cardname, $ccv, $expdate, $billingaddress, $email){
    $conn = connect();
    DeleteAllCreditCards($email);
    $sql = "INSERT INTO CreditCards VALUES ('$ccnumber', '$cardname', '$ccv', '$expdate', '$billingaddress', '$email')";    
    $result = $conn->query($sql);
    return $result;
    
}


?>