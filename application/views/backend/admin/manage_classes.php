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
    Send Class Code to Students
</title>

<body>
    <?php
    $con = new mysqli('localhost', 'root', '', 'tutor_data');
    $squery = "SELECT class_name FROM classes";
    $r = $con->query($squery);
    $row1 = [];
    //$row1 = mysqli_fetch_array($r);
    ?>
    <form class="form-horizontal" role="form" action="manage_database.php" method="POST">
    <div class="form-group">
        <label class="col-sm-2 control-label">Classes</label>
        <select name="classname">
            <option value="">SELECT</option>
            <?php while ($row1 = mysqli_fetch_array($r)) { ?>

                <option value="<?php echo $row1['class_name']; ?>"><?php echo $row1['class_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="send">
            Add Class
        </button>
    </div>
    </form>
</body>

</html>