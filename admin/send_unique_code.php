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
    <h3 class="page-title"> Unique code for schedule interview </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./send_unique_code.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_unique_code">Send code</a></li>
        </ol>
    </nav>
</div>
<div class="modal fade" id="Add_unique_code" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form action="./send_unique_code_code.php" method="POST" enctype="multipart/form-data" id="myForm">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="exampleModalLabel"></h1> -->
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="email" class="form-control mb-2" name="email">
                        </div>
                        <div class="col-md-12">
                            <label for="">Unique Code</label>
                            <input type="text" name="code" class="form-control mb-2">
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

<div class="modal fade" id="unique_code_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete code</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./send_unique_code_delete.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="unique_code_id" class="unique_code_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="unique_code_delete" class="btn btn-danger">Delete</button>
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
                                <th> email </th>
                                <th> code</th>
                                <th> Status</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM unique_code_tbl  ORDER BY created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $data['email'] ?></td>
                                        <td><?= $data['unique_code'] ?></td>
                                        <td><?php
                                            if ($data['status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "inactive";
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <!-- <a href="./unique_code_edit.php?id=<?= $data['code_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a> -->
                                            <button type='button' value=<?php echo $data['code_id']; ?> class='btn btn-square action_btn_delete unique_code_btn btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.unique_code_btn').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('.unique_code_id').val(user_id);
            $('#unique_code_modal').modal('show');
        });
    });
</script>
<script>
    // ----------------number_validation-----------------------
    function validateNumber(elem, alertId) {
        if (isNaN(elem.value)) {
            document.getElementById(alertId).innerHTML = " * Enter Only Number";
        } else if (elem.value.length !== 6) {
            document.getElementById(alertId).innerHTML = "* Enter Only 6 digits";
        } else {
            document.getElementById(alertId).innerHTML = "";
        }
    }
</script>
<script>
    $(document).ready(function() {
        var form = $('#myForm');
        form.validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                code: {
                    required: true,
                    digits: true,
                    minlength: 6,
                    maxlength: 6
                }
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                code: {
                    required: "Please enter the unique code",
                    digits: "Please enter a valid 6-digit code",
                    minlength: "Code must be 6 digits",
                    maxlength: "Code must be 6 digits"
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
