<html>
 <head>
  <title>Edit Profile</title>
 </head>
 <body>
 <h1>Edit Profile</h1>
 <form onsubmit= "return confirmSubmit()" method="post" action="EditProfileResult.php"  >
 
 Old Password: <input type="password" name="old_password"><br>
 New Password: <input type="password" name="passwd"><br>
 
 <?php 
 include 'Account.php';
 if (session_status() !== PHP_SESSION_ACTIVE) {
     session_start();
 }
 //fetch name address and cc (only show last 4 of cc) and autofill
 $values = ReteiveAccount($_SESSION['logged_in_user_email']);
 
 echo 'Name: <input type="text" name="name" value= '. $values[0]. '><br>';
 echo 'Address: <input type="text" name="address" value='. $values[1]. '><br>';
 ?>

 
 <input type="submit" value = "Submit">
 </form>
 
 <script>
function confirmSubmit() {
  return confirm("Are you sure?");
}
</script>
 
 </body>
</html>