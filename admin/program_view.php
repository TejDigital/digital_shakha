<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM program_tbl WHERE program_id = '$id'";
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
            <li class="breadcrumb-item"><a href="./programs.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
                <div class="col-md-4">
                    <label>Name</label>
                    <?php if ($row['program_name'] != '') : ?>
                        <p><?= $row['program_name'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Detail</label>
                    <?php if ($row['program_detail'] != '') : ?>
                    <p><?= $row['program_detail'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
            
                <div class="col-md-4">
                    <label>Status</label>
                    <?php if ($row['program_status']!= '') : ?>
                    <p><?php if($row['program_status'] == 1){
                        echo "Active";
                    } else{
                        echo "Inactive";
                    }
                    ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-12">
                    <label>Image</label>
                    <br>
                    <?php if ($row['program_image']!= '') : ?>
                        <img src="./program_images/<?=$row['program_image']?>" style="width: 200px;" alt="">
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