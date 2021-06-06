<?php
include('db.php');
?>

<?php
session_start();
$con = mysqli_connect("localhost","root","","tutor_data");

if(isset($_POST['save'])){
	$class_name=$_POST['name'];
    $class_code=$_POST['code'];
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$insert_query="INSERT INTO classes(class_code,class_name) VALUES($class_code,$class_name)";
	$stmt = "INSERT INTO `classes`(`class_code`, `class_name`) 
        VALUES ('".$class_code."', '".$class_name."')";
    $dbh->exec($stmt);
	$sql = "SELECT class_id from classes WHERE class_name= '".$class_name."'";
	$resultscid = mysqli_query($con, $sql);
	$r=[];
	$r=mysqli_fetch_array($resultscid);
	$q="SELECT email from students WHERE class_name= '".$class_name."'";
	$emailr=mysqli_query($con,$q);
	$e=[];
	$re=mysqli_fetch_array($emailr);
	//$stg="SELECT  "
	header('location: addclasses.php');
}
?>

