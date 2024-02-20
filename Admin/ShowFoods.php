<?php
$title = "Admin | Dashboard";
include_once("layout/header.php");
$listfoods = "bg-orange";
$foods = $app->SelectAll("SELECT * from foods");

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
      <h3 class="card-title">List of Foods</h3>
      <div class="card-header divM">
        <button type="button" class="btn btn-outline-primary bM" data-toggle="modal" data-target="#exampleModal">
          Add Food
        </button>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID </th>
            <th>Name</th>
            <th>Image</th>
            <th>description</th>
            <th>Prix</th>
            <th>meal_id</th>
            <!-- <th>created_at</th> -->
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($foods as $value): ?>
            <tr id="<?= $value->id ?>">
              <td>
                <?= $value->id ?>
              </td>
              <td>
                <?= $value->name ?>
              </td>
              <td>
                <img src="<?php echo APPURL . "img/" . $value->image ?>" width="100px" alt="">
              </td>
              <td>
                <?= $value->description ?>
              </td>
              <td>
                <?= $value->prix ?> DH
              </td>
              <td>
                <?php
                switch ($value->meal_id) {
                  case 1:
                    echo "Breakfast";
                    break;
                  case 2:
                    echo "Lunch";
                    break;
                  default:
                    echo "Dinner";
                    break;
                }
                ?>
              </td>

              <!-- <td>
                 <?= $value->created_at ?> 
              </td> -->
              <!-- <td>
                <button id="order<?= $value->id ?>" onclick="update(<?= $value->id ?>)" class=" btn <?php
                    if ($value->status == "Pending") {
                      echo "btn-warning";
                    } else {
                      echo "btn-success";
                    } ?> text-white">
                  <?= $value->status ?>
                </button>
              </td> -->
              <td>
                <button onclick="deleteFood('<?= $value->id ?>','<?= $value->image ?>')" class="btn btn-outline-danger text-white">
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
            <th>Image</th>
            <th>description</th>
            <th>Prix</th>
            <th>meal_id</th>
            <!-- <th>created_at</th> -->
            <th>Delete</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Food</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Name :</label>
            <input type="text" id="name" class="form-control" aria-describedby="emailHelp" placeholder="Enter name ...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Description :</label>
            <textarea id="desc" class="form-control" aria-describedby="emailHelp"
              placeholder="Enter Description ..."></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Prix :</label>
            <input type="text" id="prix" class="form-control" placeholder="Prix">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Image :</label>
            <input type="file" id="img" class="form-control">
            <div id="isImg"></div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Meals :</label>
            <select id="meat" class="form-control">
              <option value="1">Breakfast</option>
              <option value="2">Lunch</option>
              <option value="3">Dinner</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="Ajoter()" id="save" data-dismiss="modal" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
</div>

<script>
  function Ajoter() {
    // var data = {
    //   name: $("#name").val(),
    //   desc: $("#desc").val(),
    //   prix: $("#prix").val(),
    //   img: $("#img").val(),
    //   meat: $("#meat").val(),
    //   save: "save"
    // }
    var formData = new FormData();
    formData.append('name', $("#name").val());
    formData.append('desc', $("#desc").val());
    formData.append('prix', $("#prix").val());
    formData.append('img', $("#img")[0].files[0]); // Récupérez le fichier à partir du champ d'entrée de fichier
    formData.append('meat', $("#meat").val());
    formData.append('save', 'save');
    $.ajax({
      method: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function () {
        alert("Add Food Sccussefully");
      },
      error: function (xhr, status, error) {
        alert(error); // le message de error ex:not faund
      },
    });
  };
  function deleteFood (id,img) {
    $.ajax({
      method: "post",
      data: { delete: "delete", id: id,img:img },
      success: function () {
        alert('delete Foods successfully');
        $("#" + id).css("display","none")
      },
      error: function (xhr, status, error) {
        alert(error);
      },
    });
  };
</script>
<?php

if (isset($_POST['save'])) {
  $name = htmlspecialchars($_POST["name"]);
  $desc = htmlspecialchars($_POST["desc"]);
  $prix = htmlspecialchars($_POST["prix"]);
  $img = $_FILES["img"]["name"];
  $dir = "Foods-Image/" . basename($img);
  $meat = htmlspecialchars($_POST["meat"]);
  $query = 'INSERT INTO foods  values (default,?,?,?,?,?,default)';
  $arr = [$name, $img, $desc, $prix, $meat];
  $message = "create Food successfully";
  $path = "ShowFoods.php";
  if (move_uploaded_file($_FILES["img"]["tmp_name"], $dir)) {
    $app->Insert($query, $arr, $path, $message);
  }
  echo "Insert Food successfully";
}
if(isset($_POST['delete'])){
  $id=$_POST['id'];
  $img=$_POST["img"];
  $query = "DELETE from foods  where id='$id'";
  $message = "Delete Food successfully";
  $path = "ShowFoods.php";
  unlink("Foods-image/".$img);
  $app->Delete($query, $path, $message);
}


include_once('layout/footer.php'); ?>