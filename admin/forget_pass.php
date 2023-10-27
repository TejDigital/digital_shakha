<?php
require('./includes/header.php');
session_start();
?>
 <?php
if (isset($_SESSION['cons_msg'])) {
    echo "<script>alert('" . $_SESSION['cons_msg'] . "')</script>";
    unset($_SESSION['cons_msg']);
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center" style="">
                    <div class="col-md-12">
                        <form action="code.php" method="post">
                            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <a href="index.html" class="">
                                        <!-- <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Login</h3> -->
                                    </a>
                                    <h3>Set New Password</h3>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInput" name="password" placeholder="name@example.com">
                                    <label for="floatingInput">Password</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" name="c_password" id="floatingPassword" placeholder="Confirm Password">
                                    <label for="floatingPassword">Confirm Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="./adminlogin.php" >i got it my  Password</a>

                                </div>
                                <button type="submit" name="set" class="btn btn-primary py-3 w-100 mb-4">Set New</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('includes/script.php'); ?>
<?php
 ?>