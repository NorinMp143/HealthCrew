<?php

include_once 'dbfunction.php';  $user = new User(); // Checking for user logged in or not
 
 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
 $name=$_POST['name'];
 $mob=$_POST['mob'];
 $password=$_POST['pass'];
 $email=$_POST['email'];
 $addess=$_POST['address'];
 $register = $user->reg_user($name,$mob,$password,$email,$addess);
 // Registration Success
 if($register)
 {
echo 'Registration successful <a href="login.php">Click here</a> to login';
 }
 else {
 // Registration Failed
 echo 'Registration failed. Email or Username already exits please try again';
 }
 } 
 ?>
<style>
/*#container{width:400px; margin: 0 auto;}*/</style>
<script type="text/javascript" language="javascript">
 function submitreg() {
 var form = document.reg;
 if(form.name.value == ""){
 alert( "Enter name." );
 return false;
 }
 else if(form.uname.value == ""){
 alert( "Enter username." );
 return false;
 }
 else if(form.upass.value == ""){
 alert( "Enter password." );
 return false;
 }
 else if(form.uemail.value == ""){
 alert( "Enter email." );
 return false;
 }
 }
</script>
<div id="container">
<h1>Registration Here</h1>
<form action="" method="post" name="reg">
<table>
<tbody>
<tr>
<th>Full Name:</th>
<td><input type="text" name="name" required="" /></td>
</tr>
<tr>
<th>Email:</th>
<td><input type="email" name="email" required="" /></td>
</tr>
<tr>
<th>Address</th>
<td><input type="text" name="address" required="" /></td>
</tr>
<tr>
<th>Mob:</th>
<td><input type="number" name="mob" required="" /></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="pass" required="" /></td>
</tr>
<tr>
<td></td>
<td><input onclick="return(submitreg());" type="submit" name="submit" value="Register" /></td>
</tr>
<tr>
<td></td>
<td><a href="login.php">Already registered! Click Here!</a></td>
</tr>
</tbody>
</table>
</form></div>
