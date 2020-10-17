<!DOCTYPE html>
<html lang="en">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<title>Signup</title>
<div class="sidenav">
    <div class="login-main-text">
        <h2>UC tserver<br>Sign Up</h2>
        <p>Please enter your username, email, and password.</p>
    </div>

    <div class="sub-text">
        <h2>Already have an account?</h2>
        <button id="redirectBtn" class="btn-redirect" name="signin-redirect" class="button" >Sign in</button>
        <script type="text/javascript">
            document.getElementById("redirectBtn").onclick=function(){
                location.href="login.php";
            }
        </script>

    </div>
</div>

<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="signup-form">
            <form method="post" action="signup-functions.php">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Enter Username" value="" name = "username">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Enter email" value="" name = "email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password-confirm">
                </div>

                <button type="submit" class="btn btn-red" name="submit-signup" >Submit</button>

            </form>
        </div>
    </div>
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
            echo "<p>Please fill in all required fields</p>";
        }
        elseif($_GET["error"]=="invalidusername"){
            echo "<p>Please select a valid username</p>";
        }
        elseif($_GET["error"]=="invalidemail") {
            echo "<p>Please select another email</p>";
        }
        elseif($_GET["error"]=="passworddontmatch") {
            echo "<p>Password don't match</p>";
        }
        elseif($_GET["error"]=="existedusername"){
            echo "<p>Username existed, please choose another one</p>";
        }
        elseif($_GET["error"]=="stmtfailed"){
            echo "<p>Something went wrong. Please try again.</p>";
        }
        elseif($_GET["error"]=="none"){
            echo "<p>You have successfully signed up!</p>";
        }
    }
    ?>
</div>

<style>
    body {
        font-family: "Lato", sans-serif;
    }



    .main-head{
        height: 150px;
        background: #FFF;
    }

    .sidenav {
        height: 100%;
        background-color: #ff0000;
        overflow-x: hidden;
        padding-top: 20px;
    }


    .main {
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
    }

    @media screen and (max-width: 450px) {
        .signup-form{
            margin-top: 10%;
        }
    }

    @media screen and (min-width: 768px){
        .main{
            margin-left: 40%;
        }

        .sidenav{
            width: 40%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }

        .signup-form{
            margin-top: 50%;
        }
    }


    .login-main-text{
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }

    .login-main-text h2{
        font-weight: 300;
    }

    .sub-text{
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }

    .sub-text h2{
        font-weight: 300;
    }

    .btn-red{
        background-color: #FF0000 !important;
        color: #fff;
    }

    .btn-redirect{
        background-color: #FF0000 !important;
        color: #fff;
    }
</style>
</html>








