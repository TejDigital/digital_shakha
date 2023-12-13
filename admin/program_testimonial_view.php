<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM program_testimonial_tbl WHERE program_testimonial_id = '$id'";

    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title">Program testimonial view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./program_testimonial.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
                <div class="col-md-4">
                    <label>Program  Name</label>
                    <?php
                    $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
                    $sql_run = mysqli_query($con, $sql);
                    if (mysqli_num_rows($sql_run)) {
                        foreach ($sql_run as $data) {
                    ?>
                            <?php if ($row['program'] != '') : ?>
                                <?php if ($row['program'] == $data['program_id']) : ?>
                                    <p><?= $data['program_name'] ?></p>
                                <?php endif ?>
                            <?php else : ?>
                                <p>Not Found</p>
                            <?php endif ?>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <label>Status</label>
                    <?php if ($row['program_testimonial_status'] != '') : ?>
                        <p><?php if ($row['program_testimonial_status'] == 1) {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            }
                            ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Image</label>
                    <br>
                    <?php if ($row['program_testimonial_image'] != '') : ?>
                        <img src="./program_testimonial_images/<?= $row['program_testimonial_image'] ?>" style="height: 200px;" alt="">
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Name</label>
                    <br>
                    <?php if ($row['program_testimonial_name'] != '') : ?>
                        <p><?=$row['program_testimonial_name']?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
          
        
                <div class="col-md-4">
                    <label>Description</label>
                    <br>
                    <?php if ($row['program_testimonial_text'] != '') : ?>
                        <p><?=$row['program_testimonial_text']?></p>
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