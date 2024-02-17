<?php
$title = "Admin | Dashboard";
include_once("layout/header.php");
$listBooking = "bg-orange";
$bookings = $app->SelectAll("SELECT * from bookings");

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
    <?php } ?>
    <div class="card-header">
      <h3 class="card-title">List of Bookings</h3>
      <div class="card-header divM">
        <button type="button" class="btn btn-outline-primary bM" data-toggle="modal" data-target="#exampleModal">
          Add Food
        </button>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
          <tr>
          <th>ID </th>
            <th>Name</th>
            <th>E-mail</th>
            <th>date_booking</th>
            <th>num_people</th>
            <!-- <th>special_request</th>
            <th>user_id</th> -->
            <th>created_at</th>
            <th>status</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($bookings as $value): ?>
            <tr id="<?= $value->id ?>">
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
                <?= $value->date_booking ?>
              </td>
              <td>
                <?= $value->num_people ?>
              </td>
              <!-- <td>
                 <?= $value->special_request ?> 
              </td> -->
              <!-- <td>
                 <?= $value->user_id ?> 
              </td> -->
              <td>
                <?= $value->created_at ?>
              </td>
              <td>
                <button id="booking<?= $value->id ?>" onclick="update(<?= $value->id ?>)" class=" btn <?php
                    if ($value->status == "Pending") {
                      echo "btn-warning";
                    } else {
                      echo "btn-success";
                    } ?> text-white">
                  <?= $value->status ?>
                </button>
              </td>
              <td>
                <button onclick="deleteBooking('<?= $value->id ?>')" class="btn btn-outline-danger text-white">
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
            <th>date_booking</th>
            <th>num_people</th>
            <!-- <th>special_request</th>
            <th>user_id</th> -->
            <th>created_at</th>
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
 function update(id) {
  var booking= $("#booking"+id);
    $.ajax({
      method: "post",
      data: { type: "update", id: id },
      success: function () { 
        alert('update status booking successfully');
      
      booking.toggleClass('btn-warning btn-success');
      if (booking.html() == "Confirmé") {
        booking.html("Pending");
      } else {
        booking.html("Confirmé"); 
      }
       },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  };
 
  function deleteBooking(id) {
    $.ajax({
      method: "post",
      data: { type: "delete", id: id, },
      success: function () {
        alert('delete Booking successfully');
        $("#" + id).css("display", "none")
      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  };
</script>
<?php
if (isset($_POST['type'])) {
  $id = htmlspecialchars($_POST["id"]);
  if ($_POST['type'] == "update") {
    $booking = $app->SelectOne("select * from bookings where id='$id'");
    if ($booking->status == "Pending") {
      $status = "Confirmed";
    } else {
      $status = "Pending";
    }
    $query = "UPDATE bookings set status=? where id=?";
    $arr = [$status, $id];
    $message = "Update bookings successfully";
    $path = "ShowBookings.php";
    $app->Update($query, $arr, $path, $message);

  } else if ($_POST['type'] == "delete") {
    $query = "DELETE from bookings  where id='$id'";
  $message = "Delete Booking successfully";
  $path = "ShowBookings.php";
  $app->Delete($query, $path, $message);
  }
}



include_once('layout/footer.php'); ?>