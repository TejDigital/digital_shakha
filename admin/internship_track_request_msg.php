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
    <h3 class="page-title">Internship track request table</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./internship_request_msg.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_event">ADD</a></li> -->
        </ol>
    </nav>
</div>


<div class="modal fade" id="internship_request_msg_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Request</h5>
                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <form action="./internship_request_msg_delete.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="internship_request_msg_delete_id" class="internship_request_msg_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="internship_request_msg_delete" class="btn btn-danger">Delete</button>
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
                                <th> Course </th>
                                <th> Email</th>
                                <th> Phone</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM internship_request_msg_tbl left join application_tbl on  internship_request_msg_tbl.app_id = application_tbl.id Order by internship_request_msg_tbl.created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                                    $program = $data['course'];
                                    $program_query = "SELECT * FROM program_tbl WHERE program_id = '$program'";
                                    $program_query_run = mysqli_query($con, $program_query);
                                    if (mysqli_num_rows($program_query_run) > 0) {
                                        $row = mysqli_fetch_assoc($program_query_run);
                            ?>
                                        <tr>
                                            <td><?= $count++ ?></td>
                                            <td><?= $data['name'] ?> <?= $data['last_name'] ?> </td>
                                            <td><?= $row['program_name'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['phone'] ?></td>
                                            <td class="text-center">
                                                <a href="./internship_request_msg_view.php?id=<?= $data['request_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a>
                                                <button type='button' value=<?php echo $data['request_id']; ?> class='btn btn-square action_btn_delete internship_request_msg_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.internship_request_msg_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.internship_request_msg_delete_id').val(user_id);
            $('#internship_request_msg_delete_modal').modal('show');
        });
    });
</script>