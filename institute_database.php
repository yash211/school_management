<?php
//session_start();
$con = mysqli_connect("localhost", "root", "", "ecattor");
if (isset($_POST['save'])) {
    $sname = $_POST['schoolname'];
    $stype = $_POST['apptitle'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    //echo $correctans;

    $query = "INSERT INTO institute(name,type,email,phone,password) VALUES ('$sname','$stype','$email','$phone','$password')";
    //$queryrun = mysqli_query($con, $query);

    if ($con->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    //echo $correctans;

    $query = "SELECT * FROM institute WHERE password=$password";
    //$queryrun = mysqli_query($con, $query);

    if ($con->query($query) === TRUE) {
        echo "Logged in successfully";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}

?>