<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM testimonial_tbl WHERE test_id = '$id'";

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
    <h3 class="page-title">Testimonial Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home_testimonial.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./home_testimonial_edit_code.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row['test_id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control my-2" value="<?= $row['test_name'] ?>">
                    </div>
                    <div class="col-md-4">
                        <Label>Status</Label>
                        <select name="status" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['test_status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['test_status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control my-2" value="<?= $row['test_address'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="Image">Current Image</label> <br>
                        <img src="./home_testimonial_images/<?= $row['test_image'] ?>" class="mb-4" style="height: 200px;" alt="">
                        <br>
                        <input type="hidden" name="old_image" value="<?= $row['test_image'] ?>">
                        <label for="">Choose New Image</label>
                        <input type="file" name="new_image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control my-2" value="<?= $row['test_description'] ?>">
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