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
    <h3 class="page-title"> Events </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./events.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_event">ADD</a></li>
        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="./event_code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Program</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Name</label>
                            <input type="text" class="form-control mb-2" name="name">
                        </div>
                        <div class="col-md-4">
                            <label for="">Date</label>
                            <input type="date" class="form-control mb-2" name="date">
                        </div>
                        <div class="col-md-4">
                            <label for="">Address</label>
                            <input type="text" class="form-control mb-2" name="address">
                        </div>
                        <div class="col-md-4">
                            <label for="">Start Time</label>
                            <input type="time" class="form-control mb-2" name="start_time">
                        </div>
                        <div class="col-md-4">
                            <label for="">End Time</label>
                            <input type="time" class="form-control mb-2" name="end_time">
                        </div>
                        <div class="col-md-4">
                            <label for="">Video</label>
                            <input type="file" class="form-control mb-2" name="video">
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                           <textarea name="description" cols="30" rows="5" class="form-control textarea"></textarea>
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

<div class="modal fade" id="event_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./event_delete_code.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="event_delete_id" class="event_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="event_delete" class="btn btn-danger">Delete</button>
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
                                <th> Date</th>
                                <th> Address</th>
                                <th> Status</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM event_tbl  ORDER BY created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $data['event_title'] ?></td>
                                        <td><?= $data['event_date'] ?></td>
                                        <td><?= $data['event_address'] ?></td>
                                        <td><?php
                                            if ($data['event_status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "inactive";
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <a href="./event_edit.php?id=<?= $data['event_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                            <a href="./event_view.php?id=<?= $data['event_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a>
                                            <button type='button' value=<?php echo $data['event_id']; ?> class='btn btn-square action_btn_delete event_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.event_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.event_delete_id').val(user_id);
            $('#event_delete_modal').modal('show');
        });
    });
</script>