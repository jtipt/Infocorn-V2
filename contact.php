<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/phpmailer/phpmailer/src/Exception.php';
  require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
      $mail->isSMTP();
      
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'contactinfocorn@gmail.com';
      // Gmail Password
      $mail->Password = 'infocorn@123';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      // Email ID from which you want to send the email
      $mail->setFrom('contactinfocorn@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('contactusinfocorn@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission';
      $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

      $mail->send();
      $output = '<div class="alert alert-success">
                  <h5>Thankyou! for contacting us, We\'ll get back to you soon!</h5>
                </div>';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>

 <script src="js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
<link rel="stylesheet"href="css/contact.css">
<link rel="stylesheet"href="css/style.css">
</head>

<body >
<div class="topnav" id="myTopnav">
         <a href="index.html" >InfoCorn</a>
         <a href="rateus.php">Rate Us</a>
         <a href="contact.php" class="active">Contact Us</a>
        
         <a href="javascript:void(0);" class="icon" onclick="myFunction()">
           <i class="fa fa-bars"></i>
         </a>
       </div>
  <div class="container">
  


            <form action="#" method="POST">
              <div class="form-group">
                <?= $output; ?>
              </div>
              <div class="form-group">
                <h2>Name</h2>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <h2>Email</h2>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter E-Mail" required>
              </div>
              <div class="form-group">
                <h2>Subject</h2>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject"
                  required>
              </div>
              <div class="form-group">
                <h2>Message</h2>
                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Write Your Message"
                  required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Send" class="btn btn-primary btn-block" id="sendBtn">
              </div>
            </form>
            </div>
            <footer>
         <p class="icons">
            <a href="www.facebook.com"><i class="fa fa-facebook-square fa-lg icon" aria-hidden="true"></i></a>
            <a href="www.instagram.com"><i class="fa fa-instagram fa-lg icon" aria-hidden="true"></i></a>
            <a href="www.twitch.com"><i class="fa fa-twitch fa-lg icon" aria-hidden="true"></i></a>
            <a href="www.twitter.com"><i class="fa fa-twitter fa-lg icon" aria-hidden="true"></i></a>
            <a href="www.youtube.com"><i class="fa fa-youtube-play fa-lg icon" aria-hidden="true"></i></a>
         </p>
         <p class="bottext">
            <a href="index.html" class="bottext1">Home</a>
            <a href="contact.php" class="bottext1">Contact Us</a>
          
            <a href="https://www.themoviedb.org/" class="bottext1">API</a>
         </p>
         <p class="cr"><i class="fa fa-copyright" aria-hidden="true"></i> 2020 Infocorn.com</p>
      </footer>
          </body>

</html>