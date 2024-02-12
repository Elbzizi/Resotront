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
                <?= $value->total_prix ?> DH
              </td>
              <td>
              <button onclick="Action('update',<?=$value->id?>)"  class="btn <?php 
             if($value->status=="Pending"){echo "btn-warning";}else{echo "btn-success";}  ?> text-white">
              <?= $value->status ?>
                </button> 
              </td>
              <td>
                <button  onclick="Action('delete',<?=$value->id?>)" class="btn btn-outline-danger text-white">
                  <img src="<?php echo APPURL ?>/img/delete.png" /> 
                </button>        
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
            <th>status</th>
            <th>Delete</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

</div>
<script>
  function update(type,id) {
          $.ajax({
            method: "post",
            // url: "auth.php", //url pour envoyer les donnes ,par defau cerrunet page
            data:{type:type,id:id},
            // success: function () {  },
            error: function (xhr, status, error) {
              alert(error);
            },
          });
        };
        function delete(type,id) {
          $.ajax({
            method: "post",
            // url: "auth.php", //url pour envoyer les donnes ,par defau cerrunet page
            data:{type:type,id:id},
            // success: function () {  },
            error: function (xhr, status, error) {
              alert(error);
            },
          });
        };
</script>
<?php

if (isset($_POST['type'])) {
  $id = htmlspecialchars($_POST["id"]);
  if($_POST['type']=="update"){
    $order=$app->SelectOne("select * from orders where id='$id'");
    if($order->status=="Pending"){
      $status="Confirmed";
    }else{
      $status="Pending";
    }
    $query="UPDATE orders set status=? where id=?";
    $arr = [$status,$id];
    $message = "Update Order successfully";
    $path = "ListAdmin.php";
    $app->Update($query, $arr, $path, $message);
  }else if($_POST['type']=="delete"){
    $query="DELETE from orders  where id='$id'";
    $message = "Delete Order successfully";
    $path = "ListAdmin.php";
    $app->Delete($query, $path,$message);
  }
}
include_once('layout/footer.php'); ?>