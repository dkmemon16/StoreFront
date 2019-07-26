<html>
 <head>
  <title>Login</title>
 </head>
 <body>
 <?php echo '<h1>Login</h1>'; 
 
 #Read user input
 ?> 
 <form action="LoginResult.php" method="post">
 Email: <input type="text" name="email"><br>
 Password: <input type="text" name="passwd"><br>
 <input type="submit">
 </form>

 
 </body>
</html>