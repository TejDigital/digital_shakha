<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');
?>

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" class="delete_user_id">
                    <p>Are you sure , you want to delete this data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="deleteuser" class="btn btn-danger">Yes,Delete.!</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="page-header">
    <h3 class="page-title"> Registered User </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        if (isset($_SESSION['cons_msg'])) {
            echo "<script>alert('" . $_SESSION['cons_msg'] . "')</script>";
            unset($_SESSION['cons_msg']);
        }
        ?>
        <div class="card">
            <div class="card-header">
                <!-- <h3 class="card-title float-start ">Registered User</h3> -->
                <!-- <a href="#" class="btn btn-primary btn-sm float-end " data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</a> -->
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered" style="background: transparent;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Role us</th>
                            <?php
                            if ($_SESSION['auth'] == "admin") {
                            ?>
                                <th colspan="2" class="text-center">Action</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM users where type= 'user'";
                        $db_query_connect = mysqli_query($con, $query);
                        if (mysqli_num_rows($db_query_connect) > 0) {
                            foreach ($db_query_connect as $row) {
                        ?>
                                <tr>
                                    <td><?php echo $row['id'];  ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td>
                                        <?php
                                        if ($row['type'] == "admin") {
                                            echo "Admin";
                                        } elseif ($row['type'] == "employee") {
                                            echo "employee";
                                        } else {
                                            echo "User";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">

                                        <?php
                                        if ($_SESSION['auth'] == "admin") {
                                        ?>
                                            <a href="registered_edit.php?user_id=<?php echo $row['id']; ?>" class='btn btn-square action_btn_edit m-2'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if ($_SESSION['auth'] == "admin") {
                                        ?>

                                            <button type='button' value=<?php echo $row['id']; ?> class='btn tn-square action_btn_delete m-2 deletebtn '><i class="fa-solid fa-trash m-0"></i></button>
                                    </td>
                                <?php
                                        }
                                ?>
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

<?php require('./includes/footer.php'); ?>

<?php require('includes/script.php'); ?>
<script>
    $(document).ready(function() {
        $('.email_id').keyup(function(e) {
            var email = $('.email_id').val();
            // console.log(email);
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'check_Emailbtn': 1,
                    'email': email,
                },
                success: function(response) {
                    // console.log(response);
                    $('.email-error').text(response);
                }
            });
        });
    });
</script>
<script>
    // -----------------------delete------------------------
    $(document).ready(function() {
        $('.deletebtn').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.delete_user_id').val(user_id);
            $('#deletemodal').modal('show');
        });
    });
</script>