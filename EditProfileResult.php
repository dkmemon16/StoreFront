<?php

include 'Account.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
function redirect($url){
    header("refresh:0; url= $url");
    exit();
}


$old_password = $_POST['old_password'];
$password = $_POST['passwd'];
$name = $_POST['name'];
$address = $_POST['address'];

if(VerifyAccount($_SESSION['logged_in_user_email'], $old_password)){
    if(UpdateAccount($password,$_SESSION['logged_in_user_email'], $name, $address)){
        echo '<script> alert("Profile successfully edited") </script>';
        redirect('index.php');
    }
    else{
        echo '<script> alert("Invalid information") </script>';
        redirect('EditProfile.php');
    }
}
else{
    echo '<script> alert("Profile was not edited") </script>';
    redirect('EditProfile.php');
}

?>



