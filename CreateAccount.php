<html>
 <head>
  <title>Create Account</title>
 </head>
 <body>
 <?php echo '<h1>Create Account</h1>'; 
 
 #Read user input
 ?> 
 <form action="CreateAccountResult.php" method="post">
 Email: <input type="text" name="email"><br>
 Password: <input type="text" name="passwd"><br>
 Name: <input type="text" name="name"><br>
 Address: <input type="text" name="address"><br>
 Credit Card: <input type="text" name="creditcard"><br>

 <input type="submit">
 </form>

 
 </body>
</html>