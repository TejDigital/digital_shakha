<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM faqs_tbl WHERE faqs_id = '$id'";

    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> FAQs Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./faqs.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <form action="./faqs_edit_code.php" method="post">
                <input type="hidden" value="<?= $row['faqs_id'] ?>" name="id">
                <div class="row">
                    <div class="col-md-12">
                        <Label>Status</Label>
                        <select name="status" class="form-select mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option <?php if ($row['faq_status'] == 1) {
                                        echo "selected";
                                    } ?> value="1">Active</option>
                            <option <?php if ($row['faq_status'] == 0) {
                                        echo "selected";
                                    } ?> value="0">inactive</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Question</label>
                        <textarea name="question" class="form-control mb-2" cols="30" rows="5"><?= $row['faq_question'] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Answer</label>
                        <textarea name="answer" class="form-control mb-2" cols="30" rows="5"><?= $row['faq_ans'] ?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning" style="margin-top: 5rem;" name="update">Update</button>
            </form>
        </div>
    </div>
</div>
<?php
require('./includes/footer.php');
?>

<?php
require('./includes/script.php');
?>