<?php
	require 'include/common.php';
	$item_id=$_GET['id'];
	$user_id=$_SESSION['id'];
	$qry="Delete FROM user_items WHERE u_id='$user_id' and it_id='$item_id'";
	$run=mysqli_query($con,$qry) or die(mysqli_error($con));
	header('location:cart.php');
?>