<?php
	require 'include/common.php';
	if(!isset($_SESSION['email'])){
		header('location:index.php');
	}
	$user_id=$_SESSION['id'];
	
	$message=$_GET['itemsid'];
	if($message=="confirmed"){
		$qry = "UPDATE `user_items` SET `status`='confirmed' WHERE `u_id`='$user_id' and `status`='Added to cart'";
		$run = mysqli_query($con,$qry) or die(mysqli_error($con));
	}
?>
<!doctype html>
<!--captureType is undefined
event.target.getElementByClassName(...)[i] is undefined-->
<html>
	<head>
		<title>HealthCrew Store</title>
		<?php
			require 'include/links.php';
		?>

	</head>
	<body>
	
	<div class="whole_container success-page">
		
		<div class="success-tab">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="success-txt text-center">
								<h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
								<p align="center">Click <a href="shop.php">here</a> to purchase any other item.</p>
								<h3>OR</h3>
								<p>Go To <a href="index.php">Home Page</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html> 