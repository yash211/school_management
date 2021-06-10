<link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons/entypo/css/entypo.css'); ?>">
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet">

<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-core.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-theme.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-forms.css'); ?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
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

<h1 style="color:chartreuse">Teachers Profile</h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
<br><br>
<script type="text/javascript">


    <?php if ($this->session->flashdata('delete_student')) {?>
        toastr.warning("<?php echo $this->session->flashdata('delete_student'); ?>");
    <?php }?>


    </script>
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th style="width: 60px;">#</th>
            <th>
                <div><?php echo get_phrase('name'); ?></div>
            </th>
            <th>
                <div><?php echo get_phrase('email') . '/' . get_phrase('username'); ?></div>
            </th>
            <th>
                <div><?php echo get_phrase('options'); ?></div>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $etutor   =   $this->db->get('etutor')->result_array();
        foreach ($etutor as $row) : ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>

                    <!--<div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <li>
                                <a href="#" onclick="showAjaxModal('<?php //echo site_url('modal/popup/modal_admin_edit/' . $row['admin_id']); 
                                                                    ?>')">
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit'); ?>
                                </a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a href="#" onclick="confirm_modal('<?php //echo site_url('admin/admin/delete/' . $row['admin_id']); 
                                                                    ?>');">
                                    <i class="entypo-trash"></i>
                                    <?php echo get_phrase('delete'); ?>
                                </a>
                            </li>
                        </ul>
                    </div>-->

                    <button type="button" onclick="//location.href='<?php //echo site_url('etutor/deletestudent/' .$row['student_id']);?>'" name="button" class="btn btn-info" id="bt">Edit</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br><br><br><br><br>
<h1 style="color:brown">Student Profile</h1>
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
<br><br>
<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th style="width: 60px;">#</th>
            <th>
                <div><?php echo get_phrase('name'); ?></div>
            </th>
            <th>
                <div><?php echo get_phrase('email') . '/' . get_phrase('username'); ?></div>
            </th>
            <th>
                <div><?php echo get_phrase('Class_id'); ?></div>
            </th>
            <th>
                <div><?php echo get_phrase('Class Joined Status'); ?></div>
            </th>
            <th>
                <div><?php echo get_phrase('Actions'); ?></div>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $etutor   =   $this->db->get('etutor_student')->result_array();
        foreach ($etutor as $row) : ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['class_name']; ?></td>
                <td>
                    <?php
                    if ($row['status'] == 1) {
                        echo "Class Joined";
                    } else {
                        echo "Class Not Joined";
                    }
                    ?></td>
                <td>
                    <button type="button" onclick="location.href='<?php echo site_url('etutor/deletestudent/' .$row['student_id']);?>'" name="button" class="btn btn-danger" id="bt">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>