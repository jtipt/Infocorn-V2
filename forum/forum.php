<html>

<head>
	<title></title>

	<!--Custom CSS-->

	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&family=Permanent+Marker&family=Ubuntu&display=swap" rel="stylesheet" />

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<!--Script-->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head>

<body>
	<!-- Navigation -->
	<div class="topnav" id="myTopnav">
		<a href="../index.html">InfoCorn</a>
		<a href="../rating.html">Rate Us</a>
		<a href="../contact.php">Contact Us</a>
		<a href="forum.php" class="active">Discussion Forum</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	<div class="container" style="margin:8% auto;">
		<div class="row">

			<div class="col-sm-5 col-md-4">
				<h2 style="color:white;">Log in</h2>
				<form class="form-signin" method="POST" role="search" action="pages/login.php">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-success btn-danger">Login</button>
				</form>
			</div>
			<div class="col-sm-5 col-md-4">


				<form method="POST" class="form-signin" action="functions/register.php">
					<h3 class="text-center" style="color:white;">Signup Here!</h3>
					<input type="text" name="fname" placeholder="First Name" class="form-control" required>
					<input type="text" name="lname" placeholder="Last Name" class="form-control" required>
					<select class="form-control" name="gender" required>
						<option>Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					<input type="text" placeholder="Username" name="username" class="form-control" required>
					<input type="password" placeholder="Password" name="password" class="form-control" required>
					<input type="submit" value="Signup" class="btn btn-success btn-danger" style="width:100%;">
				</form>
			</div>

		</div>
	</div>
	<hr>
	<!-- Footer -->
<footer class="page-footer font-small unique-color-dark pt-4">

<!-- Footer Elements -->
<div class="container">

  <!-- Call to action -->
  <ul class="list-unstyled list-inline text-center py-2">
	<li class="list-inline-item">
	 <a href="../contact.php"> <h5 class="mb-1">Contact Us</h5></a>
	</li>
	<li class="list-inline-item">
	  <a href="https://developers.themoviedb.org/3"><h5 class="mb-1">API</h5></a>
	</li>
	<li class="list-inline-item">
	  <a href="admin/login.php"><h5 class="mb-1">ADMIN</h5></a>
	</li>
	
  </ul>
  <!-- Call to action -->

</div>
<!-- Footer Elements -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2020 Copyright infocorn.com</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
</body>

</html>