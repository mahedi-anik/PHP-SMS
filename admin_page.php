<?php include_once('header.php');?>
<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user'])){
   header('location:login_form.php');
}

?>

<?php include_once('sidebar.php');?>
<?php include_once('top-header.php');?>
<?php include_once('main-content.php');?>   
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="logincss/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
    
   </div>

</div>

</body>
</html>
<?php include_once('footer.php');?> 