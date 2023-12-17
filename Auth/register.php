<?php require "../config/config.php"; ?>
<?php  require "../lisb/App.php"; ?>
<?php require "../includes/header.php"; ?>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link active">Service</a>
                        <a href="menu.html" class="nav-item nav-link">Menu</a>
                        <a href="cart.html" class="nav-item nav-link"><i class="fa-solid fa-cart-shopping"></i>Cart</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="booking.html" class="dropdown-item">Booking</a>
                                <a href="team.html" class="dropdown-item">Our Team</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="" class="btn btn-primary py-2 px-4">Book A Table</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Registeration</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Register</a></li>
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
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Register</h5>
                        <h1 class="text-white mb-4">Register for a new user</h1>
                        <form class="col-md-12">
                            <div class="row g-3">
                                <div class="">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Username</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="email" placeholder="Your Email">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                               
                               
                               
                                <div class="col-md-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- Service End -->
        

        <!-- Footer Start -->
<?php require("../includes/footer.php") ;?>