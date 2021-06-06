<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Classes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<title>
    Add Test
</title>

<body>
    <?php
    $con = new mysqli('localhost', 'root', '', 'e_commerce');
    $squery = "SELECT  `name` FROM `courses` WHERE 1";
    $r = $con->query($squery);
    $row1 = [];
    //$row1 = mysqli_fetch_array($r);
    ?>
    <?php echo form_open(site_url('Ecom/add_test'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Courses</label>
        <select name="coursename">
            <option value="">SELECT</option>
            <?php while ($row1 = mysqli_fetch_array($r)) { ?>

                <option value="<?php echo $row1['name']; ?>"><?php echo $row1['name']; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="send">
            Add Test
        </button>
    </div>
    <?php
    $test_success_msg = $this->session->flashdata('adding_ques');
    if ($test_success_msg) {
    ?>
        <div class="alert alert-success">
            <?php echo $test_success_msg; ?>
        </div>
    <?php } ?>
</body>

</html>