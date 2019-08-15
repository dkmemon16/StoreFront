<html>
<head>
<title>Order Historyt</title>
</head>
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

<h1>Order History

<table>
  <tr>
    <th>Order ID</th>
    <th>Order Total</th>
    <th>Order Date</th>
    <th>Payment Method</th>
    <th>Delivery Address</th>
  </tr>  

<?php
include 'Connection.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$conn = connect();
$sql = "SELECT orderID, orderTotal, orderDate, creditCard, deliveryAddress FROM Orders WHERE accountEmail = '". $_SESSION['logged_in_user_email']. "' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        $orderID = $row["orderID"];        
        echo "<td>". $row['orderID']. "</td>";
        echo "<td> $". $row['orderTotal']. "</td>";
        echo "<td> ". $row['orderDate']. "</td>";
        echo "<td> ************". substr($row['creditCard'], -4). "</td>";
        echo "<td>". $row['deliveryAddress']. "</td>";
        echo "<td><button onclick='location.href =&apos; ViewOrder.php?orderID=". $orderID."&apos;'>View Order</button></td>";
        echo "</tr>";
    }
    echo "</table>";
}
else{
    echo "You have not placed any orders";
}
        



?>
</table>

</body>
<br>
<button onclick="location.href ='index.php'">Return to Home</button>

</html>