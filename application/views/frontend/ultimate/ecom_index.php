<div id="logout" style="float:right">
    <li>
        <h6><?php echo $user_name; ?></h6>
    </li>
    <li>
        <a href="<?php echo site_url('home/ecomlogout'); ?>">
            <?php echo get_phrase('log_out'); ?><i class="entypo-logout right"></i>
        </a>
    </li>
</div>

<body>
    <div>
        <i class="entypo-right-circled"></i>
        <?php echo $page_title; ?>
        </h3>
        <?php //include $page_name . '.php'; ?>
        <?php include 'gettest.php';?>
    </div>

</body>