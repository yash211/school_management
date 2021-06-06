<!-- bootstrap 3.0.2 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<form class="form-horizontal" role="form" action="add_class.php" method="POST">
    <div class="modal-body">


        <div class="form-group">
            <label class="col-sm-2 control-label">Class Name</label>
            <div class="col-sm-6">
                <input class="form-control" name="name" placeholder="Class name" required/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Class Code</label>
            <div class="col-sm-6">
                <input class="form-control" name="code" value="<?php echo substr(md5(uniqid(rand(), true)), 0, 7); ?>" placeholder="This is Class Code" required/>
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

