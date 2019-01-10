<?php session_start(); ?>
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
	<div class="container"><br/>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($db, $_POST['username']);
	$pass = mysqli_real_escape_string($db, $_POST['password']);


	if($user == "" || $pass == "") {
		echo "<br/>";
	} else {
		$result = mysqli_query($db, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			header('Location: login.php');
		}

		if(isset($_SESSION['valid'])) {
			header('Location: view.php');			
		}
	}
} else {
?>
<center>
	<main class="bd-masthead" id="content" role="main">
  				
							<div class="col-md-8 order-md-2 text-center text-md-left pr-md-2">
								<form name="form1" method="post" action=""><br/>
									<div class="container">
									<center>
										<h1><font face="forte">Log In&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></h1>
									</center>
									</div><br/>
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
										<br/>
										<button class="btn btn-outline-" type="submit" name="submit" value="Submit">Log In</button><br/><br/>
											<p>
												Already have an account ? &nbsp; <a class="btn btn-sm btn-outline-info" href="register.php" role="button">Sign Up</a>
											</p>
								</form>
      					</div>
    				</div>
</center>
<?php
}
?>
</div><br/><br/>
	
</body>
</html>
