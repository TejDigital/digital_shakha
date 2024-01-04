<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM internship_certificate_tbl WHERE certificate_id  = '$id'";

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
    <h3 class="page-title">course Certificate Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./internship_certificate.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./internship_certificate_edit_code.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row['certificate_id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Student Name</label>
                        <select name="std_name" class="form-control mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                <?php
                                $sql = "SELECT * FROM application_tbl";
                                $sql_run = mysqli_query($con, $sql);
                                if (mysqli_num_rows($sql_run)) {
                                    foreach ($sql_run as $row2) {
                                        $course = $row2['course'];
                                        $sql2 = "SELECT * FROM program_tbl where program_id = '$course'";
                                        $sql_run2 = mysqli_query($con, $sql2);
                                        if (mysqli_num_rows($sql_run2) > 0) {
                                            $program = mysqli_fetch_assoc($sql_run2);
                                ?>
                                <option <?php if ($row['app_id'] == $row2['id']) {echo "selected"; } ?> value="<?= $row2['id'] ?>"><?= $row2['name'] ?> <?= $row2['last_name'] ?> : <?= $program['program_name'] ?></option>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <div class="col-md-4">
                        <Label>Status</Label>
                        <select name="status" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['certificate_status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['certificate_status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="">Current File</label> <br>
                        <a href="./certificate_files/<?= $row['file'] ?>" target="_blank">Click to view</a>
                        <br>
                        <input type="hidden" name="old_file" value="<?= $row['file'] ?>">
                        <label for="">Choose New File</label>
                        <input type="file" accept=".jpg , .jpeg , .png , .pdf , .doc , .docx" name="new_file" class="form-control">
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