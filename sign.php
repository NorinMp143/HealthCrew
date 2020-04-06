<?php
	require 'include/common.php';
	if(isset($_SESSION['email'])){
		header('Location:/SummerProject/');
	}
?>
<!doctype html>
<html>
	<head>
		<title>Shopify Store</title>
		<?php
			require 'include/links.php';
		?>
		<style type="text/css">
			.intro h2 {
	            font-weight: bold;
	            padding-top: 60px;
	            color: #000;
	        }
	        .signup{
	        	padding-top: 54px;
				padding-bottom: 45px;
	        }
		</style>
	</head>
	<body>
	
	<div class="whole_container">
		<div class="intro">
            <h2 class="text-center">Signup into Shopify</h2>
        </div>
		<div class="signup">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3">
						<div class="sign-form text-center">
							<div class="form-head"><h1>SIGN</h1></div>
							<div class="form-input">
								<form autocomplete='off' method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
									<div class="form-group">
										<input type="name" name='username' class="form-control" placeholder="Enter Name" pattern="[a-zA-Z0-9]+" required>
									</div>
									<div class="form-group">
										<input name='email' type="email" class="form-control" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
									</div>
									<div class="form-group">
										<input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required class="form-control" placeholder="Enter Password" name='password'>
									</div>
									<div class="form-group">
										<input class="form-control" name='mobileno' placeholder="Enter Contact" type='numeric' pattern="[0-9]{10}" required>
									</div>
									<div class="form-group">
										<a href=""><input type="submit" class="btn btn-my" value="Submit"></a>
									</div>
									<?php
								          if(isset($_SESSION['usr_nm_err'])){
								        ?> 
								            <div class="error_box usr_nm" id="errusrnm">
								              <div class="close_icn" onclick="hide('errusrnm');">
								                <i class="material-icons" id="head-down-icon">&#xe14c;</i>
								              </div>
								              <div class="err_dtl">
								                <p><?php echo $_SESSION['usr_nm_err']; ?></p>
								              </div>
								            </div>
								        <?php
								        unset($_SESSION['usr_nm_err']);
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
								        unset($_SESSION['email_err']);
								         }
								         if(isset($_SESSION['mobno_err'])){
								        ?>
								            <div class="error_box mob" id="errmob">
								              <div class="close_icn" onclick="hide('errmob');">
								                <i class="material-icons" id="head-down-icon">&#xe14c;</i>
								              </div>
								              <div class="err_dtl">
								                <p><?php echo $_SESSION['mobno_err']; ?></p>
								               </div>
								            </div>
								        <?php
								         unset($_SESSION['mobno_err']);
								         }
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
								         unset($_SESSION['pass_err']);
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
						      $usr_nm = $email = $mobileno = $pass = "";
						      $usr_done = $email_done = $mob_done = $pass_done = false;

						      if ($_SERVER["REQUEST_METHOD"] == "POST") {
						        $usr_nm = test_input($_POST["username"]);
						        $email = test_input($_POST["email"]);
						        $mobileno = test_input($_POST["mobileno"]);
						        $pass = test_input($_POST["password"]);

						        if(empty($usr_nm)){
						          $_SESSION['usr_nm_err']="Please Fill Your Name!";
						          header('Location:sign.php');
						        }
						        else{
						          $usr_nm_ptrn="/^[a-zA-Z0-9]+/";
						          if(!preg_match($usr_nm_ptrn,$usr_nm)){
						            $_SESSION['usr_nm_err']="Please type only characters and numbers!";
						            header('Location:sign.php');
						          }
						          else{
						          	$usr_done=true;
						            
						          }
						        }//end else

						        if(empty($email)){
						          $_SESSION['email_err']="Please fill your email!";
						          header('Location:sign.php');
						        }
						        else{
						          $email_ptrn="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
						          if(!preg_match($email_ptrn,$email)){
						            $_SESSION['email_err']="Please type valid email!";
						            header('Location:sign.php');
						          }
						          else{
						            $select_query = "SELECT id FROM user WHERE email ='$email'";
						            $run = mysqli_query($con,$select_query);
						            if(mysqli_num_rows($run)>0){
						              $_SESSION['email_err'] = "email is already exists.";
						              header('Location:sign.php');
						            }else{
						              $email_done=true;
						            }
						          }
						        }//end else

						        if(empty($mobileno)){
						          $_SESSION['mobno_err']="Please fill your mobile number!";
						          header('Location:sign.php');
						        }
						        else{
						          $mobno_ptrn="/^[0-9]{10}/";
						          if(!preg_match($mobno_ptrn,$mobileno)){
						            $_SESSION['mobno_err']="Please type only 10 numbers!";
						            header('Location:sign.php');
						          }
						          else{
						            $select_query = "SELECT id FROM user WHERE mobno ='$mobileno'";
						            $run = mysqli_query($con,$select_query);
						            if(mysqli_num_rows($run)>0){
						              $_SESSION['mobno_err'] = "mobile number is already exists.";
						              header('Location:sign.php');
						            }else{
						              $mob_done=true;
						            }
						          }
						        }//end else

						        if(empty($pass)){
						          $_SESSION['pass_err']="Please fill password!";
						          header('Location:sign.php');
						        }
						        else{
						          $pass_ptrn="/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
						          if(!preg_match($pass_ptrn,$pass)){
						            $_SESSION['pass_err']="Please type minimum 8 or greater than 8 charactors and atleast 1 special charactors and atleast 1 numbers.";
						            header('Location:sign.php');
						          }
						          else{
						            $pass_done=true;
						          }
						        }//end else

						        if($usr_done and $email_done and $pass_done and $mob_done){
						          $insert_qry = "INSERT INTO user(`name`, `email`, `pass`, `mobno`) 
						    values('$usr_nm', '$email', '$pass', '$mobileno')";
						    $fetch_id_result = mysqli_query($con, $insert_qry) or die(mysqli_error($con));
						   
						    
						    $_SESSION['email']=$email;
						    $_SESSION['id']=mysqli_insert_id($con);
						    header('location:/SummerProject/');
						        }

						      }//end if

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