<!DOCTYPE html>
<html lang="en">
<head>
	<title>phonebook</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
	<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
	<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="pon.css" type="text/css">
</head>
<body>

	<div class="container">
				<nav class="navbar navbar-expand-lg navbar-success bg-transparent">
					<img src="img/12.png" width="90" height="60"/>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item active">
									<br><a class="nav-link" href="register.php"><font color="white" face="forte"><h1>PhoneBook</h1></font><span class="sr-only">(current)</span></a>
								</li>
							</ul>
						</div>
				</nav>
	</div>
	<div class="container text-center">
	
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	$db = mysqli_connect('localhost','root','','phonebook');

	if($user == "" || $pass == "" || $firstname == "" || $lastname == "" || $email == "") {
		echo "<br/>";
	} else {
		mysqli_query($db, "INSERT INTO login(firstname, lastname, email, username, password) VALUES('$firstname', '$lastname', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		header('location: login.php');
	}
} else {
?>
<center>
	<main class="bd-masthead" id="content" role="main">
  				<div class="container">
    					
							<div class="col-md-8 order-md-2 text-center text-md-left pr-md-2">
								<form name="form1" method="post" action=""><br/>
									<div class="container">
										<h2><font face="forte">Registration Form</font></h2>
									</div><br/>
										<div class="row">
											<div class="col-md-10 mb-6">
												<label for="validationServer01">First Name</label>
													<input type="text" name="firstname" class="form-control is-valid" id="validationServer01"  required>
											</div>&nbsp;
											<div class="col-md-10 mb-6">
												<label for="validationServer01">Last Name</label>
													<input type="text" name="lastname" class="form-control is-valid" id="validationServer01"  required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-10 mb-6">
												<label for="validationServer01">Email</label>
													<input type="email" name="email" class="form-control is-valid" id="validationServer01"  required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-10 mb-6">
												<label for="validationServer01">Username</label>
													<input type="text" name="username" class="form-control is-valid" id="validationServer01"  required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-10 mb-6">
												<label for="validationServer01">Password</label>
													<input type="password" name="password" class="form-control is-valid" id="validationServer01"  required>
											</div>
										</div>
<<<<<<< HEAD
										<button class="btn btn-outline-red" type="submit" name="submit" value="Submit">register</button><br/><br/>
=======
										<br/>
										<center>
									<div class="col-md-10 mb-6">
										<button class="btn btn-outline-" type="submit" name="submit" value="Submit">register</button><br/><br/>
									</div>	
										</center>
>>>>>>> fourth commit
											<p>
												Already have an account ? &nbsp; <a class="btn btn-sm btn-outline-info" href="login.php" role="button">log in</a>
											</p>
								</form>
							</div>
    					</div>
	
	

<?php
}
?>
</div><br/><br/>
	
</body>
</html>
