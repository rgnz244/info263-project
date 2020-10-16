<?php

//Every function used is in this php file
include "config.php";
function emptyInputSignup($username,$email,$password,$passwordConfirm){
//    $result;
    if(empty($username)||empty($email)||empty($password)||empty($passwordConfirm)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUsername($username){
   // $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function passwordMatch($password,$passwordConfirm){
    if($password !== $passwordConfirm){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function usernameExists($conn,$username,$email){ //$conn established in config.php
    $sql = "SELECT * FROM INFO263_mhp47_tserver.users WHERE username = ? OR email= ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: http://localhost:8000/INFO263%20Group%20Project/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUsers($conn, $username, $email, $password){
    $sql = "CALL add_user(?, ? ,?)";

    $stmt = mysqli_stmt_init($conn);


    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: http://localhost:8000/INFO263%20Group%20Project/signup.php?error=stmtfailed");
        exit();
    }
    //Hashing password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"sss",$username, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: http://localhost:8000/INFO263%20Group%20Project/signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $password){
    if(empty($username)||empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function userLogin($conn, $username, $password){
   $usernameExists = usernameExists($conn, $username, $username);

   if($usernameExists === false){
       header("location: http://localhost:8000/INFO263%20Group%20Project/login.php?invalidlogin");
        exit();

        $hashedPassword = $usernameExists["password"];
        $checkPassword = password_verify($password, $hashedPassword);

        if($checkPassword === false){
            header("location: http://localhost:8000/INFO263%20Group%20Project/login.php?invalidlogin");
            exit();
        }
        elseif ($checkPassword === true){
            session_start();
            $_SESSION["userName"]= $usernameExists["username"];
            header("location: http://localhost:8000/INFO263%20Group%20Project/Events.php");
            exit();
        }
    }
}

function create_event($conn, $event_name)
{
    $sql = "INSERT INTO INFO263_mhp47_tserver.front_event (event_name, status)  VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        exit();
    }

    $status = 1;
    mysqli_stmt_bind_param($stmt,"sd", $event_name, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    exit();

}

?>
