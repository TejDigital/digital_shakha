<?php
session_start();
?>
 <?php
if (isset($_SESSION['cons_msg'])) {
    echo "<script>alert('" . $_SESSION['cons_msg'] . "')</script>";
    unset($_SESSION['cons_msg']);
}
if(isset($_GET['email'])){
    $email = $_GET['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Digitalshakha Admin Login</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="./assets/images/d_logo.png" />
</head>
<style>
    .error-message{
        color: red;
        font-size: 0.9rem;
        font-weight: 700;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center" style="">
                    <div class="col-md-12">
                        <form action="code.php" method="post" id="reset_pass_form">
                            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="text-dark">Set New Password</h3>
                                    <p class="text-dark">Email: <b><?=$email?></b></p>
                                </div>
                                <input type="hidden" value="<?=$email?>" name="email">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingInput" name="password" placeholder="name@example.com">
                                    <label for="floatingInput">Password</label>
                                </div>
                                <label id="floatingInput-error" class="error error-message" for="floatingInput"></label>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="c_password" id="floatingPassword" placeholder="Confirm Password">
                                    <label for="floatingPassword">Confirm Password</label>
                                </div>
                                <label id="floatingPassword-error" class="error error-message" for="floatingPassword"></label>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="./adminlogin.php" style="color: #000;" >I got it my Password</a>

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
<script>
        $(document).ready(function() {
        var form = $('#reset_pass_form');

        form.validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                },
                c_password: {
                    required: true,
                    equalTo: "#floatingInput",
                },
                
            },
            messages: {
                password: "Please enter password",
                c_password: {
                    equalTo: "Passwords do not match",
                },
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
                error.addClass("error-message");
            }
        });

        form.submit(function(event) {
            if (form.valid()) {
                // Your form is valid, you can submit it here
            } else {
                // Form is not valid, do something (e.g., prevent default submission)
                event.preventDefault();
            }
        });
    });
</script>