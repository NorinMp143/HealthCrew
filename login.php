<?php
	require 'include/common.php';
	if(isset($_SESSION['email'])){
		header('Location:index.php');
	}
?>
<!doctype html>
<html>
	<head>
		<title>HealthCrew Store</title>
		<?php
			require 'include/links.php';
		?>
		<link rel="stylesheet" type="text/css" href="css/icons.css">
		<style type="text/css">
			input:focus {
			    color: #f00 !important;
			    box-shadow: 0px 1px 10px #f00 !important;
			}
			.intro h2 {
	            font-weight: bold;
	            padding-top: 60px;
	            color: #000;
	        }
	        .form-control{
	        	height: auto!important;
	        }
        .error_box.email {
		    position: absolute;
		    top: 15px;
		    right: 115%;
		}
		.error_box.pass::after{
			border:none;
		}
		.error_box.pass {
		    position: absolute;
		    top: 74px;
		    left: 115%;
		}
		.error_box.pass::before{
			  content: "";
			position: absolute;
			right: 100%;
			top: 50%;
			height: 0;
			width: 0;
			margin-top: -12px;
			border: solid transparent;
			border-right-color: #000;
			border-width: 12px;
			pointer-events: none;
			}
		</style>
	</head>
	<body>
	
	<div class="whole_container success-page">
		<div class="intro">
            <h2 class="text-center">Login into HealthCrew</h2>
        </div>
		<div class="login">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3">
						<div class="login-form text-center">
							<div class="form-head"><h1>LOGIN</h1></div>
							<div class="form-input">
								<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
									<div class="form-group">
										<input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required placeholder="Enter Email">
									</div>
									<div class="form-group">
										<input type="password" name="pass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required class="form-control" placeholder="Enter Password">
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-my" value="Submit">
									</div>
									<?php
							            if(isset($_SESSION['pass_err'])){
							          ?> 
							              <div class="error_box pass" id="errpass">
							                <div class="close_icn" onclick="hide('errpass');">
							                  <i class="material-icons" id="head-down-icon">&#xe14c;</i>
							                </div>
							                <div class="err_dtl">
							                  <p><?php echo $_SESSION['pass_err']; ?></p>
							                </div>
							              </div>
							          <?php
							            }
							            if(isset($_SESSION['email_err'])){
							          ?>
							              <div class="error_box email" id="erremail">
							                <div class="close_icn" onclick="hide('erremail');">
							                  <i class="material-icons" id="head-down-icon">&#xe14c;</i>
							                </div>
							                <div class="err_dtl">
							                   <p><?php echo $_SESSION['email_err']; ?></p>
							                </div>
							              </div>
							          <?php
							           }
							          ?>
								</form>
								<?php
						            function test_input($data) {
						              $data = trim($data);
						              $data = stripslashes($data);
						              $data = htmlspecialchars($data);
						              return $data;
						            }
						           $email = $pass = "";
						            $email_done = $pass_done = false;

						            if ($_SERVER["REQUEST_METHOD"] == "POST") {
						              $email = test_input($_POST["email"]);
						              $pass = test_input($_POST["pass"]);

						              if(empty($email)){
						                $_SESSION['email_err']="Please fill your email!";
						                header('Location:login.php');
						              }
						              else{
						                $email_ptrn="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
						                if(!preg_match($email_ptrn,$email)){
						                  $_SESSION['email_err']="Please type valid email!";
						                  header('Location:login.php');
						                }
						                else{
						                //   if(isset($_SESSION['email_err'])){
						                //     unset($_SESSION['email_err']);
						                //   }
						                  $em_query = "SELECT * FROM `user` WHERE `email` ='$email';";
						                  $em_run = mysqli_query($con,$em_query);
						                  if(mysqli_num_rows($em_run)>0){
						                  	$email_done=true;
						                    
						                  }else{
						                    $_SESSION['email_err'] = "email not found.";
						                    header('Location:login.php');
						                    die();
						                  }
						                }
						              }//end else

						              if(empty($pass)){
						                $_SESSION['pass_err']="Please fill password!";
						                header('Location:login.php');
						              }
						              else{
						                $pass_ptrn="/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
						                if(!preg_match($pass_ptrn,$pass)){
						                  $_SESSION['pass_err']="Please type minimum 8 or greater than 8 charactors and atleast 1 special charactors and atleast 1 numbers.";
						                  header('Location:login.php');
						                }
						                else{
						                  // if(isset($_SESSION['pass_err'])){
						                  //   unset($_SESSION['pass_err']);
						                  // }
						                  $select_query = "SELECT * FROM `user` WHERE `pass` = '$pass' and `email` = '$email';";
						                  $pass_run = mysqli_query($con,$select_query);
						                  if(mysqli_num_rows($pass_run)>0){
						                    $pass_done=true;
						                  }else{
						                    $_SESSION['pass_err'] = "email/password not found!";
						                    header('Location:login.php');
						                  }
						                }
						              }//end else

						              if($email_done and $pass_done){
						              	$qry = "SELECT * FROM `user` WHERE `email`='$email' AND `pass`='$pass'";
	
										$run = mysqli_query($con,$qry);
										$row = mysqli_fetch_array($run);
						              	$_SESSION['email']=$row['email'];
									    $_SESSION['id']=$row['id'];
										header('location:index.php');
						              }
						            }
						        ?>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
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
		function hide(x){
		    cl = document.getElementById(x);
		    cl.style.display='none';
		    
		}
	</script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html> 