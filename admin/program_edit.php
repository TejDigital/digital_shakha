<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM program_tbl WHERE program_id = '$id'";

    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title">Program Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./programs.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./program_edit_code.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row['program_id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-3">
                        <Label>interview status</Label>
                        <select name="status" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['program_status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['program_status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control mb-2" name="name" value="<?= $row['program_name'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Type of class</label>
                        <input type="text" class="form-control mb-2" name="type_class" value="<?= $row['program_type_class'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Next Batch</label>
                        <input type="date" class="form-control mb-2" name="next_batch" value="<?= $row['program_next_batch'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">How many Enrolled</label>
                        <input type="number" class="form-control mb-2" name="enroll_count" value="<?= $row['program_enroll_count'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Ratings</label>
                        <input type="text" class="form-control mb-2" name="rating_no" placeholder="4.5" value="<?= $row['program_rating_no'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Review No</label>
                        <input type="text" class="form-control mb-2" name="reviews" value="<?= $row['program_review_no'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Experience Level</label>
                        <select name="experience_level" class="form-select" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['program_experience'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Beginner Level</option>
                            <option <?php if ($row['program_experience'] == 2) {
                                        echo "selected";
                                    } ?> value="2">Mid Level</option>
                            <option <?php if ($row['program_experience'] == 3) {
                                        echo "selected";
                                    } ?> value="3">Advance Level</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Experience text</label>
                        <input type="text" class="form-control mb-2" name="experience_text" value="<?= $row['program_experience_text'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Program duration</label>
                        <input type="text" class="form-control mb-2" name="program_duration" value="<?= $row['program_duration'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="Image">Current Image</label> <br>
                        <img src="./program_images/<?= $row['program_image'] ?>" class="mb-4" style="height: 200px;" alt="">
                        <br>
                        <input type="hidden" name="old_img" value="<?= $row['program_image'] ?>">
                        <label for="">Choose New Image</label>
                        <input type="file" accept=".png , .jpg , .jpeg" name="new_img" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="Image">Current Image2</label> <br>
                        <img src="./program_images/<?= $row['program_image2'] ?>" class="mb-4" style="height: 200px;" alt="">
                        <br>
                        <input type="hidden" name="old_img2" value="<?= $row['program_image2'] ?>">
                        <label for="">Choose New Image</label>
                        <input type="file" accept=".png , .jpg , .jpeg" name="new_img2" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Detail</label>
                        <textarea name="detail" class="form-control mb-2" cols="30" rows="5"><?=$row['program_detail']?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">View Description</label>
                        <textarea name="view_description" class="form-control mb-2 textarea" cols="30" rows="5"><?=$row['program_view_description']?></textarea>
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