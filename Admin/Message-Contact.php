<?php
$title = "Admin | Dashboard";
include_once("layout/header.php");
$listMessage = "bg-orange";
$messages = $app->SelectAll("SELECT * from Contacte");

?>
<!-- Main Sidebar Container -->
<?php require_once('layout/sidebar.php') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- start ================ -->
  <style>
    .card-body {
      font-size: 20px;
    }
  </style>
  <div class="card">
    <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])) { ?>
      <div class="alert alert-success m-auto  w-50 text-center alert-dismissible fade show" role="alert">
        <strong>
          <?= $_SESSION['message'] ?>
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </div>
      <?php unset($_SESSION["message"]);
    } ?>

    <div class="card-header">
      <h3 class="card-title">List of Message</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID </th>
            <th>User Name</th>
            <th>E-mail</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Creation Date</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($messages as $value): ?>
            <tr id="<?= $value->id ?>">
              <td>
                <?= $value->id ?>
              </td>
              <td>
                <?= $value->username ?>
              </td>
              <td>
                <?= $value->email ?>
              </td>
              <td>
                <?= $value->subject ?>
              </td>
              <td>
                <?= $value->message ?>
              </td>
              <td>
                <?= $value->created_at ?>
              </td>
              <td>
                <button onclick="deleteMessage('<?= $value->id ?>')" class="btn btn-outline-danger text-white">
                  <img src="<?php echo APPURL ?>/img/delete.png" />
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
          <tr>
            <th>ID </th>
            <th>User Name</th>
            <th>E-mail</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Creation Date</th>
            <th>Delete</th>
          </tr>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

</div>

<script>
  function deleteMessage(id) {
    $.ajax({
      method: "post",
      data: { delete: "delete", id: id },
      success: function () {
        alert('delete user successfully');
        $("#" + id).css("display", "none")
      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  };
</script>
<?php
if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $query = "DELETE from Contacte  where id='$id'";
  $message = "Delete User successfully";
  $path = "Message-Contact.php";
  $app->Delete($query, $path, $message);
}
include_once('layout/footer.php'); ?>