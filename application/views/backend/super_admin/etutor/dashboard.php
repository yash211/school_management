<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons/entypo/css/entypo.css'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/neon-core.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/neon-theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/neon-forms.css'); ?>">
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

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>">
    <style>
        .navbar-inverse {
            background-color: darkblue;
        }

        .navbar-nav {
            background-color: lightskyblue;
        }

        body {
            padding-top: 70px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top ">
        <div class="container-fluid">
            <div class="navbar-header">

            </div>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url('etutor/viewclasses'); ?>">Add Classes</a></li>
                <li><a href="<?php echo site_url('etutor/viewsubject'); ?>">Add Sujects</a></li>
                <li><a href="<?php echo site_url('etutor/viewstudents'); ?>">Add Students</a></li>
                <li><a href="<?php echo site_url('etutor/profile'); ?>">Profile</a></li>
            </ul>

            <div class="navbar-right">
                <a href="<?php echo site_url('superadmin/logout'); ?>" class="navbar-brand"><i class="fa fa-fw fa-user"></i><strong>Logout</strong></a>
            </div>


        </div>
    </nav>
    <hr>
    <div class="row">

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">

                    <div class="tile-stats tile-red">
                        <div class="icon"><i class="fa fa-group"></i></div>
                        <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('student'); ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>

                        <h3><?php echo get_phrase('student'); ?></h3>
                        <p>Total students</p>
                    </div>

                </div>
                <div class="col-md-12">

                    <div class="tile-stats tile-aqua">
                        <div class="icon"><i class="entypo-user"></i></div>
                        <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('parent'); ?>" data-postfix="" data-duration="500" data-delay="0">0</div>

                        <h3><?php echo get_phrase('parent'); ?></h3>
                        <p>Total parents</p>
                    </div>

                </div>
                <div class="col-md-12">

                    <div class="tile-stats tile-blue">
                        <div class="icon"><i class="entypo-chart-bar"></i></div>
                        <?php
                        $check   =   array('timestamp' => strtotime(date('Y-m-d')), 'status' => '1');
                        $query = $this->db->get_where('attendance', $check);
                        $present_today      =   $query->num_rows();
                        ?>
                        <div class="num" data-start="0" data-end="<?php //echo $present_today;
                                                                    ?>" data-postfix="" data-duration="500" data-delay="0">0</div>

                        <h3><?php echo get_phrase('attendance'); ?></h3>
                        <p>Total present student today</p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>