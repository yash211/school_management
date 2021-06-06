<!DOCTYPE html>
<html lang="en">

<head>
    <title>Navigaetion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            
             <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Ecommerce
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo site_url('ecom/createcourse'); ?>">Add Courses</a>
                    <a class="dropdown-item" href="<?php echo site_url('ecom/createtest'); ?>">Add Test</a>
                    <a class="dropdown-item" href="<?php echo site_url('ecom/createquestion'); ?>">Add Question</a>
                    <a class="dropdown-item" href="<?php echo site_url('ecom/createcontent'); ?>">Add Course Content</a>
                </div>
            </li>
            <li class="nav-item" style="float:right">
                <a class="nav-link" href="<?php echo site_url('superadmin/logout'); ?>">Log out</a>
            </li>
        </ul>
    </nav>
    <br>


</body>

</html>