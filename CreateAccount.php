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
 Password: <input type="password" name="passwd"  required="required"><br>
 Name: <input type="text" name="name"><br>
 Address: <input type="text" name="address"><br>
  

 <input type="submit" value = "Submit">
 </form>


 
 </body>
</html>