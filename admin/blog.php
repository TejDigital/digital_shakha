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
    <h3 class="page-title"> Blog </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./blog.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>
<div class="page-header">
    <h3></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Add_blog">ADD</a></li>
        </ol>
    </nav>
</div>

<div class="modal fade" id="Add_blog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="./blog_code.php" method="POST" enctype="multipart/form-data" id="blog_form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add blog</h1>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="">Title</label>
                            <input type="text" class="form-control " name="name">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Date</label>
                            <input type="date" class="form-control " name="date">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Category</label>
                            <select name="category" class="form-control " style="appearance: revert;background:#2A3038 !important; color:#fff !important;">
                                <option value="">Select Category</option>
                                <?php
                                $sql = "SELECT * FROM blog_category_tbl where blog_category_status = 1";
                                $sql_run = mysqli_query($con,$sql);
                                if(mysqli_num_rows($sql_run) > 0){
                                    foreach($sql_run as $row){
                                        ?>
                                        <option value="<?=$row['blog_category_id']?>"><?=$row['blog_category_name']?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="">Image</label>
                            <input type="file" class="form-control " name="image">
                        </div>
                        <div class="col-md-12">
                            <label for="">Mini Description</label>
                           <textarea name="mini_description" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-2">
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

<div class="modal fade" id="blog_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="./blog_delete_code.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="blog_delete_id" class="blog_delete_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="blog_delete" class="btn btn-danger">Delete</button>
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
                                <th> Category</th>
                                <th> Date</th>
                                <th> Status</th>
                                <th colspan="3" class="text-center"> Active </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM blog_tbl left join blog_category_tbl on blog_tbl.blog_category = blog_category_tbl.blog_category_id ORDER BY blog_category_tbl.created_at DESC";
                            $query = mysqli_query($con, $sql);
                            $count = 1;
                            if (mysqli_num_rows($query)) {
                                foreach ($query as $data) {
                            ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $data['blog_name'] ?></td>
                                        <td><?php if($data['blog_category'] = $data['blog_category_id']){echo $data['blog_category_name'];} ?></td>
                                        <td><?= $data['blog_date'] ?></td>
                                        <td><?php
                                            if ($data['blog_status'] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "inactive";
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <a href="./blog_edit.php?id=<?= $data['blog_id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                            <a href="./blog_view.php?id=<?= $data['blog_id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a>
                                            <button type='button' value=<?php echo $data['blog_id']; ?> class='btn btn-square action_btn_delete blog_delete btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.blog_delete').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.blog_delete_id').val(user_id);
            $('#blog_delete_modal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {

        var form = $('#blog_form');
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
                name: {
                    required: true,
                },
                image: {
                    required: true,
                    fileExtension: true,
                },
                date: {
                    required: true,
                },
                category: {
                    required: true,
                },
                mini_description: {
                    required: true,
                },
                description: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please select blog name",
                },
                image: {
                    required: "Please choose a file.",
                    fileExtension: "Please select a valid file type (jpg, jpeg, png).",
                },
                date: {
                    required: "Please enter date",
                },
                category: {
                    required: "Please select category",
                },
                mini_description: {
                    required: "Please enter mini description",
                },
                description: {
                    required: "Please enter description",
                },
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
                error.addClass("error-message");
            }
        });

        form.submit(function(event) {
            tinyMCE.triggerSave();

            if (form.valid()) {
                // Your form is valid, you can submit it here
            } else {
                // Form is not valid, do something (e.g., prevent default submission)
                event.preventDefault();
            }
        });
    });
</script>