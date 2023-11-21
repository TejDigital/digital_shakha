<?php
require('config/db_conn.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if (isset($page_title)) {
                echo "$page_title";
            } ?>- Logo name</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 pt-5 mt-5">
                <?php
                        if (isset($_SESSION['message'])) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hey !</strong> <?= $_SESSION['message'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['message']);
                        }
                        ?>
                    <h4>Add New Password</h4>
                    <form action="./forget_password.php" method="post">
                        <input type="hidden" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>" name="token">
                        <br>
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" placeholder="email" id="email" class="form-control">
 <br>
                        <label for="pass">Password</label>
                        <input type="password" name="password" placeholder="Password" id="pass" class="form-control">
<br>
                        <label for="confirm_pass">Confirm Password</label>
                        <input type="text" name="confirm_password" class="form-control" placeholder="confirm password" id="confirm_pass">

                        <button class="btn btn-info my-4" name="add_pass" type="submit">ADD</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
</div>
<?php
    require('./Layout/footer.php');

?>