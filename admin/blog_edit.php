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
<?php
if (isset($_SESSION['digi_meg'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey !</strong> <?= $_SESSION['digi_meg'] ?>
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        </button>
    </div>
<?php
    unset($_SESSION['digi_meg']);
}
?>
<div class="page-header">
    <h3 class="page-title">Blog Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./blog.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./blog_edit_code.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row['blog_id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control my-2" value="<?= $row['blog_name'] ?>">
                    </div>
                    <div class="col-md-4">
                        <Label>Status</Label>
                        <select name="status" class="form-select mb-2"  style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['blog_status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['blog_status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control my-2" value="<?= $row['blog_date'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Category</label>
                        <select name="category" class="form-control mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                <option value="">Select Category</option>
                                <?php
                                $sql = "SELECT * FROM blog_category_tbl where blog_category_status = 1";
                                $sql_run = mysqli_query($con,$sql);
                                if(mysqli_num_rows($sql_run) > 0){
                                    foreach($sql_run as $data){
                                        ?>
                                        <option <?php if($row['blog_category'] == $data['blog_category_id']){echo "selected";}?> value="<?=$data['blog_category_id']?>"><?=$data['blog_category_name']?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Current Image</label> <br>
                            <img src="./blog_images/<?=$row['blog_image']?>" height="200px" >
                        <br>
                        <input type="hidden" name="old_image" value="<?= $row['blog_image'] ?>">
                        <label for="">Choose New Image</label>
                        <input type="file" name="new_image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Mini Description</label>
                        <textarea name="mini_description" class="form-control mb-3" cols="30" rows="10"><?= $row['blog_mini_description'] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control mb-3 textarea" cols="30" rows="10"><?= $row['blog_description'] ?></textarea>
                    </div>
                </div>

                <button class="btn btn-success my-2" type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</div>
<?php
require('./includes/footer.php');
?>
<script>

</script>
<?php
require('./includes/script.php');
?>