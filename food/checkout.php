<?php
require "../config/config.php";
require "../lisb/App.php";
require "../includes/header.php";
$app=new App;
if(isset($_POST['submit'])){
$name=htmlspecialchars($_POST['name']);
$town=htmlspecialchars($_POST['town']);
$email=htmlspecialchars($_POST['email']);
$country=htmlspecialchars($_POST['$country']);
$zipcode=htmlspecialchars($_POST['zipcode']);
$phone=htmlspecialchars($_POST['phone']);
$message=htmlspecialchars($_POST['message']);
$prix=$_SESSION["prix"];
$user_id=$_SESSION['user_id'];
$query= "INSERT INTO orders values (default,?,?,?,?,?,?,?,?,?,default)";
$arry=[$name,$town,$email,$country,$zipcode,$phone,$message,$prix,$user_id];
$path="pay.php";
$app->Insert($query,$arry,$path);
}


?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                
                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Checkout</h1>
                        <form  class="col-md-12" action="checkout.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="town" placeholder="Town">
                                        <label for="email">Town</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="country" placeholder="Country">
                                        <label for="text">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
                                        <label for="text">Zipcode</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone number">
                                        <label for="text">Phone number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Address" name="message" style="height: 100px"></textarea>
                                        <label for="message">Address</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Order and Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        <!-- Service End -->
        

<?php require "../includes/footer.php"; ?>