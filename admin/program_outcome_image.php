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
    <h3 class="page-title">Program outcome_image</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./program_outcome_image.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_outcome_image">ADD</a></li>
        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_outcome_image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="./program_outcome_image_code.php" method="POST" enctype="multipart/form-data" id="program_outcome_image_form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add outcome_image</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="">Program name</label>
                            <select name="program_name" class="form-control "  style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                <option value="">Select Program</option>
                                <?php
                                $sql = "SELECT * from program_tbl where program_status = 1";
                                $sql_run = mysqli_query($con, $sql);
                                if (mysqli_num_rows($sql_run)) {
                                    foreach ($sql_run as $row) {
                                ?>
                                        <option value="<?= $row['program_id'] ?>"><?= $row['program_name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-5"> 
                            <label for="">outcome_image</label>
                            <input type="file" class="form-control " name="image">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="">outcome heading 1</label>
                            <input type="text" class="form-control " name="heading1">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="">outcome heading 2</label>
                            <input type="text" class="form-control " name="heading2">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="">outcome heading 3</label>
                            <input type="text" class="form-control " name="heading3">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="">outcome description 1</label>
                            <input type="text" class="form-control " name="description1">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="">outcome description 2</label>
                            <input type="text" class="form-control " name="description2">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="">outcome description 3</label>
                            <input type="text" class="form-control " name="description3">
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

<div class="modal fade" id="program_outcome_image_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Program outcome_image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./program_outcome_image_delete.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="program_outcome_image_delete_id" class="program_outcome_image_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="program_outcome_image_delete" class="btn btn-danger">Delete</button>
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
                                <th> Program Name </th>
                                <th> Name </th>
                                <th> Status</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM program_image_tbl left join program_tbl on program_image_tbl.program = program_tbl.program_id ORDER BY program_image_tbl.created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?php if ($data['program_id'] == $data['program']) {
                                                echo $data['program_name'];
                                            } ?></td>
                                        <td><?= $data['program_image_heading_1'] ?></td>
                                        <td><?php
                                            if ($data['program_image_status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "inactive";
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <a href="./program_outcome_image_edit.php?id=<?= $data['program_image_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                            <a href="./program_outcome_image_view.php?id=<?= $data['program_image_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a>
                                            <button type='button' value=<?php echo $data['program_image_id']; ?> class='btn btn-square action_btn_delete program_outcome_image_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.program_outcome_image_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.program_outcome_image_delete_id').val(user_id);
            $('#program_outcome_image_delete_modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {

        var form = $('#program_outcome_image_form');
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
                program_name: {
                    required: true,
                },
                image: {
                    required: true,
                    fileExtension: true,
                },
                heading1: {
                    required: true,
                },
                heading2: {
                    required: true,
                },
                heading3: {
                    required: true,
                },
                description1: {
                    required: true,
                },
                description2: {
                    required: true,
                },
                description3: {
                    required: true,
                },
            },
            messages: {
                program_name: {
                    required: "Please select program ",
                },
                image: {
                    required: "Please choose a file.",
                    fileExtension: "Please select a valid file type (jpg, jpeg, png).",
                },
                heading1: {
                    required: "Please enter heading1.",
                },
                heading2: {
                    required: "Please enter heading2.",
                },
                heading3: {
                    required: "Please enter heading3.",
                },
                description1: {
                    required: "Please enter description1.",
                },
                description2: {
                    required: "Please enter description2.",
                },
                description3: {
                    required: "Please enter description3.",
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