<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM success_story_tbl WHERE story_id = '$id'";

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
    <h3 class="page-title">Story Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./success_story.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./success_story_edit_code.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row['story_id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control my-2" value="<?= $row['name'] ?>">
                    </div>
                    <div class="col-md-4">
                        <Label>Status</Label>
                        <select name="status" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Designation</label>
                        <input type="text" name="designation" class="form-control my-2" value="<?= $row['designation'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="Image">Current Image</label> <br>
                        <img src="./success_story_images/<?= $row['image'] ?>" class="mb-4" style="height: 200px;" alt="">
                        <br>
                        <input type="hidden" name="old_image" value="<?= $row['image'] ?>">
                        <label for="">Choose New Image</label>
                        <input type="file" name="new_image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control mb-3" cols="30" rows="5"><?= $row['description'] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Tips</label>
                        <textarea name="tips" class="form-control mb-3" cols="30" rows="5"><?= $row['tips'] ?></textarea>
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