<?php
$title = "Admin | Dashboard";
include_once("layout/header.php");
$listadmin = "bg-orange";
$admins = $app->SelectAll("SELECT * from users where is_Admin = 1");

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
      <?php unset($_SESSION["message"]); } ?>

    <div class="card-header">
      <h3 class="card-title">List of Admins</h3>
      <div class="card-header divM">
        <button type="button" class="btn btn-outline-primary bM" data-toggle="modal" data-target="#exampleModal">
          Add Admin
        </button>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID </th>
            <th>User Name</th>
            <th>E-mail</th>
            <th>Creation Date</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($admins as $value): ?>
            <tr>
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
                <?= $value->create_at ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID </th>
            <th>User Name</th>
            <th>E-mail</th>
            <th>Creation Date</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Full Name :</label>
            <input type="text" id="username" class="form-control"  aria-describedby="emailHelp"
              placeholder="Enter full name ...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">E-mail address</label>
            <input type="email" id="email" class="form-control"  aria-describedby="emailHelp"
              placeholder="Enter email ...">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" id="password" class="form-control" 
              placeholder="Password">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="Ajoter()" id="save" data-dismiss="modal"  class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>
<script>
function Ajoter() {
        var data={
          username:$("#username").val(),
          email:$("#email").val(),
          password:$("#password").val(),
          save:"save"
        }
          $.ajax({
            method: "post",
            data: data,
            success: function () {
              alert("Add Admin Sccussefully");
            },
            error: function (xhr, status, error) {
              alert(error); // le message de error ex:not faund
            },
          });
        };
    </script>
<?php

if (isset($_POST['save'])) {
  $username = htmlspecialchars($_POST["username"]);
  $email = htmlspecialchars($_POST["email"]);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $query = 'INSERT INTO users  values (default,?,?,?,default,true)';
  $arr = [$username, $email, $password];
  $message = "create Admin successfully";
  $path = "ListAdmin.php";
  $app->Insert($query, $arr, $path, $message);
  echo "Insert Admin successfully";
}
include_once('layout/footer.php'); ?>