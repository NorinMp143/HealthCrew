<?php
	require 'include/common.php';
	if(!isset($_SESSION['email'])){
		header('location:index.php');
	}
	require 'include/cart-price-count.php';
	$user_id = $_SESSION['id'];
	$itm_select_qry = "SELECT * FROM user_items ui INNER JOIN items i ON ui.it_id=i.i_id and ui.u_id='$user_id' and ui.status='Added to cart'";
	$num=1;
	$itm_run=mysqli_query($con,$itm_select_qry) or die(mysqli_error($con));
?>
<!doctype html>
<html>
	<head>
		<title>HealthCare - Cart</title>
		<?php
			require 'include/links.php';
		?>
		<style type="text/css">.cart-idv-item-details {
    display: block;
}</style>
	</head>
	<body>
	
	<div class="whole_container">
		<?php
			require 'include/header.php';
		?>
		<div class="cart-sec">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div><h2>Shopping Cart</h2></div>
						<div class="cart-items">
							<?php
								while($row = mysqli_fetch_array($itm_run)) {
									$img = $row['img_path'];
									$name = $row['i_name'];
									$rs = $row['i_price'];
									$dic = $row['i_cate'];
							?>
							<div class="cart-idv-item-details d-flex flex-md-row flex-column justify-content-between align-items-center">
								<div class="detail-cell"><img src="images/<?php echo $dic;?>/<?php echo $img;?>" alt="Macbook Air"></div>
								<div class="detail-cell d-name">
									<div class="detail-title">Name</div>
									<div class="detail-info"><?php echo $name;?></div>
								</div>
								<div class="detail-cell de-flex">
									<div class="detail-title">Price</div>
									<div class="detail-info"><?php echo $rs;?></div>
								</div>
								<div class="detail-cell de-flex">
									<div class="order-icon">
										<a href="cart-remove.php?id=<?php echo $row['i_id'];?>" class="d-flex justify-content-center align-items-center"><i class="material-icons">&#xe872;</i></a>
									</div>
									<div class="order-icon">
										<a href="wish-update.php?id=<?php echo $row['i_id'];?>" class="d-flex justify-content-center align-items-center"><i class="fas fa-heart"></i></a>
									</div>
								</div>
							</div>
							<?php
							}
							?>
						</div>
						<div class="order_total align-items-center">
							<div class="text-md-right">
								<div class="order-title">Order Total:</div>
								<div class="order-amount"><?php echo count_cart_price($con);?></div>
							</div>
						</div>
						<div class="order-confirm">
							<?php if(count_cart_price($con)>0){?>
							<a href="success.php?itemsid=confirmed" class="btn btn-primary btn-lg">Confirm Order</a>
							<?php
							}
							else{
								?>
								<a href="shop.php" class="btn btn-primary btn-lg">Shop Now</a>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			include 'include/footer.php';
		?>
	</div>
	<script>
		function show(x){
			var v=document.getElementById(x);
			if(v.style.display=="none"){
				v.style.display='block';
			}
			else{
				v.style.display='none';
			}
		}
	</script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html> 