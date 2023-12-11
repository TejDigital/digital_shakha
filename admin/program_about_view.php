<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM program_about_tbl WHERE program_about_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title">Program About view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./program_about.php">Home</a></li>
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
                    <?php if ($row['program_about_status'] != '') : ?>
                        <p><?php if ($row['program_about_status'] == 1) {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            }
                            ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-12">
                    <label>Detail</label>
                    <?php if ($row['program_about_text'] != '') : ?>
                        <p><?= $row['program_about_text'] ?></p>
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