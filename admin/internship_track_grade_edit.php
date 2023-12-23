<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM internship_grade_tbl WHERE grade_id = '$id'";

    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
        $app_id = $row['app_id'];
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
    <h3 class="page-title">Grade Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./grade.php?grade_id=<?= $app_id ?>">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./internship_track_grade_edit_code.php" method="post">
                <input type="hidden" value="<?= $row['grade_id'] ?>" name="id">
                <input type="hidden" value="<?= $row['app_id'] ?>" name="app_id">
                <div class="row">
                    <div class='col-md-3 text-start d-flex align-items-center justify-content-start'>
                        <p class="m-0 ">Month <?= $row['grade_id'] ?></p>
                    </div>
                    <div class='col-md-3'>
                        <label for=''>Grade Status</label>
                        <select name='grade_status' class='form-select mb-2' style='appearance: revert;background:#2A3038 !important; color:#fff !important;'>
                            <option <?php if ($row['grade_status_main'] == 0) {
                                        echo "selected";
                                    } ?> value='0'>--</option>
                            <option <?php if ($row['grade_status_main'] == 1) {
                                        echo "selected";
                                    } ?> value='1'>Complete</option>
                            <option <?php if ($row['grade_status_main'] == 2) {
                                        echo "selected";
                                    } ?> value='2'>Due</option>
                        </select>

                    </div>
                    <div class='col-md-3'>
                        <label> Grade Weight </label>
                        <input type='number' value="<?= $row['grade_weight'] ?>" name='weight' class='form-control mb-2' oninput="javascript: if (this.value > 20) this.value = 20;">

                    </div>
                    <div class='col-md-3'>
                        <label> Main Grade </label>
                        <input type='number' value="<?= $row['grade_percent'] ?>" name='main_grade' class='form-control mb-2'>
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