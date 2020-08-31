<?php
    // check if User Coming From A Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      // Assign Variable

      $user = filter_var($_POST['name'], FILTER_SANITIZE_STRING);//Filter String
      $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);//Filter Email
      $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);//Filter Number Integer
      $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
      //$userErrors = '';
      //$phoneErrors = '';
      //$msgErrors = '';

       //Creating Array Of Error

       $formErrors = array();
       if(strlen($user) < 3) {
         $formErrors[] = 'Username Must Be Larger Than <strong>3</strong> Charcters';
       }
       if(strlen($phone) <= 10) {
         $formErrors[] = 'Your Number Must Be Large Than <strong>10</strong> Number';
       }
       if(strlen($msg) < 10) {
         $formErrors[] = 'Your Message Must Be Large Than <strong>10</strong> Charcters';
       }

       //If No Errors Send The Email [mail(to,subject,message,header,parameters)]

       $myEmail = 'dreamshar14@gmail.com';
       $headers = 'From: ' . $mail .'\r\n';
       $subject = 'Contact Form';

       if (empty($formErrors)) {

         mail($myEmail, $subject, $msg, $headers);

         $user = '';
         $mail = '';
         $phone = '';
         $msg = '';

         $success = '<div class="alert alert-success text-center">We Have Recieved Your Message</div>';
       }


    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/mycss.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,500;0,900;1,700&display=swap" >
</head>
<body>
  <!-- Start Form -->
  <div class="container">
    <h2 class="text-center"> Contact Me </h2>

     <?php if (! empty($formErrors)) {?>
       <!-- Start Div Errors -->
       <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
       <!--code to print error if it found-->
         <?php
           foreach ($formErrors as $errors) {
             echo $errors . '<br>';
           }
           ?>
           </div>
        <!-- End Div Errors -->
         <?php } ?>
         <?php if (isset($success)){ echo $success;} ?>

    <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="form-group">
          <i class="fas fa-user fas-fw font-aw"></i>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Type Your Name" name="name" value="<?php if(isset($user)){echo $user;}?>">
          <span class="asterisx">*</span>
          <div class="alert alert-danger private-alert">
            Username Must Be Larger Than <strong>3</strong> Charcters
          </div>
          </div>
            <!--<?php
                // Valdite Username
                if (isset($userErrors)){
                  echo $userErrors;
                }
            ?>-->

        <div class="form-group">
          <i class="fas fa-envelope fas-fw font-aw"></i>
          <input type="email" class=" email form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type Your E-mail" name="email" value="<?php if(isset($mail)){echo $mail;}?>">
          <span class="asterisx">*</span>
          <div class="alert alert-danger private-alert">
            E-Mail Can not Be <strong>Empty</strong>
          </div>
        </div>

        <div class="form-group">
          <i class="fas fa-phone-alt fas-fw font-aw"></i>
          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Type Your phone" name="phone" value="<?php if(isset($phone)){echo $phone;}?>">
          <div class="alert alert-danger private-alert">
            This Feild Must Be Larger Than <strong>10</strong> Numbers
          </div>
        </div>
          <!--<?php
              // Valdite PhoneNumber
              if (isset($phoneErrors)){
                echo $phoneErrors;
              }
          ?>-->
        <div class="form-group">
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Type Your Message" name="message"> <?php if(isset($msg)){ echo $msg; }?></textarea>
         <div class="alert alert-danger private-alert">
           Username Must Be Larger Than <strong>10</strong> Charcters
         </div>
      </div>
        <!--<?php
            // Valdite Message
            if (isset($msgErrors)){
              echo $msgErrors;
            }
        ?>-->
        <i class="fas fa-paper-plane fas-fw send-icon"></i>
        <input type="submit" class="btn btn-primary btn-lg" value="Send Message">
      </form>
  </div>
  <!-- END Form -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/all.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugin.js"></script>
</body>
</html>
