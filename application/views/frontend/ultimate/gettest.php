
<?php 
  //session_start();
  $con = new mysqli('localhost', 'root', '', 'e_commerce');
  $query="SELECT * FROM courses";
  $result=mysqli_query($con,$query);
  $courses=[];
  //$courses=mysqli_fetch_array($result);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<h2>OUR COURSES</h2>
 
<div class="container">
<?php while ($courses = mysqli_fetch_array($result)) { ?>
  <div class="card" style="width:400px">
    <div class="card-body">
      <h4 class="card-title"><?php echo $courses['name']; ?></h4>
      <p class="card-text"><?php echo $courses['description']; ?></p>
      <a href="enrollcourse.php" class="btn btn-primary">Enroll</a>
    </div>
  </div>
  <br>
  <?php } ?>

</div>

</body>
</html>


