<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php	
include_once("connection.php");

$result = mysqli_query($db, "SELECT * FROM contacts WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

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
					<nav class="navbar navbar-expand-lg navbar-success bg-gray">
						<img src="img/12.png" width="90" height="60" alt="img/.png"/>&nbsp;&nbsp;&nbsp;
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item active">
										<a class="nav-link" href="view.php"><font color="white" face="forte"><h1>Home </h1></font><span class="sr-only">(current)</span></a>
									</li>
								</ul>
								<form class="form-inline my-2 my-lg-0">		
									<ul class="navbar-nav mr-auto">
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="logout.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												logout
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdown">
												<a class="dropdown-item" href="logout.php">logout</a>
											</div>
										</li>			
									</ul>
								</form>
							</div>
					</nav>
		</div>
		<center>
<font color="white" face="forte"><h1>Contack List</h1></font>
		</center>
	<br/>
	<div class="container">
		<table class="table">
			<tr bgcolor='gray'>
			<td>firstname</td>
			<td>lastname</td>
			<td>phone_number</td>
			<td>email</td>
			<td>address</td>
			<td>action</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['firstname']."</td>";
			echo "<td>".$res['lastname']."</td>";
			echo "<td>".$res['phone_number']."</td>";
			echo "<td>".$res['email']."</td>";
			echo "<td>".$res['address']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
  <tbody>
</table>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<a class="btn btn-sm btn-outline-info" href="add.php">add contact</a>
</div>
		
	
</body>
</html>
