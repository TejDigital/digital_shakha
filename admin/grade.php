<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');

if (isset($_GET['grade_id'])) {
    $id = $_GET['grade_id'];
    $garde_query = "SELECT * FROM application_tbl WHERE id = '$id'";
    $garde_query_run = mysqli_query($con, $garde_query);
    if (mysqli_num_rows($garde_query_run) > 0) {
        $row = mysqli_fetch_assoc($garde_query_run);
        $duration = $row['duration'];
        $app_id = $row['id'];
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
    <h3 class="page-title"><?= $row['name'] ?> <?= $row['last_name'] ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./internship_track_grade.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php
            $sql = "SELECT * FROM internship_grade_tbl WHERE app_id = '$app_id'";
            $sql_run = mysqli_query($con, $sql);
            if (mysqli_num_rows($sql_run) > 0) {
                echo "";
            } else {
                echo "<li class='breadcrumb-item'><a class='btn btn-sm btn-info' data-bs-toggle='modal' data-bs-target='#Add_grade'>ADD</a></li>";
            }
            ?>

        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_grade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="./internship_track_grade_code.php" method="POST" enctype="multipart/form-data" id="internship_track_grade_form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Grade</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="course" value="<?= $row['course'] ?>">
                    <input type="hidden" name="app_id" value="<?= $row['id'] ?>">
                    <?php
                    for ($i = 1; $i <= $duration; $i++) {
                        $table = "<div class='row'>
                        <div class='col-md-3 text-center d-flex align-items-center justify-content-center'>
                            <h3>Month " . $i . "</h3>
                        </div>
                        <div class='col-md-3'>
                            <label for=''>Grade Status</label>
                            <select name='grade_status[]' class='form-select mb-2' style='appearance: revert;background:#2A3038 !important; color:#fff !important;'>
                            <option value=''>Select Grade status</option>
                            <option value='0'>--</option>
                            <option value='1'>Complete</option>
                            <option value='2'>Due</option>
                            </select>
                        </div>
                        <div class='col-md-3'>
                            <label > Grade Weight </label>
                            <input type='number' name='weight[]' class='form-control mb-2' oninput='javascript: if (this.value > 20) this.value = 20;'>
                        </div>
                        <div class='col-md-3'>
                            <label > Main Grade </label>
                            <input type='number' name='main_grade[]' class='form-control mb-2'>
                        </div>
                    </div>";
                        echo $table;
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="grade_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./internship_track_grade_delete.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="grade_delete_id" class="grade_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="grade_delete" class="btn btn-danger">Delete</button>
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
                                <th> Month</th>
                                <th> Grade Status</th>
                                <th> Weight </th>
                                <th> Grade </th>
                                <th class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM internship_grade_tbl WHERE app_id = '$id' ORDER BY created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            $count1 = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td>Month <?= $count1++ ?></td>
                                        <td>
                                            <?php if ($data['grade_status_main'] == 2) {
                                                echo "Due";
                                            } elseif ($data['grade_status_main'] == 1) {
                                                echo "Complete";
                                            } else {
                                                echo "--";
                                            } ?>
                                        </td>
                                        <td><?php if ($data['grade_weight'] != '') {
                                                echo $data['grade_weight'];
                                                echo "%";
                                            } else {
                                                echo "--";
                                            } ?></td>
                                        <td><?php if ($data['grade_percent'] != '') {
                                                echo $data['grade_percent'];
                                                echo "%";
                                            } else {
                                                echo "--";
                                            } ?></td>
                                        <td class="text-center">
                                            <a href="./internship_track_grade_edit.php?id=<?= $data['grade_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                            <a href="./internship_track_grade_view.php?id=<?= $data['grade_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a>
                                            <button type='button' value="<?php echo $data['grade_id']; ?>" class="btn btn-square action_btn_delete grade_delete btn-sm my-1"><i class="fa-solid fa-trash m-0"></i></button>
                                        </td>
                                    </tr>
                            <?php
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
        $('.grade_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.grade_delete_id').val(user_id);
            $('#grade_delete_modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {

        var form = $('#internship_track_grade_form');
        form.validate({
            rules: {
                grade_status: {
                    required: true,
                },
                weight: {
                    required: true,
                    digits: true,
                },
                main_grade: {
                    required: true,
                    digits: true,
                }
            },
            messages: {
                weight: {
                    required: "Please enter weight",
                    digits: "Please enter a valid number",
                },
                main_grade: {
                    required: "Please enter main grade",
                    digits: "Please enter a valid number",

                },
                grade_status: {
                    required: "Please select student",
                },
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
                error.addClass("error-message");
            }
        });

        form.submit(function(event) {
            if (form.valid()) {
                // Your form is valid, you can submit it here
            } else {
                // Form is not valid, do something (e.g., prevent default submission)
                event.preventDefault();
            }
        });
    });
</script>