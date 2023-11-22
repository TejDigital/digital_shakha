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
                <Label>interview status</Label>
                <select name="status" class="form-select mb-2"  style="background:#2A3038 !important; color:#fff !important;">
                        <option <?php if ($row['program_status'] == 1) {
                                    echo "selected";
                                } ?> value="1">Active</option>
                        <option <?php if ($row['program_status'] == 0) {
                                    echo "selected";
                                } ?> value="0">inactive</option>
                    </select>
                
                <label for="">Name</label>
                <input type="text" name="name" class="form-control my-2" value="<?= $row['program_name'] ?>">
                <label for="">Detail</label>
                <textarea name="detail" class="form-control mb-3" cols="30" rows="10"><?=$row['program_detail']?></textarea>

                <label for="Image">Current Image</label> <br>
                <img src="./program_images/<?=$row['program_image']?>" class="mb-4" style="width: 200px;" alt="">
                 <br>
                 <input type="hidden" name="old_img" value="<?=$row['program_image']?>">
                 <label for="">Choose New Image</label>
                <input type="file" name="new_img" class="form-control">
              
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