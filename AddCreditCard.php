<html>
<head>
<title>Add Credit Card</title>
<h1>Add Credit Card</h1>
</head>

 <form action="CreditCardParse.php" method="post">
 Credit Card Number: <input type="text" name="ccnumber"  required="required"><br>
 Name on Card: <input type="text" name="acctname"  required="required"><br>
 CCV: <input type="text" name="ccv"  required="required"><br>
 Expiration Date: <input type="date" name="expdate"  required="required""><br>
 Billing Address: <input type="text" name="billingaddress"  required="required""><br>

 <input type="submit" value = "Submit">
 </form>

</html>
