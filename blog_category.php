<?php require('./includes/header.php');
require('./admin/config/dbcon.php');
if (isset($_GET['cat_id'])) {
    $id = $_GET['cat_id'];
    $sql = "SELECT * FROM blog_category_tbl where blog_category_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>
<section class="blog_view_1">
    <div class="container">
        <div class="row flex-change">
            <div class="col-md-9">
                <div class="heading">
                    <a href="./blog.php">Blogs & Articles<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="boxes">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM blog_tbl WHERE blog_status = 1 and blog_category = '$id' ORDER BY created_at DESC ";
                        $sql_run = mysqli_query($con, $sql);
                        if (mysqli_num_rows($sql_run) > 0) {
                            while ($data = mysqli_fetch_assoc($sql_run)) {
                                $timestamp = strtotime($data['blog_date']);
                                $day = date('d', $timestamp);
                                $month = date('M', $timestamp);
                        ?>
                                <div class="col-md-4 px-5">
                                    <a href="./blog_view.php?blog_id=<?= $data['blog_id'] ?>">
                                        <div class="blog_box">
                                            <div class="head_text">
                                                <p><?= $day ?> <?= $month ?> °</p>
                                                <b><?php if ($data['blog_category'] == $row['blog_category_id']) {
                                                        echo $row['blog_category_name'];
                                                    } ?></b>
                                            </div>
                                            <div class="main_text">
                                                <p><?= $data['blog_name'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php
                            }
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
                        $query = "SELECT * FROM blog_category_tbl where blog_category_status = 1";
                        $query_run = mysqli_query($con, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $data2) {
                        ?>
                                <li><a href="./blog_category.php?cat_id=<?= $data2['blog_category_id'] ?>" style="<?php if ($row['blog_category_id'] == $data2['blog_category_id']) {
                                                                                                                        echo "color:red;";
                                                                                                                    } ?>"><?= $data2['blog_category_name'] ?></a></li>

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