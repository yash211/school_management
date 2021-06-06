<form action="<?php echo site_url('login/validate_login'); ?>" method="post">
    <div class="section-field mb-20">
        <label class="mb-10" for="name"><?php echo get_phrase('email'); ?>* </label>
        <input id="email" class="web form-control" type="email" placeholder="<?php echo get_phrase('email'); ?>" name="email" required>
    </div>
    <div class="section-field mb-20">
        <label class="mb-10" for="Password"><?php echo get_phrase('password'); ?>* </label>
        <input id="Password" class="Password form-control" type="password" placeholder="<?php echo get_phrase('password'); ?>" name="password" required>
    </div>
    
    <button type="submit" class="btn btn-primary"><?php echo get_phrase('login'); ?></button>
</form>