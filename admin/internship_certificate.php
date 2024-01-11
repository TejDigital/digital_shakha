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
    <h3 class="page-title"> Course certificate </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./internship_certificate.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_internship_certificate">ADD</a></li>
        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_internship_certificate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="./internship_certificate_code.php" method="POST" enctype="multipart/form-data" id="internship_certificate_form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add certificate</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Student Name</label>
                            <select name="std_name" class="form-control mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                <option value="">Select student</option>
                                <?php
                                $sql = "SELECT * FROM application_tbl";
                                $sql_run = mysqli_query($con, $sql);
                                if (mysqli_num_rows($sql_run)) {
                                    foreach ($sql_run as $row) {
                                        $course = $row['course'];
                                        $sql2 = "SELECT * FROM program_tbl where program_id = '$course'";
                                        $sql_run2 = mysqli_query($con, $sql2);
                                        if (mysqli_num_rows($sql_run2) > 0) {
                                            $program = mysqli_fetch_assoc($sql_run2);

                                ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?> <?= $row['last_name'] ?> : <?= $program['program_name'] ?></option>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="">File</label>
                            <input type="file" class="form-control mb-2" name="file">
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

<div class="modal fade" id="certificate_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./internship_certificate_delete.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="certificate_delete_id" class="certificate_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="certificate_delete" class="btn btn-danger">Delete</button>
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
                                <th> Student name </th>
                                <th> Course </th>
                                <th> certificate</th>
                                <th> Status</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM internship_certificate_tbl left join application_tbl on internship_certificate_tbl.app_id = application_tbl.id left join program_tbl on internship_certificate_tbl.program = program_tbl.program_id ORDER BY internship_certificate_tbl.created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?php if ($data['id'] == $data['app_id']) {
                                                echo $data['name'] . " " . $data['last_name'];
                                            } else {
                                                echo "Not Found";
                                            } ?></td>
                                        <td><?php if ($data['program_id'] == $data['program']) {
                                                echo $data['program_name'];
                                            } else {
                                                echo "Not Found";
                                            } ?></td>
                                        <td><a href="./certificate_files/<?= $data['file'] ?>" target="_blank"><?= $data['file'] ?></a></td>
                                        <td><?php
                                            if ($data['certificate_status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "inactive";
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <a href="./internship_certificate_edit.php?id=<?= $data['certificate_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                            <!-- <a href="./event_view.php?id=<?= $data['certificate_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a> -->
                                            <button type='button' value=<?php echo $data['certificate_id']; ?> class='btn btn-square action_btn_delete certificate_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.certificate_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.certificate_delete_id').val(user_id);
            $('#certificate_delete_modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.validator.addMethod(
            "fileExtension",
            function(value, element) {
                // Get the file extension
                var extension = value.split(".").pop().toLowerCase();
                // Check if the extension is either 'jpg', 'jpeg', 'png', or 'pdf'
                return ["jpg", "jpeg", "png", "pdf", "doc"].indexOf(extension) !== -1;
            },
            "Please select a valid file type (jpg, jpeg, png, pdf ,doc)."
        );
        var form = $('#internship_certificate_form');
        form.validate({
            rules: {
                file: {
                    required: true,
                    fileExtension: true,
                },
                std_name: {
                    required: true,
                }
            },
            messages: {
                file: {
                    required: "Please choose a file.",
                    fileExtension: "Please select a valid file type (jpg, jpeg, png, pdf,doc).",
                },
                std_name: {
                    required: "Please select student",
                }
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