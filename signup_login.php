<?php
include("database.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sinup/login</title>
	 <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		#myDIV2
		{
			display: none;
		}
	</style>
</head>
<body>
<div id="myDIV1">
	<h4>Alredy regitsered</h4>
<button value="login" id="login" onclick="Login()">Login</button>
<form method="POST" action="index.php">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" required>
				<label>Email</label>
				<input type="email" name="email" class="form-control" required>
				<label>Address</label>
				<input type="text" name="add" class="form-control" required>
				<label>Mobile</label>
				<input type="number" name="pn" class="form-control" required> 
				<label>Password</label>
				<input type="password" name="password" class="form-control" required>
				<label>Confirm Password</label>
				<input type="password" name="cpassword" class="form-control" required>
				<input type="submit" value="Signup" name="signup" class="btn btn-primary">
			</div>
		</div>
	</div>
</form>
</div>
<div id="myDIV2">
	<h4>Don't have an account</h4>
	<button value="Signup" id="signup" onclick="SignUp()">Sign Up</button>
	<form method="POST" action="">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" required>
					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
					<input type="submit" name="login" class="btn btn-primary">
				</div>
			</div>
	</form>
</div>
<script type="text/javascript">
	var id=document.getElementById("login").value;
	//console. log(id);
	function Login()
	{

		document.getElementById("myDIV1").style.display = "none";
		document.getElementById("myDIV2").style.display = "block";

	}
	function SignUp()
	{

		document.getElementById("myDIV2").style.display = "none";
		document.getElementById("myDIV1").style.display = "block";

	}

</script>

?>
</body>
</html>













