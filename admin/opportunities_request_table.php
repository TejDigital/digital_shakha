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
    <h3 class="page-title">Opportunities request table</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./opportunities_request_table.php">Home</a></li>
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


<div class="modal fade" id="opportunities_request_table_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Registration</h5>
                <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">
                    X
                </button>
            </div>
            <form action="./opportunities_request_delete.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="opportunities_request_table_delete_id" class="opportunities_request_table_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="opportunities_request_table_delete" class="btn btn-danger">Delete</button>
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
                                <th> opportunities</th>
                                <th> Email</th>
                                <th> File</th>
                                <th> Phone</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM opportunities_request_tbl left join opportunities_tbl on opportunities_request_tbl.opportunities_id = opportunities_tbl.opp_id  ORDER BY opportunities_request_tbl.created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $data['name'] ?></td>
                                        <td><?php if($data['opportunities_id'] == $data['opp_id']){echo $data['opp_name'];} ?></td>
                                        <td><?php echo $data['opp_name'] ?></td>
                                        <td><a target="_blank" href="./opportunities_request_files/<?= $data['image'] ?>"><?= $data['image'] ?></a></td>
                                        <td><?= $data['email'] ?></td>
                                        <td><?= $data['phone'] ?></td>
                                        <td class="text-center">
                                            <!-- <a href="./event_view.php?id=<?= $data['opportunities_request_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a> -->
                                            <button type='button' value=<?php echo $data['opportunities_request_id']; ?> class='btn btn-square action_btn_delete opportunities_request_table_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.opportunities_request_table_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.opportunities_request_table_delete_id').val(user_id);
            $('#opportunities_request_table_delete_modal').modal('show');
        });
    });
</script>