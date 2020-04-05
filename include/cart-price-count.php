<?php
	
	

	function count_cart_price($con){
		$user_id = $_SESSION['id'];
		$select_qry = "SELECT * FROM user_items ui INNER JOIN items i ON ui.it_id=i.i_id and ui.u_id='$user_id' and ui.status='Added to cart'";
		$sum=0;
		$run=mysqli_query($con,$select_qry) or die(mysqli_error($con));
		while ($row = mysqli_fetch_array($run)) {
		    $sum+= $row["i_price"];
		}
		return $sum;
	}
?>