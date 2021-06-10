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
<?php if ($this->session->flashdata('success')) { ?>
    toastr.success("<?php echo $this->session->flashdata('flash_message'); ?>");
<?php } ?>
<?php echo form_open(site_url('etutor/addclass/create'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
<div class="modal-body">
    <div class="form-group">
        <label class="col-sm-2 control-label">Class Name</label>
        <div class="col-sm-6">
            <input class="form-control" name="name" placeholder="Class name" required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Class Code</label>
        <div class="col-sm-6">
            <input class="form-control" name="code" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 7); ?>" placeholder="This is Class Code" required />
        </div>
    </div>
</div>

<!-- Modal Footer -->
<div class="modal-footer">
    <button type="submit" class="btn btn-primary" name="save">
        Add Class
    </button>
</div>


</form>

<?php echo form_open(site_url('etutor/viewmanageclass'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary" >
        Manage Class
    </button>
</div>
