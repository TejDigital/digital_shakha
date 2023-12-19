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
    <h3 class="page-title"> Application Amount </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./application_price.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_price">ADD</a></li>
        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_price" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="./application_price_code.php" method="POST" >
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Price</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- <div class="col-md-4">
                            <label for="">Course Name</label>
                            <select name="course" class="form-control mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                <option value="">Select batch</option>
                                <?php
                                // $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
                                // $sql_run = mysqli_query($con, $sql);
                                // if (mysqli_num_rows($sql_run)) {
                                //     foreach ($sql_run as $row) {
                                ?>
                                        <option value="<?= $row['program_id'] ?>"><?= $row['program_name'] ?></option>
                                <?php
                                //     }
                                // }
                                ?>
                            </select>
                        </div> -->
                        <div class="col-md-4">
                            <label for="">Price</label>
                            <input type="number" class="form-control mb-2" name="price">
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

<div class="modal fade" id="price_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./application_price_delete_code.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="price_delete_id" class="price_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="price_delete" class="btn btn-danger">Delete</button>
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
                                <!-- <th> Course </th> -->
                                <th> Price </th>
                                <th> Status</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM application_price_tbl left join program_tbl on application_price_tbl.course_name = program_tbl.program_id ORDER BY application_price_tbl.created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <!-- <td><?php if ($data['program_id'] == $data['course_name']) {
                                                echo $data['program_name'];
                                            } else {
                                                echo "Not Found";
                                            } ?></td> -->
                                        <td><?= $data['price'] ?></td>
                                        <td><?php
                                            if ($data['price_status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "inactive";
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <a href="./application_price_edit.php?id=<?= $data['price_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                            <button type='button' value=<?php echo $data['price_id']; ?> class='btn btn-square action_btn_delete price_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.price_delete').click(function(e) {
            e.prpriceDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.price_delete_id').val(user_id);
            $('#price_delete_modal').modal('show');
        });
    });
</script>