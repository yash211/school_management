<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="<?php echo base_url('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css'); ?>">-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons/entypo/css/entypo.css'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/neon-core.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/neon-theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/neon-forms.css'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons/font-awesome/css/font-awesome.min.css'); ?>">


    <link rel="stylesheet" href="<?php echo base_url('assets/js/vertical-timeline/css/component.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/js/core/popper.min.js'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/dataTables/css/dataTables.bootstrap.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('assets/js/wysihtml5/bootstrap-wysihtml5.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/less/bs-less/dropdowns.less'); ?>">
    <link href='https://fonts.googleapis.com/css?family=Angkor' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>">
    <style>
        .navbar {
            min-height: 80px;
        }

        .nav-item {
            min-width: 100px;
            min-height: 30px;
        }

        .navbar-expand-lg {
            background-color: darkblue;
        }

        .navbar-nav {
            background-color: lightskyblue;
        }

        body {
            padding-top: 70px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('home/viewedash'); ?>">E-Tutor</a></li>
                <li><a href="<?php echo site_url('home/ecomdash'); ?>">Ecommerce</a></li>
                <li><a href="<?php echo site_url('users/ThemeSelector'); ?>">Resume</a></li>
                <li><a href="<?php echo site_url('home/profile'); ?>">Profile</a></li>
                <li><a href="<?php echo site_url('home/vemailmodal'); ?>">mail</a></li>
                <li><a href="<?php echo site_url('home/sendw'); ?>">dfhhuj</a></li>
            </ul>

            <div class="navbar-right">
                <a href="<?php echo site_url('home/ecomlogout'); ?>" class="navbar-brand"><i class="fa fa-fw fa-user"></i><strong>Logout</strong></a>
            </div>


        </div>
    </nav>-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light">

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('home/viewedash'); ?>"><strong>E-Tutor</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('home/ecomdash'); ?>"><strong>Ecommerce</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('users/ThemeSelector'); ?>"><strong>Resume</strong></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo site_url('home/profile'); ?>"><strong>Profile</strong></a></li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <strong>Referrel Code</strong>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo site_url('home/vemailmodal'); ?>">Send Via Email</a>
                    <a class="dropdown-item" href="<?php echo site_url('home/sendw'); ?>">Send Via WhatsApp</a>

                </div>
            </li>
            <div class="navbar-right">
                <a href="<?php echo site_url('home/ecomlogout'); ?>" class="navbar-brand"><i class="fa fa-fw fa-user"></i><strong>Logout</strong></a>
            </div>
        </ul>

    </nav>
    <br><br><br><br><br>
    <div class='container'>
        <?php include $page_name . '.php'; ?>
    </div>

    <!-- Footer -->

</body>

</html>