<?php
require_once('Connection.php');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
//functions

function LoadCart($email){
    $conn = connect();
    $sql = "SELECT itemSKU, quantity FROM Cart WHERE accountemail= '$email'";
    
    $result = $conn->query($sql);
    $tempCart = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tempArray = array($tempCart, $row["itemSKU"],  $row["quantity"]);
            array_push($tempCart, $tempArray);
        }
    }
    $_SESSION['cart'] = $tempCart;
}

function UpdateCart($email, $sku, $quantity){
    $conn = connect();
    $sql = "UPDATE Cart set quantity= '$quantity' WHERE accountemail= '$email' AND itemSKU = '$sku'";
    $result = $conn->query($sql);
    return $result;
}

function GetName($sku){
    $conn = connect();
    $sql = "SELECT name FROM Items WHERE sku = '$sku'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if ($result->num_rows > 0) {
        return $row["name"];
    }
}



//AddToCart
function AddToCart($email, $sku, $quantity){
    $conn = connect();
    $sql = "SELECT quantity FROM Cart WHERE accountemail = '$email' AND itemSKU = '$sku'";
    
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    if ($result->num_rows > 0) {
        $totalquantity = $quantity+ $row["quantity"];
        $sql = "UPDATE Cart SET quantity = $totalquantity WHERE accountemail = '$email' AND itemSKU = '$sku'";
    }
    else{
        $sql = "INSERT INTO Cart(accountemail, itemSKU, quantity) VALUES ('$email', '$sku', $quantity)";
    }
    $result = $conn->query($sql);
    return $result;
}

//RemoveFromCart
function RemoveFromCart($email, $sku){
    $conn = connect();
    $sql = "DELETE FROM Cart WHERE accountemail = '$email' AND itemSKU = '$sku'";
    //echo "sql: $sql";
    $result = $conn->query($sql);
    return $result;
}

//UpdateQuantity()
function UpdateQuantity($email, $sku, $quantity){
    $conn = connect();
    $sql = "UPDATE Cart SET quantity = $quantity WHERE accountemail = '$email' AND itemSKU = '$sku'";
    $result = $conn->query($sql);
    return $result;
}

//EmptyCart($email)
function EmptyCart($email){
    $conn = connect();
    $sql = "DELETE FROM Cart WHERE accountemail = '$email'";
    $result = $conn->query($sql);
    return $result;
}



?>