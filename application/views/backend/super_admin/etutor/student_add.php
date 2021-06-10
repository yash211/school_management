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
<div class="row">
<!--<?php if ($this->session->flashdata('flash_message')) { ?>
    toastr.success("<?php echo $this->session->flashdata('flash_message'); ?>");
<?php } ?>-->
    <div class="col-md-8">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('Students_form'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('etutor/student/create/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class'); ?></label>

                    <div class="col-sm-5">
                        <select name="class" class="form-control" data-validate="required" id="class_id" data-message-required="<?php echo get_phrase('value_required'); ?>">
                            <option value=""><?php echo get_phrase('select'); ?></option>
                            <?php
                            $classes = $this->db->get('etutor_class')->result_array();
                            foreach ($classes as $row) :
                            ?>
                                <option value="<?php echo $row['class_id']; ?>">
                                    <?php echo $row['class_name']; ?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email') . '/' . get_phrase('username'); ?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password'); ?></label>

                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="">
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('add_student'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <blockquote class="blockquote-blue">
            <p>
                <strong>Student Admission Notes</strong>
            </p>
            <p>
                Admitting new students will automatically create an enrollment to the selected class in the running session.
                Please check and recheck the informations you have inserted because once you admit new student, you won't be able
                to edit his/her class,roll,section without promoting to the next session.
            </p>
        </blockquote>
    </div>

</div>