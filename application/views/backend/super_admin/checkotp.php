<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
<?php echo form_open(site_url('superadmin/check_otp'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
        <h2 class="text-center">Log in</h2>       
        <!--<div class="form-group first_box">
            <input type="text" id="email" class="form-control" placeholder="Email" required="required">
			<span id="email_error" class="field_error"></span>
        </div>
        <div class="form-group first_box">
            <input type="text" id="name" class="form-control" placeholder="Name" required="required">
        </div>
        <button class="btn btn-primary btn-block" type="submit" >Send Otp</button> -->
        <div class="form-group second_box">
            <input type="text" id="otp" name="otp" class="form-control" placeholder="OTP" required="required">
			<span id="otp_error" class="field_error"></span>
        </div>
        <div class="form-group second_box">
            <button  class="btn btn-primary btn-block" type="submit">Submit OTP</button>
        </div>       
</div>
</body>
</html>                                		                            