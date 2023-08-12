<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   //$name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = md5($_POST['password']);
   //$cpass = md5($_POST['cpassword']);
   //$role = $_POST['role'];

   $select = " SELECT * FROM users WHERE username = '$username' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['role'] == 'super_admin'){

         $_SESSION['user'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['role'] == 'department_admin'){

         $_SESSION['user'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['role'] == 'teacher'){

         $_SESSION['user'] = $row['name'];
         header('location:user_page.php');

      }elseif($row['role'] == 'student'){

         $_SESSION['user'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect username or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="logincss/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h1>Premier University</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="enter your username">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>