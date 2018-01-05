<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helper/format.php';?>
<?php

    $db=new Database();
    $fm=new Format();    

?>

<?php include 'lib/facebook.php';?>
<?php include 'lib/mainpost.php';?>
<?php include 'lib/donorsignupfield.php';?>
<?php include 'lib/doctorsignupfield.php';?>
<?php include 'lib/hospitalsignupfield.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Basic Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <link rel="stylesheet" type="text/css" href="styles.css">
     <link rel="stylesheet" type="text/css" href="dropdownstyle.css">
     <link rel="stylesheet" type="text/css" href="list.css">
     <link rel="stylesheet" type="text/css" href="user.css">  
     <link rel="stylesheet" type="text/css" href="profile.css">

         <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
    <style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>

</head>
<body>

   


