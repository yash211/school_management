<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="assets/plugins/fontawesome-free/css/fontawesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<title>Home</title>
<style>
    .masthead {
        height: 100vh;
        min-height: 500px;
        background-image: url('https://source.unsplash.com/BtbjCFUvBXs/1920x1080');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-dark navbar-fixed-top bg-primary">
        <a class="navbar-brand" href="#">School Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#about" class="nav-link">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a href="#features" class="nav-link">FEATURES</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('home/viewusersign'); ?>" class="nav-link">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <img src="assets/frontend/ultimate/img/home_promo_1.png">
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <section class="py-5 justify-content-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Education Management System!</h2>
                    <p stle="color:orangered">The Websites provides many functionalities with responsive behaviour.<br>Functionalities like <strong style="color:darkcyan">ECOMMERCE ETUTOR RESUME</strong>.</p>
                    <a href="form11.html" class=" btn btn-primary">Admin Demo</a>
                    <span><a href="form11.html" class=" btn btn-primary">Users Demo</a></span>
                </div>
            </div>
        </div>
    </section>

    <section id="features">





        <div class="container-fluid">


            <div class="row">

                <div class="col-lg-6 col-md-6 col-xs-12 no-padding wow bounceInRight" data-wow-duration="1s" data-wow-delay=".5s">

                    <div class="pad">
                        <!-- <h2 class="section-heading"  style=" margin-top: 100px;color:#182f58">Higher Education Management</h2>-->
                        <hr class="primary">
                        <a href="<?php echo site_url('superadmin');?>"><h4 style="color:blue"><i class="fa fa-cog fa-3x" aria-hidden="true"></i>Administration Management.</h4></a>
                        <p class="text-muted"> User defined Subjects, Class, Divisions, and Number of days, Academic year, Periods, Post, Caste and Religion.
                            Provision to adjust teachers’ allocation periods.
                            The Admission no: and Roll No: in the class can be decided by the administrator.
                            The administrator can assign the fee amount for the whole year.
                        </p>





                        <h4 style="color:blue"><i class="fa fa-database fa-3x" aria-hidden="true"></i>Back-Up Option</h4>
                        <p class="text-muted">A Back-Up Option is provided for the administrator to take the back-up of the database. There by we are imposing more security on the data and if any failure happens it will be preserved. </p>



                        <h4 style="color:blue"><i class="fa fa-user fa-3x" aria-hidden="true"></i>User Management</h4>
                        <p class="text-muted">The administrator is allowed to set different users with privileges depending upon their mode of work. Each and every staff is provided with a username and password.</p>





                        <!-- <h4>Permissions & Privileges</h4>
                    <p class="text-muted">This module is used by the administrator to prevent unauthorized access to the system. Any user logging into the system can access only those functions for which he/she has been granted rights for.</p>-->





                        <h4 style="color:blue"><i class="fa fa-graduation-cap fa-3x" aria-hidden="true"></i>Student Admission & Registration</h4>
                        <p class="text-muted">This module enables you to store all personal details regarding a student, his/her parents, and his/her siblings, health. His/ Her class and division can be assigned.</p>


                        <h4 style="color:blue"><i class="fa fa-graduation-cap fa-3x" aria-hidden="true"></i>Etutor[One Teacher]</h4>
                        <p class="text-muted">This module enables you to store all class details with class codes.Teachers can send emails regarding classes and can view the students present in the class</p>

                        <h4 style="color:blue"><i class="fas fa-cart-arrow-down fa-3x" aria-hidden="true"></i>Ecommerce</h4>
                        <p class="text-muted">This module enables you to take different courses ans can receive the certificates on successfull completion.</p>

                        <h4 style="color:blue"><i class="fa fa-cog fa-3x" aria-hidden="true"></i>Examinations and Performance Handling with Marks</h4>
                        <p class="text-muted">This module deals with the academic performance as well as marks of each and every student. Respective staffs are given privilege to view the marks. There is also provision for entering the remarks.</p>

                    </div>
                </div>



                <div class="col-lg-6 col-md-6 col-xs-12 no-padding wow bounceInUp ">


                    <img src="assets/images/skins/blue.png" class=" img-responsive " width="100%">
                    <br><br><br><br><br>
                    <img src="assets/images/skins/2021-06-10.png" class=" img-responsive " width="100%">

                </div>








            </div>
        </div>
    </section>
    <hr>
    <footer class="page-footer font-small cyan darken-3">

        <!-- Footer Elements -->
        <div class="container">

            <!-- Grid row-->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-12 py-5">
                    <div class="mb-5 flex-center">

                        <!-- Facebook -->
                        <a class="fb-ic" href="https://www.facebook.com/">
                            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                   
                        <!--Linkedin -->
                        <a class="li-ic" href="https://www.linkedin.com/in/yash-gupta-01257a192/">
                            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>

                        <!--Instagram-->
                        <a class="ins-ic" href="https://www.instagram.com/yash2_11/">
                            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>

                    </div>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <hr>
    <!-- Footer -->
</body>

</html>