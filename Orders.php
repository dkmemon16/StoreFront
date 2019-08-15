<?php
require_once('Cart.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//functions

//GetLastOrderID()
function GetLastOrderID($email){
    $conn = connect();
    $sql = "SELECT MAX(orderID) as orderID FROM Orders WHERE accountEmail= '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row["orderID"];
}
function InsertOrder($email, $total, $orderdate, $creditcard, $address){
    $conn = connect();
    $sql = "INSERT INTO Orders(accountEmail, orderTotal, orderDate, creditCard, deliveryaddress) VALUES ('$email', '$total', '$orderdate', '$creditcard', '$address')";
    $result = $conn->query($sql);
    
    $sql2 = "SELECT itemSKU, quantity FROM Cart WHERE accountemail= '$email'";
    $orderID = GetLastOrderID($email);
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        while($row2 = $result2->fetch_assoc()) {
            $sql3 = "INSERT INTO ItemsInOrders VALUES ('$orderID', ". $row2['itemSKU']. ", " . $row2['quantity']. ")";
            $conn->query($sql3);
        }
    }
    EmptyCart($email);
    if($email == "guest"){
        DeleteAllCreditCards("guest");
        //$sql2 = "DELETE FROM Orders WHERE accountEmail= 'guest'";
       // $conn->query($sql2);
    }
    return  $result;
}




//GetTotal()
function GetTotal($email){
    $conn = connect();
    $sql = "SELECT itemSKU, quantity FROM Cart WHERE accountemail = '$email'";
    $subtotal = 0;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $sku = $row["itemSKU"];
            $sql2 = "SELECT price FROM Items WHERE sku = $sku";
            $result2 = $conn->query($sql2);
            $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
            
            $quantity = $row["quantity"];
            $subtotal += $quantity * $row2["price"];
        }
    }
    return $subtotal;
}


?>