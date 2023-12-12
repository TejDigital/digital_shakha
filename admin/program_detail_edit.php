<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM program_detail_tbl WHERE program_detail_id = '$id'";

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
    <h3 class="page-title">Program detail Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./program_details.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./program_detail_edit_code.php" method="post">
                <input type="hidden" value="<?= $row['program_detail_id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Batch Name</label>
                        <select name="program_name" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <?php
                            $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
                            $sql_run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($sql_run)) {
                                foreach ($sql_run as $data) {
                            ?>
                                    <option <?php if ($row['program'] == $data['program_id']) {
                                                echo "selected";
                                            } ?> value="<?= $data['program_id'] ?>"><?= $data['program_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <Label>Status</Label>
                        <select name="status" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['program_detail_status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['program_detail_status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Dropdown days</label>
                        <select name="day" class="form-control mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo '<option value="' . $i . '" ' . ($i == $row['program_detail_dropdown_days'] ? 'selected' : '') . '>' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="">heading</label>
                        <input type="text" class="form-control mb-2" name="heading" value="<?= $row['program_detail_heading'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Dropdown Heading</label>
                        <input type="text" class="form-control mb-2" name="dropdown_heading" placeholder="add dropdown heading" value="<?= $row['program_detail_dropdown_heading'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="">Main Description</label>
                        <textarea name="description" class="form-control mb-2" cols="30" rows="10"><?= $row['program_detail_description'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Dropdown Description</label>
                        <textarea name="dropdown_description" class="form-control mb-2" cols="30" rows="10"><?= $row['program_detail_dropdown_description'] ?></textarea>
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