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
    <h3 class="page-title"> Course Material </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./internship_track_course_material.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_material">ADD</a></li>
        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_material" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="./internship_track_course_material_code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Material</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Course Name</label>
                            <select name="name" class="form-control mb-2" style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                <option value="">Select Course</option>
                                <?php
                                $sql = "SELECT * FROM program_tbl WHERE program_status = 1";
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
                        <div class="col-md-12">
                            <label for="">File Name</label>
                            <input type="text" class="form-control mb-2" name="material_name">
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

<div class="modal fade" id="material_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Material</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./internship_track_course_material_delete.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="material_delete_id" class="material_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="material_delete" class="btn btn-danger">Delete</button>
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
                                <th> Course name </th>
                                <th> Material name </th>
                                <th> Material</th>
                                <th> Status</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM internship_course_material_tbl left join program_tbl on internship_course_material_tbl.program = program_tbl.program_id ORDER BY internship_course_material_tbl.created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?php if ($data['program_id'] == $data['program']) {
                                                echo $data['program_name'];
                                            } else {
                                                echo "Not Found";
                                            } ?></td>
                                        <td><?=$data['material_name']?></td>
                                        <td><a href="./course_material_files/<?= $data['material'] ?>" target="_blank"><?= $data['material'] ?></a></td>
                                        <td><?php
                                            if ($data['material_status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "inactive";
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <a href="./internship_track_course_material_edit.php?id=<?= $data['course_material_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                            <!-- <a href="./event_view.php?id=<?= $data['course_material_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a> -->
                                            <button type='button' value=<?php echo $data['course_material_id']; ?> class='btn btn-square action_btn_delete material_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.material_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.material_delete_id').val(user_id);
            $('#material_delete_modal').modal('show');
        });
    });
</script>