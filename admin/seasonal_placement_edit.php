<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM seasonal_placement_tbl WHERE placement_id = '$id'";
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
            <li class="breadcrumb-item"><a href="./seasonal_placement.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./seasonal_placement_edit_code.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row['placement_id'] ?>" name="id">
                <Label>Placement status</Label>
                <select name="status" class="form-select mb-2"   style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                        <option <?php if ($row['placement_status'] == 1) {
                                    echo "selected";
                                } ?> value="1">Active</option>
                        <option <?php if ($row['placement_status'] == 0) {
                                    echo "selected";
                                } ?> value="0">inactive</option>
                </select>
                
                <label for="">Heading</label>
                <input type="text" name="heading" class="form-control my-2" value="<?= $row['placement_name'] ?>">

                <label for="">Detail</label>
                <textarea name="detail" class="form-control mb-3" cols="30" rows="10"><?=$row['placement_detail']?></textarea>

                <label for="">Date</label>
                <input type="date" name="date" class="form-control my-2" value="<?= $row['placement_date'] ?>">

                <label for="">Deadline Date</label>
                <input type="date" name="end_date" class="form-control my-2" value="<?= $row['placement_date_deadline'] ?>">

                <label for="Image">Front Image</label> <br>
                <img src="./seasonal_placement_images/<?=$row['placement_front_image']?>" class="mb-4" style="width: 200px;" alt="">
                 <br>
                 <input type="hidden" name="old_img1" value="<?=$row['placement_front_image']?>">
                 <label for="">Choose New Image</label>
                <input type="file" name="new_img1" class="form-control">

                <label for="Image">Back Image</label> <br>
                <img src="./seasonal_placement_images/<?=$row['placement_back_image']?>" class="mb-4" style="width: 200px;" alt="">
                 <br>
                 <input type="hidden" name="old_img2" value="<?= $row['placement_back_image']?>">
                 <label for="">Choose New Image</label>
                <input type="file" name="new_img2" class="form-control">

                <label >Description</label> <br>
                <textarea name="description" class="form-control" cols="30" rows="10"> <?= $row['placement_description']?> </textarea>

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