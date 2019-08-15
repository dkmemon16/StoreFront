<html>
<?php
include 'Connection.php';
$conn = connect(); 
$sku = $_GET["sku"];
$sql = "SELECT sku, name, brand, category, price, quantity, dimmensions, imagelocation FROM Items WHERE sku = $sku";

$result = $conn->query($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if ($result->num_rows > 0) {
        echo 'SKU: '. $row["sku"]. '<br>';
        echo 'Name: '. $row["name"]. '<br>';
        echo 'Brand: '. $row["brand"]. '<br>';
        echo 'Category: '. $row["category"]. '<br>';
        echo 'Price: $'. $row["price"]. '<br>';
        echo 'In Stock: '. $row["quantity"]. '<br>';
        echo 'Dimmensions: '. $row["dimmensions"]. '<br>';
        echo '<img src=images/'.  $row["imagelocation"] .' width = "500" height="500">';
}

echo "<form action='AddToCart.php?sku=$sku' method='post'>";
?>
<select name="quantity">
   <?php 
    $sql = "SELECT quantity FROM Items WHERE sku = $sku";   
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $instock = $row["quantity"];
    
    for($counter = 1; $counter <= $instock; $counter+=1){
        echo "<option value='$counter'>$counter</option>";    
    }

   ?>
</select>
 <input type="submit" value = "Add to Cart">
 </form>
</html>