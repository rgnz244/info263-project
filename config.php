<?php

$servername = "132.181.143.31";
$dbUsername = "mhp47";
$dbPassword = "Pnxr367_";
$dbName = "INFO263_mhp47_tserver";

/* Attempt to connect to MySQL database */
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>


