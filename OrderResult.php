<html>
<title>Order Finalized</title>
<h1>Order Finalized</h1>
</head>
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include 'CreditCard.php';
include 'Orders.php';

$address = $_POST['deliveryaddress']. " ". $_POST['city']. ", ". $_POST['state']. " ". $_POST['zipcode'];
$total = GetTotal($_SESSION['logged_in_user_email']);
$orderdate = date("Y-m-d");
$creditcard = GetCard($_SESSION['logged_in_user_email']);
$result = InsertOrder($_SESSION['logged_in_user_email'], $total, $orderdate, $creditcard, $address);


$orderID = GetLastOrderID($_SESSION['logged_in_user_email']);
if($result){
    echo "Your order has been placed. <br> Your Order ID is #$orderID <br>";
}
else{
    echo "There was an error processing your order. <br>";
}

?>
<button onclick="location.href ='index.php'">Return to Home</button>
</html>