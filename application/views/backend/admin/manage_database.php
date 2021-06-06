<?php
include('db.php');
?>

<?php
session_start();
$con = mysqli_connect("localhost","root","","tutor_data");

if(isset($_POST['send'])){
	$class_name=$_POST['classname'];
    //$class_code=$_POST['code'];
	//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con = mysqli_connect("localhost","root","","tutor_data");
	$sql = "SELECT class_id from classes WHERE class_name= '".$class_name."'";
	$resultscid = mysqli_query($con, $sql);
	$r=[];
	$r=mysqli_fetch_array($resultscid);
	if($resultscid==TRUE){
		echo $r['class_id'];
	}else{
		echo "NOT SELECTED";
	}
	$q="SELECT email from students WHERE class_name= '".$class_name."'";
	$emailr=mysqli_query($con,$q);
	$e=[];
	$re=mysqli_fetch_array($emailr);
    echo $re['email'];
    $sc="SELECT class_code from classes WHERE class_name= '".$class_name."'";
    $scc=mysqli_query($con,$sc);
    $s=[];
    $s=mysqli_fetch_array($scc);
    echo $s['class_code'];
    $bodymsg="Your Class Code :" .$s['class_code'];
    echo $bodymsg;
    $tags = implode(',', $re);
    echo $tags;
    $headers = "From: gupta.yash211@gmail.com" . "\r\n" .
    mail($tags,"Class Code",$bodymsg,$headers);
    /*if(mail($tags,"Class Code",$bodymsg,$headers)){
        echo "YES";
    }else{
        echo "NO";
    }*/
	//$stg="SELECT  "
	header('location: student_info.php');
}
?>

