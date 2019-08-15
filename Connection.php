<?php
function connect(){
    $dbServerName = "dkmpi.hopto.org";
    $dbUsername = "remoteUser";
    $dbPassword = "GoodThinking45!";
    $dbName = "StoreFront";
    
    
    // create connection
    $conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
    
    # check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    # echo "Connected successfully";
    return $conn;
}

