<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM application_price_tbl WHERE price_id = '$id'";

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
    <h3 class="page-title">Application Amount Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./application_price.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./application_price_edit_code.php" method="post">
                <input type="hidden" value="<?= $row['price_id'] ?>" name="id">
                <div class="row">
                    <!-- <div class="col-md-4">
                        <label for="">Batch Name</label>
                        <select name="course6" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <?php
                            // $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
                            // $sql_run = mysqli_query($con, $sql);
                            // if (mysqli_num_rows($sql_run)) {
                            //     foreach ($sql_run as $data) {
                            ?>
                                    <option <?php if ($row['course_name'] == $data['program_id']) {
                                                echo "selected";
                                            } ?> value="<?= $data['program_id'] ?>"><?= $data['program_name'] ?></option>
                            <?php
                            //     }
                            // }
                            ?>
                        </select>
                    </div> -->
                    <div class="col-md-4">
                        <Label>Status</Label>
                        <select name="status" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['price_status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['price_status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control my-2" value="<?= $row['price'] ?>">
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