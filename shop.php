<?php
    require 'include/common.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>HealthCrew - Shop Store</title>
	<?php
			require 'include/links.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/icons.css">
</head>
<body>
	<div class="whole_container">
		<?php
			require 'include/header.php';
		?>
		<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="#">Baby and infant Supplements</a></li>
								<li><a href="#">Breathe Easy</a></li>
								<li><a href="#">Cold And Fever</a></li>
								<li><a href="#">Diabetic Care</a></li>
								<li><a href="#">Diapers</a></li>
								<li><a href="#">General Hygiene</a></li>
								<li><a href="#">Kidney Care</a></li>
								<li><a href="#">Liver Care</a></li>
								<li><a href="#">Lungs Care</a></li>
								<li><a href="#">Stomach Care</a></li>
								<li><a href="#">Weight Care</a></li>
							</ul>
						</div>
						<!-- <div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<p>
									Range: <a href="">Rs. 0 - 5000</a><br>
									Range: <a href="">Rs. 5000 - 10000</a><br>
									Range: <a href="">Rs. 10000 - 15000</a><br>
								</p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								<li class="brand"><a href="#">Apple</a></li>
								<li class="brand"><a href="#">Beoplay</a></li>
								<li class="brand"><a href="#">Google</a></li>
								<li class="brand"><a href="#">Meizu</a></li>
								<li class="brand"><a href="#">OnePlus</a></li>
								<li class="brand"><a href="#">Samsung</a></li>
								<li class="brand"><a href="#">Sony</a></li>
								<li class="brand"><a href="#">Xiaomi</a></li>
							</ul>
						</div> -->
					</div>

				</div>

				<div class="col-lg-9">
					

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>186</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
										<ul>
											<li class="shop_sorting_button">highest rated</li>
											<li class="shop_sorting_button">name</li>
											<li class="shop_sorting_button">price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="prods">
							<?php
							require 'check-if-added.php';
							$select_qry1 = "SELECT * FROM items";
							$run1=mysqli_query($con,$select_qry1);
							while ($row1 = mysqli_fetch_array($run1)) {
							?>
	                            <div class="prod">
	                                <div class="prod_img">
	                                    <img src="images/<?php echo $row1['i_cate']; ?>/<?php echo $row1['img_path'];?>" alt="">
	                                </div>
	                                <div class="prod_details">
	                                    <div class="prod-name"><?php echo $row1['i_name'];?></div>
	                                    <div class="prod-price">Price : <?php echo $row1['i_price'];?>Rs</div>
	                                </div>
	                                <?php if(!isset($_SESSION['email'])){?>
	                                <div class="buynow">
										<a href="">Buy Now</a>
	                                </div>
	                            <?php }else{
	                            	$iid = $row1['i_id'];
	                            	if(check_if_added_to_cart($row1['i_id'])){
	                            		
								echo '<div class="addto">
	                            		<a class="btn btn-success disable">Added to Cart</a>
	                            	</div>';
									}
									else{
										?>
	                            	<div class="addto">
	                            		<div>Add to</div>
	                            		<a href="cart-add.php?id=<?php echo $iid;?>">
	                            			<abbr title="Added to Cart">
	                            				<div class="atcart adder">
	                            			<i class="material-icons">&#xe854;</i>
	                            			</div></abbr>
	                            		</a>
	                            	</div>
	                            	<?php
	                            	}
	                            }?>
	                            </div>
							<?php } ?>
                        </div>

					</div>

				</div>
			</div>
		</div>
	</div>
<?php
			include 'include/footer.php';
		?>
    </div>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>