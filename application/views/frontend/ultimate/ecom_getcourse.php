<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_phrase($page_title); ?></title>
</head>

<body>
    <div class="col">
        <?php echo form_open(site_url('home/generate_cert'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>

        <p><?php print_r($data[0]['description']); ?></p>

            <button type="submit" class="btn btn-success">Get Certificate</button>
            <!--<a href="<?php echo 'uploads/document/' . $data[0]['file_name']; ?> ">Show My Pdf</a>-->
            <?php echo form_close(); ?>
    </div>
</body>

</html>