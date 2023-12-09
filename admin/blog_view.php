<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM blog_tbl WHERE blog_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> Blog view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./blog.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
                <div class="col-md-4">
                    <label>Name</label>
                    <?php if ($row['blog_name'] != '') : ?>
                        <p><?= $row['blog_name'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Date</label>
                    <?php if ($row['blog_date'] != '') : ?>
                        <p><?= $row['blog_date'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>

                <div class="col-md-4">
                    <label>Blog Category</label>
                    <?php if ($row['blog_category'] != '') : ?>
                        <?php
                        $sql = "SELECT * FROM blog_category_tbl WHERE blog_category_status = 1";
                        $sql_run =mysqli_query($con,$sql);
                        if(mysqli_num_rows($sql_run) > 0 ){
                            foreach($sql_run as $data){
                                ?>
                                <p><?php if($row['blog_category'] == $data['blog_category_id']){echo $data['blog_category_name'];} ?></p>
                                <?php
                            }
                        }
                        ?>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
            
                <div class="col-md-4">
                    <label>Status</label>
                    <?php if ($row['blog_status']!= '') : ?>
                    <p><?php if($row['blog_status'] == 1){
                        echo "Active";
                    } else{
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
                    <?php if ($row['blog_image']!= '') : ?>
                        <img src="./blog_images/<?=$row['blog_image']?>" height="200px" >
                                         <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-12">
                    <label>Mini Description</label>
                    <?php if ($row['blog_mini_description'] != '') : ?>
                    <p><?= $row['blog_mini_description'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-12">
                    <label>Description</label>
                    <?php if ($row['blog_description'] != '') : ?>
                    <p><?= $row['blog_description'] ?></p>
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