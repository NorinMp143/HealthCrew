<div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1234 5678 90</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">info@healthcrew.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">

					    	<?php if(isset($_SESSION['email'])){
					    			$mail = $_SESSION["email"];
									$qry = "SELECT * FROM user WHERE email = '$mail'";
									$run = mysqli_query($con,$qry) or die(mysqli_error($con));
									$row = mysqli_fetch_array($run);
									$owner = $row['name'];
					    		?>

					    		<p class="mb-0 register-link">Hi, <?php echo $owner;?></p>

					    		<?php
					    	} else { ?>

						    <p class="mb-0 register-link"><a href="sign.php" class="mr-3">Sign Up</a><a href="login.php">Sign In</a></p>

						<?php } ?>

					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">HealthCrew</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="departments.php" class="nav-link"><span>Department</span></a></li>
	          <li class="nav-item"><a href="doctors.php" class="nav-link"><span>Doctors</span></a></li>
	          <li class="nav-item"><a href="shop.php" class="nav-link"><span>Shop</span></a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link"><span>Blog</span></a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link"><span>Contact</span></a></li>
	         
	          <?php
				if(isset($_SESSION['email'])){
					$id = $_SESSION["id"];
					$cart_qry = "SELECT * FROM user_items WHERE u_id = '$id' and status = 'Added to cart'";
					$cart_run = mysqli_query($con,$cart_qry) or die(mysqli_error($con));
					$cart_row = mysqli_num_rows($cart_run);
					?>
					
					 <li class="nav-item">
			          	<a href="cart.php" class="nav-link">
				          	<div class="cart_icon">
								<img src="images/cart.png" alt="">
								<div class="cart_count"><span><?php echo $cart_row;?></span></div>
							</div>
			          	</a>
			          </li>

			          <li class="nav-item cta mr-md-2"><a href="logout.php" class="nav-link">Logout</a>
			          </li>
				<?php } ?>

	         
	          <li class="nav-item cta mr-md-2"><a href="appointment.php" class="nav-link">Appointment</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>