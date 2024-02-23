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
            <th>Answer</th>
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
              <td>
                <button data-toggle="modal" data-target="#exampleModal" onclick="getData('<?= $value->id ?>')"
                  class="btn btn-success text-white">
                  <i class="nav-icon fas fa-envelope "></i>
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
            <th>Answer</th>
          </tr>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Repond E-mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="idM">
          <div class="form-group">
            <label for="exampleInputEmail1">User name Admin :</label>
            <input type="text" id="usernameM" value="<?= $_SESSION['username'] ?>" class="form-control"
              aria-describedby="emailHelp" placeholder="Enter full name ...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Header :</label>
            <input type="text" id="heder" value="<?= $_SESSION['email'] ?>" class="form-control"
              aria-describedby="emailHelp" placeholder="Enter full name ...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">E-mail address</label>
            <input type="email" id="emailM" class="form-control" aria-describedby="emailHelp"
              placeholder="Enter email ...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Subject</label>
            <input type="email" id="subject" class="form-control" aria-describedby="emailHelp"
              placeholder="Enter email ...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Old Message</label>
            <textarea type="email" id="oldmessage" class="form-control" aria-describedby="emailHelp"
              placeholder="Enter email ...">
            </textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Message Réponde</label>
            <textarea type="email" id="messageR" class="form-control" aria-describedby="emailHelp"
              placeholder="Enter email ...">
            </textarea>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="sendEmail()" id="save" data-dismiss="modal" class="btn btn-primary">Save
        </button>
      </div>
    </div>
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
  function getData(id) {
    $.ajax({
      method: "get",
      url: "get_message.php",
      data: { find: "find", id: id },
      success: function (res) {
        var data = JSON.parse(res);
        $("#emailM").val(data.email);
        $("#subject").val(data.subject);
        $("#oldmessage").val(data.message);
        $("#idM").val(data.id);
      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  };
  function sendEmail() {
    data = {
      id:$('#idM').val(),
      user: $('#usernameM').val(),
      email: $('#emailM').val(),
      subject: $('#subject').val(),
      header: $('#header').val(),
      message: $('#messageR').html(),
      repond: "repond",
    }
    $.ajax({
      method: "post",
      data: data,
      success: function () {
        alert('reponde user successfully');
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
if (isset($_POST['repond'])) {
  $id = $_POST['id'];
  $user = $_POST['user'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $header ="From :". $_POST['header']."\r\n";
  $message = $_POST['message'];
  mail($email,$subject,$message);
    $status = "Confirmed";
  $query = "UPDATE Contacte set status=? where id=?";
  $arr = [$status, $id];
  $message = "Repond Message successfully";
  $path = "ShowBookings.php";
  $app->Update($query, $arr, $path, $message);

}
include_once('layout/footer.php'); ?>