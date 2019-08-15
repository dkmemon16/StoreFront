<html>
<head>
<meta charset="utf-8">
<title>Demo Store</title>

<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include 'Cart.php';
if (! isset($_SESSION['logged_in_user_email'])){
    $_SESSION['logged_in_user_email'] = "guest";
}
if(isset($_GET['logged_in'])){
    $_SESSION['logged_in_user_email'] = $_GET['logged_in'];
}
LoadCart($_SESSION['logged_in_user_email']);
if ($_SESSION['logged_in_user_email'] == "guest"){
    echo 'Not logged in';
}
else{
    echo 'Logged in as: '.  $_SESSION['logged_in_user_email'];
}


echo "<nav>";

if ($_SESSION['logged_in_user_email'] == "guest"){
    echo '<a href="Login.php">Login</a> | ';
    echo '<a href="CreateAccount.php">Create Account</a> | ';
    
}
else{
    echo '<a href="index.php?logged_in=guest">Logout</a> | ';
    echo '<a href="EditProfile.php">Edit Profile</a> | ';
}
?>
<a href="Items.php">Item Catalog </a> | 
<a href="ViewCart.php">View Cart </a> | 
<a href="OrderHistory.php">Order History </a>


</nav>

</head>
<body>
<h1>Welcome to my shop demo</h1>
<p>Choose one of the above options.</p>

<footer>

</footer>
</body>
</html>