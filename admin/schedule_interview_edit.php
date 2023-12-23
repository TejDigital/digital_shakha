<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM schedule_interview_tbl WHERE id = '$id'";
    // $sql = "SELECT * FROM application_tbl inner join tbl_states on application_tbl.state=tbl_states.state_id inner join tbl_countries  on application_tbl.country = tbl_countries.country_id inner join tbl_cities on application_tbl.city =  tbl_cities.city_id  WHERE application_tbl.id = '$id'";

    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> schedule_interview Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./schedule_interview.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./schedule_interview_edit_code.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $row['id'] ?>" name="id">
                <Label>interview status</Label>
                <select name="interview_status" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                    <option <?php if ($row['interview_status'] == 1) {
                                echo "selected";
                            } ?> value="1">Done</option>
                    <option <?php if ($row['interview_status'] == 0) {
                                echo "selected";
                            } ?> value="0">Pending</option>
                </select>
                <label for="">Unique Id</label>
                <input type="text" name="unique_id" class="form-control my-2" value="<?= $row['unique_id'] ?>">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control my-2" value="<?= $row['name'] ?>">
                <label for="">email</label>
                <input type="email" name="email" class="form-control my-2" value="<?= $row['email'] ?>">
                <label for="">Phone</label>
                <input type="text" name="phone" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control my-2" value="<?= $row['phone'] ?>">
                <label for="">Position</label>
                <select name="position" class="form-select" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <label for="">Date</label>
                <input type="date" name="date" class="form-control my-2" value="<?= $row['date'] ?>">
                <label for="">Time</label>
                <input type="text" name="time" class="form-control my-2" value="<?= $row['time'] ?>">
                <label for="">Message</label>
                <textarea name="message" cols="30" rows="10" class="form-control"><?= $row['message'] ?></textarea>
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