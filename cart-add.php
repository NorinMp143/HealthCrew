<?php
	require 'include/common.php';
	$item_id = $_GET['id'];
	$user_id = $_SESSION['id'];
	$insert_qry = "INSERT INTO `user_items`(`u_id`, `it_id`, `status`) VALUES('$user_id', '$item_id', 'Added to cart')";
	mysqli_query($con,$insert_qry) or die(mysqli_error($con));;
	header('location:shop.php');
?>