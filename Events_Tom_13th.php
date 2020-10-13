<!DOCTYPE html>
<html lang = "en">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<title>Events</title>
<div class="header">
    <a href="Events.php" class="logo" href = "Events.php">UC tserver</a>
    <div class="header-left">
        <a href = "Events.php">Events</a>
        <a href= "Create_event.php">Create Event</a>
        <a href = "Search.php"> Search </a>
        <a href="#about">Sign out</a>
    </div>
</div>

<h1>Upcoming events</h1>
<?php

$conn = new mysqli("132.181.143.31","mhp47","Pnxr367_","INFO263_mhp47_tserver");
// Check connection
if($conn->connect_error)
{
    die($conn->connect_error);
}

// Establish query
$query = "CALL get_future_events()";
$result = $conn->query($query);
if (!$result){
    die($conn->error);
}

// Display events

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
    echo 'Event title: '.$row['event_name']. '<br>';
    echo 'Room: '.$row['machine_group']. '<br>';
    echo 'Date: '.$row['date']. '<br>';
    echo 'Time: '.$row['time']. '<br>';
    echo 'Day of the week: '.$row['daily_id']. '<br><br>';
}

$result->close();
$conn->close();


?>

</html>





























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
</style>