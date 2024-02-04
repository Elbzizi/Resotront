<?php 
 $title="Admin | Dashboard";
include_once("layout/header.php") ;
$listadmin="bg-orange";
$admins=$app->SelectAll("SELECT * from users where is_Admin = 1");

?>
  <!-- Main Sidebar Container -->
 <?php require_once('layout/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- start ================ -->
   <style>
    .card-body{
        font-size: 20px;
    }
 </style>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
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
                    <?php foreach ($admins as $value) : ?>
                  <tr>
                    <td><?= $value->id ?></td>
                    <td><?= $value->username ?></td>
                    <td><?= $value->email ?></td>
                    <td><?= $value->create_at ?></td>
                  </tr>
                  <?php endforeach ;?>
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
  
  <?php include_once('layout/footer.php'); ?>

  