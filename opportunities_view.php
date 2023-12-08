<?php require('./includes/header.php');
require('./admin/config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM opportunities_tbl WHERE opp_id = '$id'";

    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
 ?>
 <section class="opportunities_view_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="nav_box">
                    <a href="./index.php"><img src="./assets/images/home.svg">Home<i class="fa-solid fa-angle-right"></i></a>
                    <a href="./opportunities.php">opportunities<i class="fa-solid fa-angle-right"></i></a>
                    <p class="m-0">Open Opportunities</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="opportunities_view_2">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="heading">
                    <h1><?=$row['opp_name']?></h1>
                </div>
                <div class="text">
                <?=$row['opp_description']?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text">
                        <div class="btn_area">
                            <a href="#!">Apply for this opening</a>
                        </div>
                        <div class="link_area">
                            <p>Share it to a friend:</p>
                            <a href="#!"><img src="./assets/images/link-2.svg" alt=""></a>
                            <a href="#!"><img src="./assets/images/Vector.svg" alt=""></a>
                            <a href="#!"><img src="./assets/images/linkedin.svg" alt=""></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('./includes/footer.php'); ?>
<?php require('./includes/script.php'); ?>
<?php require('./includes/end_html.php'); ?>