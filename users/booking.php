<?php
require "../config/config.php";
require "../lisb/App.php";
require "../includes/header.php";
$app=new App;
$query="SELECT * from bookings where user_id= $_SESSION[user_id] ";
$bookings=$app->SelectAll($query);

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
                <div class="col-md-12">
                    <table class="table " >
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Date Booking</th>
                            <th scope="col">Num People</th>
                            <th scope="col">Special Request</th>
                            <th scope="col">status</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php 
                             foreach ($bookings as $val) : ?>
                          <tr>
                            <td><?= $val->name ?></td>
                            <td><?= $val->email ?></td>
                            <td><?= $val->date_booking ?></td>
                            <td><?= $val->num_people ?></td>
                            <td><?= $val->special_request ?></td>
                            <td><?= $val->status ?></td>
                          </tr>
                          <?php endforeach ;?>
                        </tbody>
                      </table>
                </div>
            </div>
        <!-- Service End -->
        
<?php    require "../includes/footer.php"; ?>
