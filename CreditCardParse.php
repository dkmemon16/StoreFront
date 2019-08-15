<?php
include 'CreditCard.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if(InsertCreditCard($_POST["ccnumber"], $_POST["acctname"], $_POST["ccv"], $_POST["expdate"], $_POST["billingaddress"], $_SESSION['logged_in_user_email'])){
    header("Location: DeliveryAddress.php");
}
else{
    echo '<script> alert("Invalid Credit Card") </script>';
    header("refresh:0; url= AddCreditCard.php");
    
}
?>
