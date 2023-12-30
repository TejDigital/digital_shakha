<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employee_contact_tbl WHERE employee_id = '$id'";
    $sql_run = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $row = mysqli_fetch_assoc($sql_run);
    }
}
?>

<div class="page-header">
    <h3 class="page-title"> Event view </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./employee_contact.php">Home</a></li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="col-md-12 p-0 app-click">
            <div class="row app_view">
                <div class="col-md-4">
                    <label>employee_organization_name</label>
                    <?php if ($row['employee_organization_name'] != '') : ?>
                        <p><?= $row['employee_organization_name'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>employee_industry</label>
                    <?php if ($row['employee_industry'] != '') : ?>
                        <p><?= $row['employee_industry'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>employee_website</label>
                    <?php if ($row['employee_website'] != '') : ?>
                        <p><?= $row['employee_website'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>Status</label>
                    <?php if ($row['employee_status'] != '') : ?>
                        <p><?php if ($row['employee_status'] == 1) {
                                echo "Active";
                            } else {
                                echo "Inactive";
                            }
                            ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>employee_fullname</label>
                    <?php if ($row['employee_fullname'] != '') : ?>
                        <p><?= $row['employee_fullname'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>employee_position</label>
                    <?php if ($row['employee_position'] != '') : ?>
                        <p><?= $row['employee_position'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>employee_email</label>
                    <?php if ($row['employee_email'] != '') : ?>
                        <p><?= $row['employee_email'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>employee_phone</label>
                    <?php if ($row['employee_phone'] != '') : ?>
                        <p><?= $row['employee_phone'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
           
                <div class="col-md-4">
                    <label>hear_about_us</label>
                    <?php if ($row['hear_about_us'] != '') : ?>
                        <p><?= $row['hear_about_us'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>employee_questions</label>
                    <?php if ($row['employee_questions'] != '') : ?>
                        <p><?= $row['employee_questions'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>employee_goal_and_values</label>
                    <?php if ($row['employee_goal_and_values'] != '') : ?>
                        <p><?= $row['employee_goal_and_values'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
                <div class="col-md-4">
                    <label>employee_partnership_interest</label>
                    <?php if ($row['employee_partnership_interest'] != '') : ?>
                        <p><?= $row['employee_partnership_interest'] ?></p>
                    <?php else : ?>
                        <p>Not Found</p>
                    <?php endif ?>
                </div>
               

            </div>
        </div>
    </div>
</div>
<?php
require('./includes/footer.php');
?>
<?php
require('./includes/script.php');
?>