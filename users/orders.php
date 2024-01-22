<?php
require "../config/config.php";
require "../lisb/App.php";
require "../includes/header.php";
$app=new App;
$query="SELECT * from orders where user_id= $_SESSION[user_id] ";
$orders=$app->SelectAll($query);

?>
<style>
    td{
        vertical-align: middle;
    }
</style>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Orders</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="<?=APPURL?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?=APPURL?>/users/orders.php">Orders</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
            <div class="container">
                <div class="col-md-12">
                    <table class="table table-striped p-2" border="1" >
                        <thead>
                          <tr class="table-dark">
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Town</th>
                            <th scope="col">Country</th>
                            <th scope="col">Zip-Code</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Total Prix</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php 
                             foreach ($orders as $val) : ?>
                          <tr>
                            <td><?= $val->name ?></td>
                            <td><?= $val->email ?></td>
                            <td><?= $val->town ?></td>
                            <td><?= $val->country ?></td>
                            <td><?= $val->zipcode ?></td>
                            <td><?= $val->phone_number ?></td>
                            <td><?= $val->address ?></td>
                            <td><?= $val->total_prix ?></td>
                            <td><?= $val->status ?></td>
                            <td><?= $val->created_at ?></td>
                          </tr>
                          <?php endforeach ;?>
                        </tbody>
                      </table>
                </div>
            </div>
        <!-- Service End -->
        
<?php    require "../includes/footer.php"; ?>
