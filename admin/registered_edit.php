<?php
require('authentication.php');
require('includes/header.php');
require('includes/top-bar.php');
require('includes/sidebar.php');
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
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="text" name="password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Give role</label>
                                        <select name="status" class="form-control" >
                                            <option value="">select</option>
                                            <option value="0" <?php
                                                                if ($row['status'] == 0) {
                                                                    echo "Selected";
                                                                }
                                                                ?>>User</option>
                                            <option value="1" <?php
                                                                if ($row['status'] == 1) {
                                                                    echo "Selected";
                                                                }
                                                                ?>>Admin</option>
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