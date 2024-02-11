<?php
$title = "Admin | Dashboard";
include_once("layout/header.php");
$listorders = "bg-orange";
$orders = $app->SelectAll("SELECT * from orders");

?>
<!-- Main Sidebar Container -->
<?php require_once('layout/sidebar.php') ?>

<!-- Content Wrapper. Contains page content -->
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
    <?php } ?>
    <div class="card-header">
      <h3 class="card-title">List of Admins</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID </th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Town</th>
            <th>Country </th>
            <th>Phone</th>
            <th>Address</th>
            <th>Prix</th>
            <th>status</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $value): ?>
            <tr>
            <td>
                <?= $value->id ?>
              </td>
              <td>
                <?= $value->name ?>
              </td>
              <td>
                <?= $value->email ?>
              </td>
              <td>
                <?= $value->town ?>
              </td>
              <td>
                <?= $value->country ?>
              </td>
              <td>
                <?= $value->phone_number ?>
              </td>
              <td>
                <?= $value->address ?>
              </td>
              <td>
                <?= $value->total_prix ?>
              </td>
              <td>
                <?= $value->status ?>
              </td>
              <td>
                <?= $value->created_at ?>
              </td>
              <td>
                <?= $value->created_at ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
          <th>ID </th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Town</th>
            <th>Country </th>
            <th>Phone</th>
            <th>Address</th>
            <th>Prix</th>
            <th>user_id </th>
            <th>status</th>
            <th>Date</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

</div>
<?php

// if (isset($_POST['save'])) {
//   $username = htmlspecialchars($_POST["username"]);
//   $email = htmlspecialchars($_POST["email"]);
//   $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
//   $query = 'INSERT INTO users  values (default,?,?,?,default,true)';
//   $arr = [$username, $email, $password];
//   $message = "create Admin successfully";
//   $path = "ListAdmin.php";
//   $app->Insert($query, $arr, $path, $message);
//   echo "Insert Admin successfully";
// }
include_once('layout/footer.php'); ?>