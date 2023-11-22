<?php
require('./includes/header.php');
require('./admin/config/dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM seasonal_placement_tbl WHERE placement_id = '$id'";
    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>
<section class="place_view_1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 left-main">
                <div class="heading">
                    <a href="#!">Opportunities <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    <h1><?= $row['placement_name'] ?></h1>
                    <p>Application Opens: <b><?= $row['placement_date'] ?></b></p>
                    <p>Application Deadline: <span><?= $row['placement_date_deadline'] ?></span></p>
                </div>
                <div class="des">
                    <p><?= $row['placement_description'] ?></p>
                    <a href="./program_option.php">Explore Programs <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    <a href="#!">Apply Now</a>
                </div>
            </div>
            <div class="col-md-5 img_area">
                <div class="img">
                    <img src="./assets/images/place_view_bg_1.png" alt="">
                </div>
            </div>
            <div class="col-md-3 category_main">
                <div class="category">
                    <ul>
                        <li>
                            <h2>Category</h2>
                        </li>
                        <li><a href="#!">Opportunities</a></li>
                        <?php
                        $sql = "SELECT * FROM seasonal_placement_tbl WHERE placement_status = 1";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run) > 0) {
                            foreach($sql_run as $data) {
                        ?>
                            <li><a href="./placement_view.php?id=<?=$data['placement_id']?>"><?=$data['placement_name']?></a></li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<?php require('./includes/end_html.php'); ?>