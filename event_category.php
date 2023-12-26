<?php require('./includes/header.php');
require('./admin/config/dbcon.php');
if (isset($_GET['cat_id'])) {
    $id = $_GET['cat_id'];
    $sql = "SELECT * FROM event_category_tbl where event_category_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>
<section class="blog_view_1">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="heading">
                    <a href="./events.php">events & Articles<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="boxes">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM event_tbl WHERE event_status = 1 and event_category = '$id' ORDER BY created_at DESC ";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run) > 0) {
                            while ($data = mysqli_fetch_assoc($sql_run)) {
                                $timestamp = strtotime($data['event_date']);
                                $day = date('d', $timestamp);
                                $month = date('M', $timestamp);
                        ?>
                                <div class="col-md-4 px-5 mb-3">
                                    <a href="./event_view.php?event_id=<?= $data['event_id'] ?>">
                                        <div class="event_box" style="border: 1px solid #000; padding:0.6rem;">
                                            <div class="head_text">
                                                <p>Date - <?= $day ?> <?= $month ?> °</p>
                                                <b><?php if ($data['event_category'] == $row['event_category_id']) {
                                                        echo $row['event_category_name'];
                                                    } ?></b>
                                            </div>
                                            <div class="main_text">
                                                <p><?= $data['event_title'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="not-found">
                                <p>No Event In this category</p>
                                <h1 style="Font-size:1.6rem;">Suggestions:</h1>
                                <ul>
                                    <li>Try Another Category</li>
                                    <li>View Our Blog</li>
                                </ul>
                            </div>
                        <?php
                        }
                        ?>
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
                            foreach ($query_run as $data2) {
                        ?>
                                <li><a href="./event_category.php?cat_id=<?= $data2['event_category_id'] ?>" style="<?php if ($row['event_category_id'] == $data2['event_category_id']) {
                                                                                                                        echo "color:red;";
                                                                                                                    } ?>"><?= $data2['event_category_name'] ?></a></li>

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