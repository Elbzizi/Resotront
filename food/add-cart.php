<?php 
require "../config/config.php";
require("../lisb/App.php");
require "../includes/header.php";

$app= new App() ;
if(isset($_GET['id'])){
  $id=$_GET['id'];  
}else{
    echo "<script>window.location.href='".APPURL."/404.php'</script>";
 }

$query="SELECT * from foods where id = $id ";
$taba9=$app->SelectOne($query) ;

if( isset($_SESSION['user_id'])){
    $id_user= $_SESSION['user_id'] ; 
    $quer="SELECT * from cart where item_id=$id and user_id= $id_user ";
    $count= $app->ValidateCart($quer);
 }

if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $item_id=$_POST['item_id'];
    $prix=$_POST['prix'];
    $image=$_POST['image'];
$query="INSERT INTO cart values (default,?,?,?,?,?,default) ";
$arry=[$item_id,$name,$prix,$image,$id_user];
$path="cart.php";
$message="add to cart successfully";
$app->Insert($query,$arry,$path,$message);
}
?>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?=$taba9->name?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="<?=APPURL?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?=APPURL.'/food/cart.php'?>">Cart</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo APPURL.' /img/' . $taba9->image ?>">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4"><?= $taba9->name ?></h1>
                        <p class="mb-4">
                        <?= $taba9->description ?>
                        </p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h3>Price: <?= $taba9->prix ?> MAD </h3>                                   
                                </div>
                            </div>
                           
                        </div>
                        <form action="add-cart.php?id=<?php echo $id; ?>" method="POST">
                           <input type="hidden" name="name" value="<?=$taba9->name?>">
                           <input type="hidden" name="image" value="<?=$taba9->image?>">
                           <input type="hidden" name="prix" value="<?=$taba9->prix?>">
                           <input type="hidden" name="item_id" value="<?=$taba9->id?>">
                        <?php   if($count > 0) :  ?>
                           <input type="submit" disabled name="submit" class="btn btn-danger py-3 px-5 mt-2" value="déja exist">
                           <?php  else :?>
                            <input type="submit"  name="submit" class="btn btn-primary py-3 px-5 mt-2" value="Add to Cart">
                            <?php endif ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php 
require "../includes/footer.php";
?>

