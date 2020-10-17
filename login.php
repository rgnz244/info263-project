<!DOCTYPE html>
<html lang="en">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
    <div class="login-main-text">
        <h2>UC tserver Login</h2>
        <p>Please enter your username and password.</p>
    </div>

    <div class="redirect-text">
        <h2>Don't have an account?</h2>
        <button class="redirect-btn" type="button" name="btn-redirect" id="redirectBtn">Register</button>
        <script type="text/javascript">
            document.getElementById("redirectBtn").onclick=function(){
                location.href="signup.php";
            }
        </script>
    </div>

</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form method="post"  action="login-functions.php">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Username" value="" name = "username">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>

                <button type="submit" class="btn btn-red" value = login name="login-submit">Login</button>

            </form>
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"]=="emptyfields"){
                    echo "<p>Please fill in all required fields.</p>";
                }
                elseif($_GET["error"]=="invalidlogin"){
                    echo "<p>Invalid login information.</p>";
                }
            }
            ?>
        </div>

    </div>

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
        .login-form{
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

        .login-form{
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
    .redirect-text{
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }

    .redirect-text h2{
        font-weight: 300;
    }

    .btn-red{
        background-color: #FF0000 !important;
        color: #fff;
    }
    .redirect-btn{
        background-color: #FF0000 !important;
        color: #fff;
    }
</style>
</html>








