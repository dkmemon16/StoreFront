<?php
include 'Cart.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$email = $_SESSION['logged_in_user_email'];
$sku = $_GET["sku"];
$mode = $_GET["mode"];

if($mode == "remove"){
    RemoveFromCart($email, $sku);
    LoadCart($email);
}
elseif ($mode == "update"){
    $quantity = $_POST["quantity"];
    UpdateCart($email, $sku, $quantity);
}

header("Location: ViewCart.php");






?>