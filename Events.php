<?php
//Header and navigation panel
include "Header.php";
?>

<h1>Upcoming events</h1>
<?php
//Connect to database
$conn = new mysqli("132.181.143.31","mhp47","Pnxr367_","INFO263_mhp47_tserver");
//Check connection
if($conn->connect_error){
    die($conn->connect_error);
}

//Establish query
$query = "CALL get_upcoming_events()";
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
    echo 'Time: '.$row['time']. '<br><br>';
}

$result->close();
$conn->close();
?>

</html>

