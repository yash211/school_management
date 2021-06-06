<?php
session_start();
if(isset($_SESSION['IS_LOGIN'])){
	header('location:teacher_dashboard.php');
}else{
	//header('location:index.php');
	die();
}
?>

<a style="float:right" href="logout.php">Logout</a>
