<!DOCTYPE html>
<html lang="en">

<head>

    <title><?php echo $page_title; ?></title>

    <meta charset=" utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
    <div>

        <div class="main-content">
            <?php include 'navigation.php'; ?>
            <h3 style="margin:20px 0px;">
                <i class="entypo-right-circled"></i>
                <?php echo $page_title; ?>
            </h3>
            <?php include $page_name . '.php'; ?>
            <?php echo form_open(site_url('superadmin/logout'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
            <?php echo form_close(); ?>
        </div>

    </div>

</body>

</html>