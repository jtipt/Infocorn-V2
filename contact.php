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
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    
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
      $mail->Subject = $subject;
      $mail->Body = "<h3>Name : $name $surname <br>Email : $email <br>Subject : $subject <br> Message : $message  <br>Phone : $phone <br>PostalCode : $postal <br>City : $city</h3>";

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

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>

 <script src="js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />

<link rel="stylesheet"href="css/contact.css">
</head>

<body >
<div class="topnav" id="myTopnav">
         <a href="index.html" >InfoCorn</a>
         <a href="rating.html">Rate Us</a>
         <a href="contact.php" class="active">Contact Us</a>
         <a href="forum/forum.php" > Infocorn Forum</a>

         <a href="javascript:void(0);" class="icon" onclick="myFunction()">
           <i class="fa fa-bars"></i>
         </a>
       </div>
 
  
  <form action="#" method="POST">
	    <h1>Should you have any questions, please do not hesitate to contact me :</h1>
	    
    <div class="contentform" style="background-color:#e1e1ed">
    <?= $output; ?>


    	<div class="leftcontact">
			      <div class="form-group">
			        <p>Surname<span>*</span></p>
			        <span class="icon-case"><i class="fa fa-male"></i></span>
				        <input type="text" name="surname" id="surname" required/>
                <div class="validation"></div>
       </div> 

            <div class="form-group">
            <p>Name <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
				<input type="text" name="name" id="name" required>
                <div class="validation"></div>
			</div>

			<div class="form-group">
			<p>E-mail <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                <input type="email" name="email" id="email" data-rule="email" data-msg="Proper Format Required"/>
                <div class="validation"></div>
			</div>	

			

			<div class="form-group">
			<p>Postcode <span>*</span></p>
			<span class="icon-case"><i class="fa fa-map-marker"></i></span>
				<input type="text" name="postal" id="postal" required>
                <div class="validation"></div>
			</div>	



	</div>

	<div class="rightcontact">	

			<div class="form-group">
			<p>City <span>*</span></p>
			<span class="icon-case"><i class="fa fa-building-o"></i></span>
				<input type="text" name="city" id="city" required>
                <div class="validation"></div>
			</div>	

			<div class="form-group">
			<p>Phone number <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-phone"></i></span>
				<input type="text" name="phone" id="phone" data-rule="maxlen:10" data-msg="Telephone number is usually 10 digits right  ? "/>
                <div class="validation"></div>
			</div>

			
			<div class="form-group">
			<p>Subject <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-comment-o"></i></span>
                <input type="text" name="subject" id="subject" required>
                <div class="validation"></div>
			</div>
		
			<div class="form-group">
			<p>Message <span>*</span></p>
			<span class="icon-case"><i class="fa fa-comments-o"></i></span>
                <textarea name="message" id="message" rows="14" required></textarea>
                <div class="validation"></div>
			</div>	
	</div>
  <div class="form-group">
                <input type="submit" name="submit" value="Send" class="btn btn-primary btn-block" id="sendBtn">
              </div>
	</div>

	
</form>	
          
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