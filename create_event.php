
<?php
//Header and navigation panel
include "Header.php";
require_once "function-include.php";
require_once "config.php";


$result_cluster = mysqli_query($conn, "SELECT cluster_name FROM front_cluster;");
$result_rooms = mysqli_query($conn, "SELECT room_name FROM front_room ORDER BY room_name");


?>

<title>Creat Event</title>
<h1> Create new events</h1>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<div class = "Name">
    <div class="col-md-6 col-sm-12">
        <div class = "Create-event-form" method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <form action="" method="post">
                <div class="form-event">
                    <label>Event name:</label>
                    <input type="text" name="event_name">
                </div>
                <div class="form-event">
                    <label>Cluster: </label>
                    <select name="select_cluster">
                        <?php
                        while($col=mysqli_fetch_assoc($result_cluster)){
                            $cluster = $col['cluster_name'];
                            echo "<option value='".$cluster."'>".$cluster."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-event">
                    <label>Room:   </label>
                    <select name="Room">
                        <?php
                        while($col=mysqli_fetch_assoc($result_rooms)){
                            $room_code = $col['room_name'];
                            echo "<option value='".$room_code."'>".$room_code."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-event">
                    <label>Date</label>
                    <input type="date" id="datefield" name="date"
                           min="today" max="2050-12-31">
                    </input>
                </div>

                <button type="submit" class="btn btn-black" name="btn_create">Create</button>
                <?php
                if (isset($_POST['btn_create'])){
                    $event_name=$_POST['event_name'];
                    create_event($conn,$event_name);
                }
                ?>

            </form>
        </div>
    </div>
</div>

<?php


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




</html>
