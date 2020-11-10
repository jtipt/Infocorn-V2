<?php
$conn = new mysqli('localhost', 'root', 'root123', 'ratingSystem');

if (isset($_POST['save'])) {
    $uID = $conn->real_escape_string($_POST['uID']);
    $ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
    $ratedIndex++;

    if (!$uID) {
        $conn->query("INSERT INTO stars (rateIndex) VALUES ('$ratedIndex')");
        $sql = $conn->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1");
        $uData = $sql->fetch_assoc();
        $uID = $uData['id'];
    } else
        $conn->query("UPDATE stars SET rateIndex='$ratedIndex' WHERE id='$uID'");

    exit(json_encode(array('id' => $uID)));
}

$sql = $conn->query("SELECT id FROM stars");
$numR = $sql->num_rows;

$sql = $conn->query("SELECT SUM(rateIndex) AS total FROM stars");
$rData = $sql->fetch_array();
$total = $rData['total'];

$avg = $total / $numR;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
      <link
         href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&family=Permanent+Marker&family=Ubuntu&display=swap"
         rel="stylesheet"
      />
 <script src="js/main.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&family=Permanent+Marker&family=Ubuntu&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/rateus.css">
</head>

<body>
<div class="topnav" id="myTopnav">
         <a href="index.html">InfoCorn</a>
         <a href="rateus.php"  class="active" >Rate Us</a>
         <a href="contact.php"   >Contact Us</a>
        
         <a href="javascript:void(0);" class="icon" onclick="myFunction()">
           <i class="fa fa-bars"></i>
         </a>
       </div>
    <h1>
        Rate Us
    </h1>
    <div class="outer-box" align="center">
        <div class="box">
            <div class="inner-box">
                <h3>
                    Please Rate Us
                </h3>
                <i class="fa fa-star fa-2x" aria-hidden="true" data-index="0"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true" data-index="1"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true" data-index="2"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true" data-index="3"></i>
                <i class="fa fa-star fa-2x" aria-hidden="true" data-index="4"></i>
                <br><br>
                <p class="avg">
                    <?php
                    echo round($avg, 2)
                    ?>
                </p>
            </div>
        </div>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/57456f662e.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/rjs.js"></script>

 <script src="https://kit.fontawesome.com/57456f662e.js" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
</html>