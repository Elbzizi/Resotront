<?php
require "../config/config.php";
require "../lisb/App.php";
require "../includes/header.php";
if(!isset($_SESSION['user_id'])){
  echo "<script>window.location.href='".APPURL."'</script>";
}
$app=new App;
$query="SELECT * from cart where user_id= $_SESSION[user_id] ";
$allCart=$app->SelectAll($query);
$cart_prix=$app->SelectOne("SELECT sum(prix) as all_prix from cart where user_id= $_SESSION[user_id]");


if(isset($_POST["submit"])){
    $_SESSION['prix']=$cart_prix->all_prix;
    // header("location:checkout.php");Mrdmatch
    echo "<script>window.location.href='".APPURL."/food/checkout.php'</script>";
}
?>
<style>
    td{
        vertical-align: middle;
    }
</style>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
            <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])) { ?>
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <strong>
                    <?= $_SESSION['message'] ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
           <?php if($cart_prix->all_prix>0): ?>
                <div class="col-md-12">
                    <table class="table " >
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php 
                             foreach ($allCart as $val) : ?>
                          <tr>
                            <td><img  width="130px" height="80px" src="<?php echo IMAG.$val->image ?>" /></td>
                            <td><?= $val->name ?></td>
                            <td><?= $val->prix ?> MAD</td>
                            <td><a class="btn btn-outline-danger text-white"
                            href="<?php echo APPURL.' /food/delete-item.php?id='.$val->id?>"
                            ><img src="<?php echo APPURL ?>/img/delete.png" /></td>
                          </tr>
                          <?php endforeach ;?>
                        <?php  else : ?>
                          <p class="bg-warning text-center p-3">there are no dishes you need to add dishes !!!
                            <strong><a class="text-white p-1" href="<?=APPURL.'/menu.php'?>">Menu cliquez ici</a></strong>
                          </p>
                          <?php endif ?>
                        </tbody>
                      </table>
                      <!-- <div class="position-relative mx-auto" style="max-width: 500px; padding-left: 679px;">
                        <p style="margin-left: -7px;" class="w-50 py-3 ps-4 pe-5"> Total: <?= $cart_prix->all_prix ; ?> MAD</p>
                        <button type="button" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                    </div> -->
                    <div class="position-relative mx-auto" style="max-width: 500px; padding-left: 679px;">
                        <p style="width :200px ">  Total: <b> <?= $cart_prix->all_prix ; ?> </b> MAD</p>
                        <form action="cart.php" method="post">
                            <button type="submit" name="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Service End -->
        
<?php    require "../includes/footer.php"; ?>
