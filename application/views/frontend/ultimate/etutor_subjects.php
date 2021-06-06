<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
</head>

<body>
    <h2><?php echo $name; ?></h2>
    <p><?php echo $desc; ?></p>
    <strong>Please Go Through The Subject content</strong>
    <?php $path="uploads/document";?>
    <iframe src="uploads/document/css_prac.pdf" width="90%" height="500px">
    </iframe>
</body>

</html>