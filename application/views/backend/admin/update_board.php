<?php
include('db.php');

/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['edit_id'], $_POST['edit_n'], $_POST['edit_de']))
{
    $message = 'Please enter a valid name and contact';
}
/*** check the username is the correct length ***/
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $id = filter_var($_POST['edit_id'], FILTER_SANITIZE_STRING);
    $n = filter_var($_POST['edit_n'], FILTER_SANITIZE_STRING);
    
    $de = filter_var($_POST['edit_de'], FILTER_SANITIZE_STRING);

    //echo $fn;
    /*** now we can encrypt the password ***/
    //$phpro_password = sha1( $phpro_password );

    try
    {

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = "UPDATE `boards` SET `board_name`='".$n."', `board_desc`='".$de."'
        	 WHERE `board_id`='".$id."'";

        /*** bind the parameters ***/
        //$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        //$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
		//$stmt->bindParam(':contact', $contact, PDO::PARAM_STR);

        $dbh->exec($stmt);
    header("Location: board_info.php");
                exit;


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>
<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<p><?php echo $message ?>
</body>
</html>