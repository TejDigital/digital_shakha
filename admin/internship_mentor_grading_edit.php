<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM internship_mentor_grading_tbl WHERE mentor_grading_id = '$id'";

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
    <h3 class="page-title">Mentor Grading Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./internship_mentor_grading.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./internship_mentor_grading_edit_code.php" method="post">
                <input type="hidden" value="<?= $row['mentor_grading_id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Batch Name</label>
                        <select name="std_name" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <?php
                            $sql = "SELECT * FROM application_tbl WHERE status = 1";
                            $sql_run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($sql_run)) {
                                foreach ($sql_run as $data) {
                            ?>
                                    <option <?php if ($row['app_id'] == $data['id']) {
                                                echo "selected";
                                            } ?> value="<?= $data['id'] ?>"><?= $data['name'] ?> <?= $data['last_name'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class='col-md-4'>
                        <label>Mentor Grading</label>
                        <select name="mentor_grading" class='form-select mb-2' style='appearance: revert;background:#2A3038 !important; color:#fff !important;'>
                        <?php
                            for ($i = 1; $i <= 10; $i++) {
                                echo '<option value="' . $i . '" ' . ($i == $row['mentor_grading'] ? 'selected' : '') . '>' . $i . '</option>';
                            }
                            ?>
                           
                        </select>
                    </div>
                    <div class='col-md-4'>
                        <label>Milestone Completed</label>
                        <select name="milestone_completed" class='form-select mb-2' style='appearance: revert;background:#2A3038 !important; color:#fff !important;'>
                        <?php
                         for ($i = 1; $i <= 8; $i++) {
                            echo '<option value="' . $i . '" ' . ($i == $row['milestone_completed'] ? 'selected' : '') . '>' . $i . '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <Label>Status</Label>
                        <select name="status" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['mentor_grading_status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['mentor_grading_status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
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