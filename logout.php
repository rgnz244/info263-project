<?php
session_start();
session_unset();
session_destroy();

header("location: http://localhost:8000/INFO263%20Group%20Project/login.php");



?>

