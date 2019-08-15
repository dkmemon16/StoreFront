<html>
<?php
include 'Cart.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$quantity = $_POST["quantity"];
$sku = $_GET["sku"];
$name = GetName($sku);
AddToCart($_SESSION['logged_in_user_email'], $sku, $quantity);

echo "You have added $quantity $name to your cart <br> <br>";

?>

<button onclick="location.href = 'Items.php'">Continue Shopping</button>
<button onclick="location.href = 'ViewCart.php'">View Cart</button>
<button onclick="location.href ='Checkout.php'">Checkout</button>
</html>