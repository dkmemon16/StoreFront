<html>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>

<h1>Order Details </h1>

<table>
  <tr>
    <th>Item Name</th>
    <th>Picture</th>
    <th>Price</th>
    <th>Quantity</th>
  </tr>  


<?php
include 'Connection.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$orderID = $_GET["orderID"];
$conn = connect();
$sql = "SELECT itemSKU, quantity FROM ItemsInOrders WHERE orderID= '$orderID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sql2 = "SELECT name, price, imagelocation FROM Items WHERE sku = ". $row['itemSKU'];
        $result2 = $conn->query($sql2);
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        
        if ($result->num_rows > 0) {
            echo "<tr>";
            echo "<td>". $row2['name']. "</td>";
            echo '<td><img src=images/'.  $row2["imagelocation"] .' width = "50" height="50"></td>';
            echo "<td> $". $row2['price']. "</td>";
            echo "<td> ". $row['quantity']. "</td>";
            echo "</tr>";
            
        }
        
        
    }
    echo "</table>";
    $sql3 = "SELECT orderTotal FROM Orders WHERE orderID= '$orderID'";
    $result3 = $conn->query($sql3);
    $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
    echo "Order Total: $". $row3['orderTotal'];
}
else{
    echo "Order not found";
}

?>

<br> <button onclick="location.href = 'OrderHistory.php'">Order History</button><br>
<button onclick="location.href ='index.php'">Return to Home</button>

</html>