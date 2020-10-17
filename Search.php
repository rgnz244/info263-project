<!DOCTYPE html>
<html lang = "en">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="header">
    <a href="events.php" class="logo">UC tserver</a>
    <div class="header-left">
        <a href = "events.php">Events</a>
        <a href= "create_event.php">Create Event</a>
        <a href = "search.php"> Search </a>
        <a href="#about">Sign out</a>
    </div>
</div>

<style>
    /* Style the header with a grey background and some padding */
    .header {
        overflow: hidden;
        background-color: #ff0000;
        padding: 20px 10px;
    }

    /* Style the header links */
    .header a {
        float: left;
        color: white;
        text-align: center;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        line-height: 25px;
        border-radius: 4px;
    }

    /* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
    .header a.logo {
        font-size: 25px;
        font-weight: bold;
        color: white;
    }

    /* Change the background color on mouse-over */
    .header a:hover {
        background-color: #ddd;
        color: red;
    }

    /* Style the active/current link*/
    .header a.active {
        color: white;
    }



    /* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
    @media screen and (max-width: 500px) {
        .header a {
            float: none;
            display: block;
            text-align: left;
        }
        .header-right {
            float: none;
        }
    }

    h1 {
        margin-top: 14px;
        margin-left: 14px;
    }

</style>


<h1>Search</h1>
<div class = "Search">
    <div class="col-md-6 col-sm-12">
        <div class = "Search">
            <form>
                <div class="Enter keyword">
                    <input type="text" class="form-control" placeholder="Search">
                </div>


