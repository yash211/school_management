<!DOCTYPE html>
<html>
<head>

	<title><?php echo $page_title;?></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>
<link rel="stylesheet" href="<?php echo base_url('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons/entypo/css/entypo.css'); ?>">
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-core.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-theme.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-forms.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">

<script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js'); ?>"></script>

<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons/font-awesome/css/font-awesome.min.css'); ?>">


<link rel="stylesheet" href="<?php echo base_url('assets/js/vertical-timeline/css/component.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/dataTables/css/dataTables.bootstrap.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/buttons/css/buttons.bootstrap.css'); ?>" />

<link rel="stylesheet" href="<?php echo base_url('assets/js/wysihtml5/bootstrap-wysihtml5.css'); ?>">

<!--Amcharts-->
<script src="<?php echo base_url('assets/js/amcharts/amcharts.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/pie.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/serial.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/gauge.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/funnel.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/radar.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/exporting/amexport.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/exporting/rgbcolor.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/exporting/canvg.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/exporting/jspdf.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/exporting/filesaver.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/amcharts/exporting/jspdf.plugin.addimage.js'); ?>" type="text/javascript"></script>

<hr>
<div class="row-md-12">
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
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('etutor'); ?>" data-postfix="" data-duration="500" data-delay="0"><?php echo $this->db->count_all('etutor'); ?></div>

            <h3><?php echo get_phrase('Etutor'); ?></h3>
            <p>Total Etutor Teachers</p>
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
</html>