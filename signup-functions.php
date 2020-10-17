<?php

if (isset($_POST['submit-signup'])){
    require_once "config.php";
    require_once "functions.php";

    $username = $_POST['username'];
    $email=$_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password-confirm'];

    if(emptyInputSignup($username,$email,$password,$passwordConfirm) !== false) {
        header("location: http://localhost:8000/INFO263%20Group%20Project/signup.php?error=emptyinput");
        echo "Please fill in all the section required";
        exit();
    }
    if(invalidUsername($username) !== false) {
        header("location: http://localhost:8000/INFO263%20Group%20Project/signup.php?error=invalidusername");
        exit();
    }
    if(invalidEmail($email) !== false) {
        header("location: http://localhost:8000/INFO263%20Group%20Project/signup.php?error=invalidemail");
        exit();
    }
    if(passwordMatch($password,$passwordConfirm) !== false) {
        header("location: http://localhost:8000/INFO263%20Group%20Project/signup.php?error=passworddontmatch");
        echo "Passwords don't match";
        exit();
    }
    if(usernameExists($conn,$username,$email) !== false) {
        header("location: http://localhost:8000/INFO263%20Group%20Project/signup.php?error=existedusername");
        exit();
    }
    createUsers($conn, $username, $email, $password);
}

else{
    header("location: http://localhost:8000/INFO263%20Group%20Project/signup.php");
    exit();
}
?>







