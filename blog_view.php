<?php require('./includes/header.php');
require('./admin/config/dbcon.php');
if (isset($_GET['blog_id'])) {
    $id = $_GET['blog_id'];
    $sql = "SELECT * FROM blog_tbl LEFT JOIN blog_category_tbl ON blog_tbl.blog_category = blog_category_tbl.blog_category_id  WHERE blog_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
        $timestamp = strtotime($row['blog_date']);
        $day = date('d', $timestamp);
        $month = date('M', $timestamp);
    }
}
?>

<section class="blog_view_1">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="heading">
                    <a href="./blog.php">Blogs & Articles<i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="head_text">
                    <p><?php if ($row['blog_category'] == $row['blog_category_id']) {
                            echo $row['blog_category_name'];
                        } ?> • <?= $day ?> <?= $month ?></p>
                    <h1><?= $row['blog_name'] ?></h1>
                </div>
                <div class="img">
                    <img src="./admin/blog_images/<?= $row['blog_image'] ?>" alt="">
                </div>
                <div class="text">
                    <div class="head_description">
                        <?= $row['blog_mini_description'] ?>
                    </div>
                    <div class="main_description mt-3">
                        <?= $row['blog_description'] ?>
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
                        foreach ($query_run as $data) {
                    ?>
                            <li><a href="./blog_category.php?cat_id=<?= $data['blog_category_id'] ?>" style="<?php if($row['blog_category'] == $data['blog_category_id']){echo "color:red;";}?>" ><?= $data['blog_category_name'] ?></a></li>

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