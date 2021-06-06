<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'e_tutor');
$email = $_POST['email'];
$res = mysqli_query($con, "select * from user where email='$email'");
$count = mysqli_num_rows($res);
if ($count > 0) {
	$otp = rand(11111, 99999);
	mysqli_query($con, "update user set otp='$otp' where email='$email'");
	$html = "Your otp verification code is " . $otp;
	$_SESSION['EMAIL'] = $email;
	//smtp_mailer($email,'OTP Verification',$html);
	//$headers = "From : $email";
	$headers = 'From: ' . $email . "\r\n" .
		'Reply-To: ' . $email . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	mail($email, 'OTP verification', $html, $headers);
	echo "yes";
} else {
	echo "not_exist";
}

//mail()
