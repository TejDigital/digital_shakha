<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');
?>

<div class="page-header">
  <h3 class="page-title"> Contact </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
  </nav>
</div>
<div class="modal fade" id="delete_con_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form action="connect.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="delete_con_id" class="delete_con_id">
                            <p>Are you sure , you want to delete this data ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="delete_con" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> # </th>
                <th> First name </th>
                <th> Phone </th>
                <th> Email </th>
                <th> Message </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                    <?php
                    $sql = "SELECT * FROM contact_tbl ORDER BY created_at DESC";
                    $query = mysqli_query($con, $sql);
                    $count = 1;
                    if (mysqli_num_rows($query)) {
                        foreach ($query as $data) {
                    ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $data['full_name'] ?></td>
                                <td><?= $data['phone'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td><?= $data['message'] ?></td>
                                <td>
                                    <button type='button' value=<?php echo $data['id']; ?> class='btn btn-square btn-outline-danger delete_con btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
        $('.delete_con').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.delete_con_id').val(user_id);
            $('#delete_con_modal').modal('show');
        });
    });
</script>