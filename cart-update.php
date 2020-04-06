<?php
	require 'include/common.php';
	$item_id=$_GET['id'];
	$user_id=$_SESSION['id'];
	$qry="UPDATE user_items SET `status`='Added to cart' WHERE u_id='$user_id' and it_id='$item_id'";
	$run=mysqli_query($con,$qry) or die(mysqli_error($con));
	header('location:shop.php');
?>