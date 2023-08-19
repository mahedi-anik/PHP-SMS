
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

      <!DOCTYPE html>
      <html lang="en">
      <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Register page</title>

         <!-- custom css file link  -->
         <link rel="stylesheet" href="css/style.css">
           <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
      </head>
      <body>

         <div class="main-content">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="card" style="min-height:485px">
                     <div class="card-header card-header-text">
                        <h1 style="text-align: center;">welcome <mark><span><?php echo $_SESSION['user'] ?></span></mark></h1>
                        <hr>
      
                     </div>
                     <div class="card-content ">
                        </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

            </body>
            <?php include_once('footer.php');?> 
            </html>

            








































