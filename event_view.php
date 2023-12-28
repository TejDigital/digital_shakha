<?php require('./includes/header.php');
require('./admin/config/dbcon.php');
if (isset($_GET['event_id'])) {
    $id = $_GET['event_id'];
    $sql = "SELECT * FROM event_tbl LEFT JOIN event_category_tbl ON event_tbl.event_category = event_category_tbl.event_category_id  WHERE event_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
        $timestamp = strtotime($row['event_date']);
        $day = date('d', $timestamp);
        $month = date('M', $timestamp);
    }
}
?>

<section class="blog_view_1">
    <div class="container">
        <div class="row flex-change">
            <div class="col-md-9">
                <div class="heading">
                    <a href="./events.php">events & Articles<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="head_text">
                    <p><?php if ($row['event_category'] == $row['event_category_id']) {
                            echo $row['event_category_name'];
                        } ?> • <?= $day ?> <?= $month ?></p>
                    <h1><?= $row['event_title'] ?></h1>
                </div>
                <div class="img">
                    <img src="./admin/event_image/<?= $row['event_image'] ?>" alt="">
                </div>
                <div class="text">
                    <div class="head_description">
                    </div>
                    <div class="main_description mt-3">
                        <?= $row['event_description'] ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category">
                    <h1>Category</h1>
                    <ul>
                    <?php
                    $query = "SELECT * FROM event_category_tbl where event_category_status = 1";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $data) {
                    ?>
                            <li><a href="./event_category.php?cat_id=<?= $data['event_category_id'] ?>" style="<?php if($row['event_category'] == $data['event_category_id']){echo "color:red;";}?>" ><?= $data['event_category_name'] ?></a></li>

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
<?php
require('./includes/footer.php');
require('./includes/script.php');
require('./includes/end_html.php');
?>