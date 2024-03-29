<style>
  .bg-orange {
    border-radius: 8px;
  }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <!-- <a href="index3.html" class="brand-link">
      <img src="../assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->
  <a href="http://localhost/restoran" class="navbar-brand p-0">
    <h1 class="text-orange ml-3 mt-3"><i class="fa fa-utensils me-3"></i>Restoran</h1>
    <!-- <img src="img/logo.png" alt="Logo"> -->
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= APPADM ?>assets/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <?= $_SESSION['admin'] ?>
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
        <!-- start=================== -->
        <li class="nav-item <?= $index ?>">
          <a href="<?= APPADM ?>/index.php" class="nav-link">
            <!-- <i class="nav-icon fas fa-th"></i> -->
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item <?= $listadmin ?>">
          <a href="<?= APPADM ?>/ListAdmin.php" class="nav-link">
            <!-- <i class="nav-icon fas fa-th"></i> -->
            <i class="nav-icon fa fa-user-circle" aria-hidden="true"></i>
            <p>
              Liste Admins
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item <?= $listUsers ?>">
          <a href="<?= APPADM ?>/ListUsers.php" class="nav-link">
          <i class="nav-icon fa fa-address-book" aria-hidden="true"></i>
            <p>
              Liste Users
            </p>
          </a>
        </li>
        <li class="nav-item <?= $listorders ?>">
          <a href="<?= APPADM ?>/ShowOrders.php" class="nav-link">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <p>
              Liste Orders
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item <?= $listfoods ?>">
          <a href="<?= APPADM ?>/ShowFoods.php" class="nav-link">
            <i class="nav-icon fa fa-utensils "></i>
            <p>
              Liste Foods
            </p>
          </a>
        </li>
        <li class="nav-item <?= $listBooking ?>">
          <a href="<?= APPADM ?>/ShowBookings.php" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Liste Bookings
            </p>
          </a>
        </li>
        <li class="nav-item <?= $listMessage ?>">
          <a href="<?= APPADM ?>/Message-Contact.php" class="nav-link">
          <i class="nav-icon fas fa-envelope "></i>
            <p>
              Liste Message
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= APPURL ?>/Auth/logout.php" class="nav-link">
            <!-- <i class="nav-icon fas fa-th"></i> -->
            <i class="nav-icon fa fa-user-circle" aria-hidden="true"></i>
            <p>
              LogOut
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <!-- =end ================================================ -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>