<?php
require('authentication.php');
require('./includes/sidebar.php');
require('./includes/header.php');
require('./config/dbcon.php');
?>
<?php
if(isset($_SESSION['digi_meg'])){
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey !</strong> <?=$_SESSION['digi_meg']?>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
  </button>
</div>
<?php
unset($_SESSION['digi_meg']);
}
?>
<div class="page-header">
  <h3 class="page-title"> Application table </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
  </nav>
</div>
<div class="modal fade" id="app_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form action="./application_delete_code.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="app_delete_id" class="app_delete_id">
          <p>Are you sure , you want to delete this data ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="app_delete" class="btn btn-danger">Delete</button>
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
                <th> Registration ID</th>
                <th> Name </th>
                <th> Phone </th>
                <th> Email </th>
                <th> Course </th>
                <th> payment status </th>
                <th colspan="3" class="text-center"> Active </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM application_tbl left join program_tbl on application_tbl.course = program_tbl.program_id  ORDER BY application_tbl.created_at DESC";
              $query = mysqli_query($con, $sql);
              $count = 1;
              if (mysqli_num_rows($query)) {
                foreach ($query as $data) {
                 $course =  $data['course'];
              ?>
                  <tr>
                    <td><?= $count++ ?></td>
                    <td><?= $data['registration_id'] ?></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['phone'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?php if($data['course']  == $data['program_id']){ echo $data['program_name'] ; }?></td>
                    <td><?php if ($data['payment_status'] == 1) {
                          echo "<p class='m-0 d-inline-block' style='background:blue; color:#fff; padding:0.3rem; border-radius:3px' >Done</p>";
                        } else {
                          echo "<p class='m-0 d-inline-block' style='background:green; color:#fff;padding:0.3rem; border-radius:3px'>Pending</p>";
                        }
                        ?></td>
                    <td class="text-center">
                      <a href="./application_edit.php?id=<?= $data['id'] ?>" class='btn btn-square action_btn_edit btn-sm my-1'><i class="fa-regular fa-pen-to-square m-0"></i></a>
                      <a href="./application_view.php?id=<?= $data['id'] ?>" class='btn btn-square action_btn_view btn-sm my-1'><i class="fa-regular fa-eye m-0"></i></a>
                      <button type='button' value=<?php echo $data['id']; ?> class='btn btn-square action_btn_delete delete_con btn-sm my-1'><i class="fa-solid fa-trash m-0"></i></button>
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
      $('.app_delete_id').val(user_id);
      $('#app_delete_modal').modal('show');
    });
  });
</script>