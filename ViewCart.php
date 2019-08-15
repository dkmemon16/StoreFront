<html>
<head>
<title>View Cart</title>
<h1>View Cart</h1>
</head>

<?php
include 'Cart.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$email = $_SESSION['logged_in_user_email'];
$conn = connect();
$sql = "SELECT itemSKU, quantity FROM Cart WHERE accountemail = '$email'";
//$test = '<a href="" onclick="myAjax()" class="deletebtn">Delete</a>';
$subtotal = 0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sku = $row["itemSKU"];
        $sql2 = "SELECT quantity AS instock, price, imagelocation FROM Items WHERE sku = $sku";
        $result2 = $conn->query($sql2);
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        echo "<p>".GetName($sku). '      </a><img src=images/'.  $row2["imagelocation"] .' width = "100" height="100">';
        
        
        
        echo "<form action='CartParse.php?mode=remove&sku=$sku' method='post'>";
        echo '<input type = "submit" value= "Remove">';
        echo '</form>';
        
        echo "<form action='CartParse.php?mode=update&sku=$sku' method='post'>";
        $quantity = $row["quantity"];
        
    
        
        echo '<select name="quantity" value="'. $quantity. '">';
        
        $instock = $row2["instock"];
        $subtotal += $quantity * $row2["price"];
        for($counter = 1; $counter <= $instock; $counter+=1){
            if($counter == $quantity)
                echo "<option selected value='$counter'>$counter</option>";
            else
                echo "<option value='$counter'>$counter</option>";   
        }
        echo "</select>";
        
        echo '<input type="submit" value = "Update Quantity">'  ;   
        echo '</form>';
        
        echo '</p><br>';  
       
     }
     
     echo "Subtotal: $". $subtotal. "       "; 
     echo "<button onclick='location.href =&apos;Checkout.php&apos;'>Checkout</button> <br>";
}
else{
    echo "<p> Your cart is empty </p> ";
}
?>
<button onclick="location.href = 'Items.php'">Continue Shopping</button><br>
<button onclick="location.href ='index.php'">Return to Home</button>



</html>