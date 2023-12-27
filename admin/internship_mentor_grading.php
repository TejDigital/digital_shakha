<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');
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
    <h3 class="page-title"> Mentor Grading </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./internship_mentor_grading.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_grading">ADD</a></li>
        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_grading" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="./internship_mentor_grading_code.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add info</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Course Name</label>
                            <select name="std_name" class="form-control mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                <option value="">Select Student</option>
                                <?php
                                $sql = "SELECT * FROM application_tbl WHERE status = 1";
                                $sql_run = mysqli_query($con, $sql);
                                if (mysqli_num_rows($sql_run)) {
                                    foreach ($sql_run as $row) {
                                ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?> <?= $row['last_name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class='col-md-12'>
                            <label>Mentor Grading</label>
                            <select name="mentor_grading" class='form-select mb-2' style='appearance: revert;background:#2A3038 !important; color:#fff !important;'>
                                <option value="0">Add Mentor grade</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class='col-md-12'>
                            <label>Milestone Completed</label>
                            <select name="milestone_completed" class='form-select mb-2' style='appearance: revert;background:#2A3038 !important; color:#fff !important;'>
                                <option value="0">Add Milestone Completed</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="grading_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./internship_mentor_grading_delete.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="grading_delete_id" class="grading_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="grading_delete" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Student name</th>
                                <th> Course Name</th>
                                <th> Mentor Grading</th>
                                <th> Milestone Completed</th>
                                <th> Status</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM internship_mentor_grading_tbl left join application_tbl on internship_mentor_grading_tbl.app_id = application_tbl.id ORDER BY internship_mentor_grading_tbl.created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                                    $program_query = "SELECT * FROM program_tbl where program_id = '" . $data['course'] . "'";
                                    $program_query_run = mysqli_query($con, $program_query);
                                    if (mysqli_num_rows($program_query_run) > 0) {
                                        $program = mysqli_fetch_assoc($program_query_run);

                            ?>
                                        <tr>
                                            <td><?= $count++ ?></td>
                                            <td><?php if ($data['id'] == $data['app_id']) {
                                                    echo  $row['name'] . " " . $row['last_name'];
                                                } else {
                                                    echo "Not Found";
                                                } ?></td>
                                            <td><?php if($data['course'] == $program['program_id']){echo $program['program_name'] ;} ?></td>
                                            <td><?= $data['mentor_grading'] ?></td>
                                            <td><?= $data['milestone_completed'] ?></td>
                                            <td><?php
                                                if ($data['mentor_grading_status'] == 1) {
                                                    echo "Active";
                                                } else {
                                                    echo "inactive";
                                                }
                                                ?></td>
                                            <td class="text-center">
                                                <a href="./internship_mentor_grading_edit.php?id=<?= $data['mentor_grading_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>

                                                <button type='button' value=<?php echo $data['mentor_grading_id']; ?> class='btn btn-square action_btn_delete grading_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('./includes/footer.php');
require('./includes/script.php');
?>
<script>
    // -----------------------delete------------------------
    $(document).ready(function() {
        $('.grading_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.grading_delete_id').val(user_id);
            $('#grading_delete_modal').modal('show');
        });
    });
</script>