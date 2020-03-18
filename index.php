<?php
	include_once('dbfunction.php');  
	$funobj=new dbFunction();
	//echo "asdf";
	if($_POST['signup'])
	{
		//echo "string";
		$username = $_POST['name'];  
        $emailid = $_POST['email'];  
        $password = $_POST['password']; 
        $address=$_POST['add']; 
        $mob=$_POST['pn'];
        $confirmPassword = $_POST['cpassword'];	
        if($password==$confirmPassword)
        {
        	$email=$funobj->isUserExist($emailid);
        	if(!$email)
        	{
        		$register=$funObj->UserRegister($username, $emailid,$address, $password,$mob);
        			 if($register){  
                     echo "<script>alert('Registration Successful')</script>";  
                	}else{  
                    echo "<script>alert('Registration Not Successful')</script>";  
                	}  
           	} 
           			 else 
           			{  
                	echo "<script>alert('Email Already Exist')</script>";  
           			}  
        } 
        else 
        {  
        	//echo "string";
           echo "<script>alert('Password Not Match')</script>";  
          
        }  
        	}
        
	

?>