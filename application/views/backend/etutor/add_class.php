<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
