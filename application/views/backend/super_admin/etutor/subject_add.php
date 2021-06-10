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
    <?php if ($this->session->flashdata('add_subject')) { ?>
        <?php echo $this->session->flashdata('add_subject'); ?>
    <?php } ?>
    <div class="col-md-8">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('Add_Subjects'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('etutor/addsubjects'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Subject name'); ?></label>

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
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <textarea class="form-control" rows="2" name="desc"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('file'); ?></label>

                    <div class="col-sm-5">

                        <input type="file" name="file_name" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('add_subject'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <blockquote class="blockquote-blue">
            <p>
                <strong>Subject Adding</strong>
            </p>
            <p>
                Add Subject with respective their class
            </p>
        </blockquote>
    </div>

</div>