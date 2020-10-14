
<?php
//Header and navigation panel
include "Header.php";

//SQL connection
$mysqli = new mysqli("132.181.143.31","mhp47","Pnxr367_","INFO263_mhp47_tserver");
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
}
$resultCluster = mysqli_query($mysqli, "SELECT cluster_name FROM front_cluster");
$resultRooms = mysqli_query($mysqli, "SELECT room_name FROM front_room");


?>

<title>Creat Event</title>
<h1> Create new events</h1>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<?php
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_code = select_item($_POST["name"]);
    $room_code = select_item($_POST["email"]);
}*/
?>

<div class = "Name">
    <div class="col-md-6 col-sm-12">
        <div class = "Create-event-form" method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <form action="" method="post">
                <div class="form-event">
                    <label>Event: </label>
                    <select name="Courses">
                        <?php
                        while($col=mysqli_fetch_assoc($resultCluster)){
                            $course_code = $col['cluster_name'];
                            echo "<option value='".$course_code."'>".$course_code."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-event">
                    <label>Room:   </label>
                    <select name="Room">
                        <?php
                        while($col=mysqli_fetch_assoc($resultRooms)){
                            $room_code = $col['room_name'];
                            echo "<option value='".$room_code."'>".$room_code."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-event">
                    <label>Date</label>
                    <input type="date" id="datefield" name="event-date"
                           min="today" max="2050-12-31">
                    </input>
                </div>

                <button type="submit" class="btn btn-black" name="btn_create">Create</button>
            </form>
        </div>
    </div>
</div>


<?php
/*if(isset($_POST['submit'])){
    if(!empty($_POST['Courses'])){
        $selectedCourse = $_POST['Courses'];
        //echo "<h2>Event successfully added</h2>";
        echo "Event title:". $selectedCourse;
        //echo "Room:" .$selected;
        }
    else{
        echo "Please select all the information.";
    }
}*/
function showDate($date){
    if(isset($_POST['submit'])){
        if(!empty($_POST['event-date'])){
            $date=date('Y-m-d',strtotime($_POST['event-date']));
            echo "Date: ".$date;
        }
    }
    else{
        echo"Please select a date";
    }
}


?>


</html>

