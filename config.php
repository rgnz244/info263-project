<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '132.181.143.31');
define('DB_USERNAME', 'mhp47');
define('DB_PASSWORD', 'Pnxr367_');
define('DB_NAME', 'INFO263_mhp47_tserver');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>