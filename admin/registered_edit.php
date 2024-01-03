<?php
require('authentication.php');
require('includes/sidebar.php');
require('includes/header.php');
require('config/dbcon.php');
?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <!-- <h3 class="m-0 text-dark">Dashboard</h3> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="./registered.php">Home</a></li>
                <li class="breadcrumb-item active">User Update</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
<!-- /.content-header -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title float-start">Update User</h3>
        <a href="registered.php" class="btn btn-danger btn-sm float-end"> Back</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <?php
                        if (isset($_GET['user_id'])) {
                            $id = $_GET['user_id'];
                            $query = "SELECT * FROM users WHERE id ='$id'LIMIT 1";
                            $qurey_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($qurey_run) > 0) {
                                foreach ($qurey_run as $row) {
                        ?>
                                    <input type="hidden" name="user_id" value=" <?php echo $row['id'] ?>">
                                    <div class="form-group">
                                        <label for="" class="text-secondary">Name</label>
                                        <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-light">Email</label>
                                        <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-light">Phone</label>
                                        <input type="number" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for=""  class="text-light">Password</label>
                                        <input type="text" name="password"  class="form-control" placeholder="new password">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-light">Give role</label>
                                        <select name="type" class="form-control text-light" style="appearance: revert;background:#2A3038 !important; color:#fff !important;" >
                                          
                                            <option value="employee" <?php
                                                                if ($row['type'] == "employee") {
                                                                    echo "selected";
                                                                }
                                                                ?>>Employee</option>
                                            <option value="user" <?php
                                                                if ($row['type'] == "user") {
                                                                    echo "selected";
                                                                }
                                                                ?>>User</option>
                                        </select>
                                    </div>

                        <?php
                                }
                            } else {
                                echo "<h4> No Record Found";
                            }
                        }
                        ?>
                    <!-- </div>
                    <div class="modal-footer"> -->
                        <button type="submit" name="updateuser" class="btn btn-primary my-3">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php require('includes/footer.php'); ?>
<?php require('includes/script.php'); ?>