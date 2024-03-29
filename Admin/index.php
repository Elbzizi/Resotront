<?php 
 $title="Admin | Dashboard";
 $index="bg-orange";
include_once("layout/header.php") ;
$nbfood=$app->SelectOne("SELECT count(*) as num from foods");
$nborder=$app->SelectOne("SELECT count(*) as num from orders");
$nbusers=$app->SelectOne("SELECT count(*) as num from users where is_admin=false");
$booking=$app->SelectOne("SELECT count(*) as num from bookings ");
// table2=
$nbBreakfast=$app->SelectOne("SELECT count(*) as num from foods where meal_id=1");
$Breakfast=ceil(($nbBreakfast->num/$nbfood->num)*100);
$nbLaunch=$app->SelectOne("SELECT count(*) as num from foods where meal_id=2");
$Launch=ceil(($nbLaunch->num/$nbfood->num)*100);
$nbDinner=$app->SelectOne("SELECT count(*) as num from foods where meal_id=3");
$Dinner=ceil(($nbDinner->num/$nbfood->num)*100);

?>
  <!-- Main Sidebar Container -->
 <?php require_once('layout/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- start ================ -->
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $nborder->num ?></h3>

                <p>Number of Orders</p>
              </div>
              <div class="icon">
              <i class="ion ion-bag"></i>
              </div>
              <a href="ShowOrders.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $nbfood->num ?> 
                <!-- <sup style="font-size: 20px">%</sup> -->
            </h3>

                <p>Number Of Foods</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-stats-bars"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M6.75 1A5.75 5.75 0 0 0 1 6.75v.518a2 2 0 0 0 0 3.464v1.518A2.75 2.75 0 0 0 3.75 15h8.5A2.75 2.75 0 0 0 15 12.25v-1.518a2 2 0 0 0 0-3.464V6.75A5.75 5.75 0 0 0 9.25 1zM14 8.5H2a.5.5 0 0 0 0 1h12a.5.5 0 0 0 0-1M13.5 7v-.25A4.25 4.25 0 0 0 9.25 2.5h-2.5A4.25 4.25 0 0 0 2.5 6.75V7zM11 11h2.5v1.25c0 .69-.56 1.25-1.25 1.25h-8.5c-.69 0-1.25-.56-1.25-1.25V11H9l1 1z" clip-rule="evenodd"/></svg>              
              </div>
              <a href="ShowFoods.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $nbusers->num ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="ListUsers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$booking->num?></h3>

                <!-- <p>Unique Visitors</p> -->
                <p>Bookings</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="ShowBookings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ========================================= -->
          <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Meals</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Breakfast</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: <?= $Breakfast ?>%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger"><?= $Breakfast ?>%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Launch</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: <?=$Launch?>%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning"><?=$Launch?>%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Dinner</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: <?=$Dinner?>%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success"><?=$Dinner?>%</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
           
          <!-- ========================================= -->
        </div>
  </div>

  <?php include_once('layout/footer.php'); ?>