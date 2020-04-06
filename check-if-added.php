<?php
function  check_if_added_to_cart($item_id){
	require 'include/common.php';
	
	$user_id = $_SESSION['id'];
	
	$select_qry="SELECT * FROM user_items WHERE it_id='$item_id' AND u_id ='$user_id' and status='Added to cart'";
    
	$run=mysqli_query($con,$select_qry);
	
	if((mysqli_num_rows($run))>=1){
		return 1;
	}
	else{
		return 0;
	}
}
function  check_if_added_to_wish($item_id){
	require 'include/common.php';
	
	$user_id = $_SESSION['id'];
	
	$select_qry="SELECT * FROM user_items WHERE it_id='$item_id' AND u_id ='$user_id' and status='Added to wish'";
    
	$run=mysqli_query($con,$select_qry);
	
	if((mysqli_num_rows($run))>=1){
		return 1;
	}
	else{
		return 0;
	}
}
?>