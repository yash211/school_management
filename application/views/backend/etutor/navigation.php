<div class="sidebar-menu">
    <header class="logo-env">
        <!-- logo -->
        <!-- <div class="logo" style="">
            <a href="<?php echo site_url('login'); ?>">
                <img src="<?php echo base_url('uploads/logo.png'); ?>"  style="max-height:30px;"/>
            </a>
        </div> -->

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="margin-top: 0px;">
            <a href="#" class="sidebar-collapse-icon" onclick="hide_brand()">
                <i class="entypo-menu"></i>
            </a>
        </div>
        <script type="text/javascript">
            function hide_brand() {
                $('#branding_element').toggle();
            }
        </script>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="<?php echo site_url($account_type . '/dashboard'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>

        <!-- Class -->
        <li class="<?php if ($page_name == 'add_class') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="<?php echo site_url($account_type . '/viewclasses'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('Class'); ?></span>
            </a>
        </li>

        <!--Add Students-->
        <li class="<?php if ($page_name == 'add_student') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="<?php echo site_url($account_type . '/viewstudents'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('Add Students'); ?></span>
            </a>
        </li>
 
        <!--Add Subjects-->
        <li class="<?php if ($page_name == 'subject_add') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="<?php echo site_url($account_type . '/viewsubject'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('Subjects'); ?></span>
            </a>
        </li>

    </ul>

</div>