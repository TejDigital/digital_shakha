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
    <h3 class="page-title"> Programs table </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./programs.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_program">ADD</a></li>
        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_program" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="./program_code.php" method="POST" enctype="multipart/form-data" id="program_form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Program</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="">Name</label>
                            <input type="text" class="form-control " name="name">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Image</label>
                            <input type="file" accept=".png , .jpg , .jpeg" class="form-control " name="image">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">View Image</label>
                            <input type="file" accept=".png , .jpg , .jpeg" class="form-control " name="image2">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Type of class</label>
                            <input type="text" class="form-control " name="type_class">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Next Batch</label>
                            <input type="date" class="form-control " name="next_batch">
                            <!-- <select name="next_batch" class="form-select" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                            <option value="">Select batch</option>
                            <?php
                            $sql = "SELECT * FROM upcoming_batch_tbl Where availability = '1'";
                            $sql_run = mysqli_query($con, $sql);
                            if (mysqli_num_rows($sql_run) > 0) {
                                foreach ($sql_run as $row) {
                            ?>
                                <option value="<?= $row['batch_id'] ?>"><?= $row['batch_name'] ?></option>
                                <?php
                                }
                            }
                                ?>
                            </select> -->
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">How many Enrolled</label>
                            <input type="number" class="form-control " name="enroll_count">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Ratings</label>
                            <input type="text" class="form-control " name="rating_no" placeholder="4.5">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Review No</label>
                            <input type="text" class="form-control " name="reviews">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Experience Level</label>
                            <select name="experience_level" class="form-select" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                <option value="">Select Level</option>
                                <option value="1">Beginner Level</option>
                                <option value="2">Mid Level</option>
                                <option value="3">Advance Level</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Experience text</label>
                            <input type="text" class="form-control " name="experience_text">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Program duration</label>
                            <input type="text" class="form-control " name="program_duration">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="">Detail</label>
                            <textarea name="detail" class="form-control " cols="30" rows="5"></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="">View Description</label>
                            <textarea name="view_description" class="form-control  textarea" cols="30" rows="10"></textarea>
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

<div class="modal fade" id="program_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./program_delete_code.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="program_delete_id" class="program_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="program_delete" class="btn btn-danger">Delete</button>
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
                                <th> Name </th>
                                <th> Detail</th>
                                <th> Status</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM program_tbl  ORDER BY created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $data['program_name'] ?></td>
                                        <td><?= $data['program_detail'] ?></td>
                                        <td><?php
                                            if ($data['program_status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "inactive";
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <a href="./program_edit.php?id=<?= $data['program_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                            <a href="./program_view.php?id=<?= $data['program_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a>
                                            <button type='button' value=<?php echo $data['program_id']; ?> class='btn btn-square action_btn_delete program_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.program_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.program_delete_id').val(user_id);
            $('#program_delete_modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {

        var form = $('#program_form');
        $.validator.addMethod(
            "fileExtension",
            function(value, element) {
                // Get the file extension
                var extension = value.split(".").pop().toLowerCase();
                // Check if the extension is either 'jpg', 'jpeg', 'png', or 'pdf'
                return ["jpg", "jpeg", "png"].indexOf(extension) !== -1;
            },
            "Please select a valid file type (jpg, jpeg, png)."
        );
        form.validate({
            rules: {
                name: {
                    required: true,
                },
                image: {
                    required: true,
                    fileExtension: true,
                },
                image2: {
                    required: true,
                    fileExtension: true,
                },
                type_class: {
                    required: true,
                },
                next_batch: {
                    required: true,
                },
                enroll_count: {
                    required: true,
                },
                rating_no: {
                    required: true,
                },
                reviews: {
                    required: true,
                },
                experience_level: {
                    required: true,
                },
                experience_text: {
                    required: true,
                },
                program_duration: {
                    required: true,
                },
                detail: {
                    required: true,
                },
                view_description: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please select batch program",
                },
                image: {
                    required: "Please choose a file.",
                    fileExtension: "Please select a valid file type (jpg, jpeg, png).",
                },
                image2: {
                    required: "Please choose a file.",
                    fileExtension: "Please select a valid file type (jpg, jpeg, png).",
                },
                type_class: {
                    required: "Please Enter class.",
                },
                next_batch: {
                    required: "Please Enter Date.",
                },
                enroll_count: {
                    required: "Please Enter Number.",
                },
                rating_no: {
                    required: "Please Enter rating.",
                },
                reviews: {
                    required: "Please Enter review.",
                },
                experience_level: {
                    required: "Please select experience level.",
                },
                experience_text: {
                    required: "Please enter experience_text.",
                },
                program_duration: {
                    required: "Please enter program duration.",
                },
                detail: {
                    required: "Please enter detail.",
                },
                view_description: {
                    required: "Please enter view_description.",
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