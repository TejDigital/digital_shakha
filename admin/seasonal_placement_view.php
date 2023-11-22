<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM seasonal_placement_tbl WHERE placement_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> Program view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./seasonal_placement.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
                <div class="col-md-3">
                    <label>Name</label>
                    <?php if ($row['placement_name'] != '') : ?>
                        <p><?= $row['placement_name'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Detail</label>
                    <?php if ($row['placement_detail'] != '') : ?>
                    <p><?= $row['placement_detail'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-3">
                    <label>Date</label>
                    <?php if ($row['placement_date'] != '') : ?>
                    <p><?= $row['placement_date'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>

                <div class="col-md-3">
                    <label>Deadline Date</label>
                    <?php if ($row['placement_date_deadline'] != '') : ?>
                    <p><?= $row['placement_date_deadline'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
            
                <div class="col-md-3">
                    <label>Status</label>
                    <?php if ($row['placement_status']!= '') : ?>
                    <p><?php if($row['placement_status'] == 1){
                        echo "Active";
                    } else{
                        echo "Inactive";
                    }
                    ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-6">
                    <label>Front Image</label>
                    <br>
                    <?php if ($row['placement_front_image']!= '') : ?>
                        <img src="./seasonal_placement_images/<?=$row['placement_front_image']?>" style="width: 200px;" alt="">
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-6">
                    <label>Back Image</label>
                    <br>
                    <?php if ($row['placement_back_image']!= '') : ?>
                        <img src="./seasonal_placement_images/<?=$row['placement_back_image']?>" style="width: 200px;" alt="">
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>

                <div class="col-md-6">
                    <label>Description</label>
                    <br>
                    <?php if ($row['placement_description']!= '') : ?>
                      <p><?=$row['placement_description']?></p>
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