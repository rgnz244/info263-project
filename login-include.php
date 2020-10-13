<?php
if(isset($_POST["login-submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  require_once "config.php";
  require_once "function-include.php";

  if(emptyInputLogin($username, $password)!==false){
      header("location: http://localhost:8000/INFO263%20Group%20Project/login.php?error=emptyfields");
      exit();
  }
  userLogin($conn, $username, $password);
}
else{
    header("location: http://localhost:8000/INFO263%20Group%20Project/login.php");
    exit();
}


