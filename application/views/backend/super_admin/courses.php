<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<div class="modal-body">
    <?php
    $success_msg = $this->session->flashdata('flash_message');
    if ($success_msg) {
    ?>
        <div class="alert alert-success">
            <?php echo $success_msg; ?>
        </div>
    <?php } ?>
    <?php echo form_open(site_url('Ecom/addcourses'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Course Name</label>
        <div class="col-sm-6">
            <input class="form-control" name="name" placeholder="Course name" required />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Class Description</label>
        <div class="col-sm-6">
            <input class="form-control" name="desc" placeholder="Provide Description" required />
        </div>
    </div>
</div>

<!-- Modal Footer -->
<div class="modal-footer">
    <button type="submit" class="btn btn-primary" name="save">
        Add Course
    </button>
</div>