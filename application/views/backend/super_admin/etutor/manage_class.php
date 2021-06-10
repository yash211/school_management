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
<?php echo form_open(site_url('etutor/manageclasses'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class'); ?></label>

    <div class="col-sm-5">
        <select name="class" class="form-control" data-validate="required" id="class_id" data-message-required="<?php echo get_phrase('value_required'); ?>">
            <option value=""><?php echo get_phrase('select'); ?></option>
            <?php
            $classes = $this->db->get('etutor_class')->result_array();
            foreach ($classes as $row) :
            ?>
                <option value="<?php echo $row['class_name']; ?>">
                    <?php echo $row['class_name']; ?>
                </option>
            <?php
            endforeach;
            ?>
        </select>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="save">
            Send Code
        </button>
    </div>
</div>