<html>
<head>
<title>Checkout</title>
<h1>Checkout</h1>
</head>

<?php

include 'CreditCard.php';
//include 'Orders.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$email = $_SESSION['logged_in_user_email'];
$existing = ExistingCard($email);
$cc = "<button onclick='location.href =&apos;AddCreditCard.php&apos;'>No</button>";
$da = "<button onclick='location.href =&apos;DeliveryAddress.php&apos;'>Yes</button> ";

if($existing != false){
    echo "Would you like to use your last used card: $existing ? <br>";    
    //if yes, skip to next step, go to delivery address page
    echo $da. "<br>";
       
    //if no, go to add credit card page
    echo $cc. "<br>";    
}
else{
    //echo "You have no existing card linked to your account. <br>"; 
    //go to add credit card page
    header("Location: AddCreditCard.php");
}
?>
</html>