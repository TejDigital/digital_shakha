<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM event_tbl WHERE event_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> Event view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./events.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
                <div class="col-md-4">
                    <label>Name</label>
                    <?php if ($row['event_title'] != '') : ?>
                        <p><?= $row['event_title'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Date</label>
                    <?php if ($row['event_date'] != '') : ?>
                        <p><?= $row['event_date'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Start time</label>
                    <?php if ($row['event_start_time'] != '') : ?>
                    <p><?= $row['event_start_time'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>End time</label>
                    <?php if ($row['event_end_time'] != '') : ?>
                    <p><?= $row['event_end_time'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
            
                <div class="col-md-4">
                    <label>Address</label>
                    <?php if ($row['event_address'] != '') : ?>
                    <p><?= $row['event_address'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
            
                <div class="col-md-4">
                    <label>Status</label>
                    <?php if ($row['event_status']!= '') : ?>
                    <p><?php if($row['event_status'] == 1){
                        echo "Active";
                    } else{
                        echo "Inactive";
                    }
                    ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Video</label>
                    <br>
                    <?php if ($row['event_video']!= '') : ?>
                        <video autoplay muted loop style="height: 200px;">
                            <source src="./event_videos/<?= $row['event_video'] ?>">
                        </video>                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-12">
                    <label>Description</label>
                    <?php if ($row['event_description'] != '') : ?>
                    <p><?= $row['event_description'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
            
            </div>
        </div>
    </div>
</div>
<?php
require('./includes/footer.php');
?>
<?php
require('./includes/script.php');
?>