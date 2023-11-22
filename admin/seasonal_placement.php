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
    <h3 class="page-title"> Seasonal Placement Table </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./seasonal_placement.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_seasonal_placement">ADD</a></li>
        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_seasonal_placement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="./seasonal_placement_code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Heading</label>
                            <input type="text" class="form-control mb-2" name="heading">
                        </div>

                        <div class="col-md-6">
                            <label for="">Mini detail</label>
                            <input type="text" class="form-control mb-2" name="mini_detail">
                        </div>

                        <div class="col-md-6">
                            <label for="">Date</label>
                            <input type="text" class="form-control mb-2" name="date">
                        </div>

                        <div class="col-md-6">
                            <label for="">Deadline Date</label>
                            <input type="text" class="form-control mb-2" name="end_date">
                        </div>

                        <div class="col-md-6">
                            <label for="">front Image</label>
                            <input type="file" class="form-control mb-2" name="front_image">
                        </div>

                        <div class="col-md-6">
                            <label for="">Main Image</label>
                            <input type="file" class="form-control mb-2" name="back_image">
                        </div>

                        <div class="col-md-6">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
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

<div class="modal fade" id="seasonal_placement_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./seasonal_placement_delete_code.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="seasonal_placement_id" class="seasonal_placement_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="seasonal_placement_delete" class="btn btn-danger">Delete</button>
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
                            $sql = "SELECT * FROM seasonal_placement_tbl  ORDER BY created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $data['placement_name'] ?></td>
                                        <td><?= $data['placement_detail'] ?></td>
                                        <td><?php
                                            if ($data['placement_status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "inactive";
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <a href="./seasonal_placement_edit.php?id=<?= $data['placement_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                            <a href="./seasonal_placement_view.php?id=<?= $data['placement_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a>
                                            <button type='button' value=<?php echo $data['placement_id']; ?> class='btn btn-square action_btn_delete seasonal_placement_btn btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.seasonal_placement_btn').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            $('.seasonal_placement_id').val(user_id);
            $('#seasonal_placement_modal').modal('show');
        });
    });
</script>