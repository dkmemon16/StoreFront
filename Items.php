<html>
<h1>Catalog</h1>
<body>
<?php

include 'Connection.php';
$conn = connect(); 
$sql = "SELECT sku, name, imagelocation FROM Items";
 
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
      echo '   <a href="SelectedItem.php?sku='.$row["sku"].  '">'.  $row["name"]. '</a><img src=images/'.  $row["imagelocation"] .' width = "100" height="100"><br>';}
 }
 else
     echo 'No results';
     

 ?>
 </body>
 <br>
 <button onclick="location.href ='index.php'">Return to Home</button>
 
 </html>