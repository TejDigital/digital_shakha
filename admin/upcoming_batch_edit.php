<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM upcoming_batch_tbl WHERE batch_id = '$id'";

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
    <h3 class="page-title">Upcoming batch Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./upcoming_batches.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./upcoming_batch_edit_code.php" method="post">
                <input type="hidden" value="<?= $row['batch_id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Batch Name</label>
                        <select name="name" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <?php
                            $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
                            $sql_run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($sql_run)) {
                                foreach ($sql_run as $data) {
                            ?>
                                    <option <?php if ($row['batch_name'] == $data['program_id']) {
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
                            <option <?php if ($row['batch_status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['batch_status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control my-2" style="appearance: revert;" value="<?= $row['batch_date'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Start time</label>
                        <input type="time" name="start_time" class="form-control my-2" style="appearance: revert;" value="<?= $row['batch_start_time'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Batch mode</label>
                        <select name="mode" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['batch_mode'] == "Online") {
                                        echo "selected";
                                    } ?> value="Online">Online</option>
                            <option <?php if ($row['batch_mode'] == "Offline") {
                                        echo "selected";
                                    } ?> value="Offline">Offline</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">End time</label>
                        <input type="time" name="end_time" style="appearance: revert;" class="form-control my-2" value="<?= $row['batch_end_time'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Availability</label>
                        <select name="availability" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['availability'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Available</option>
                            <option <?php if ($row['availability'] == 0) {
                                        echo "selected";
                                    } ?> value="0">Batch Full</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control my-2" value="<?= $row['batch_address'] ?>">
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