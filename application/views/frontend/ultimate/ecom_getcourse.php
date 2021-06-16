<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_phrase($page_title); ?></title>
</head>
<script>
    var link = document.getElementById('comp');
    var c = 0;
    link.addEventListener('click', continueScript);

    function continueScript() {
        /* Continue your code here */
        var c = c + 1;
        alert(c);
    }
</script>

<body>
    <header><?php $this->session->set_userdata('cname'); ?></header>
    <div class="col">
        <?php echo form_open(site_url('home/generate_cert'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
        <?php foreach ($data as $val) { ?>
            <div class="card bg-default" style="width: 50rem;">
                <a id="comp" href="<?php echo $val['vlink']; ?>">

                    <div class="card-body">
                        <h5 style="font-size:15px;" class="card-title "><i class="fa fa-youtube-play" style="margin-right:30px;" style="font-size:28px;color:red"></i><span><?php echo ($val['mname']); ?></span></h5>
                    </div>
                </a>
            </div>

            <br><br>
        <?php } ?>
        <br><br><br><br>
        <button type="submit" class="btn btn-success">Get Certificate</button>
        <?php echo form_close(); ?>
    </div>
</body>

</html>