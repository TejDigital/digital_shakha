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
    <h3 class="page-title">Employee Contact table</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./employee_contact.php">Home</a></li>
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


<div class="modal fade" id="employee_contact_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Contact</h5>
                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <form action="./employee_contact_delete_code.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="employee_contact_delete_id" class="employee_contact_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="employee_contact_delete" class="btn btn-danger">Delete</button>
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
                                <th> Organization name	</th>
                                <th> Email</th>
                                <th> Phone</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM employee_contact_tbl  ORDER BY created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $data['employee_fullname'] ?></td>
                                        <td><?= $data['employee_organization_name'] ?></td>
                                        <td><?= $data['employee_email'] ?></td>
                                        <td><?= $data['employee_phone'] ?></td>
                                        <td class="text-center">
                                            <a href="./employee_contact_view.php?id=<?= $data['employee_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a>
                                            <button type='button' value=<?php echo $data['employee_id']; ?> class='btn btn-square action_btn_delete employee_contact_delete_btn btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.employee_contact_delete_btn').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.employee_contact_delete_id').val(user_id);
            $('#employee_contact_delete_modal').modal('show');
        });
    });
</script>