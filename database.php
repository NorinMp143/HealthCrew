<?php
 class dbConnect
 {
 	//$conn=NULL;
 	function  __construct()
 	{
 		require_once('config.php');
 		$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
 		if(!$conn)
 		{
 			die("failed to connect");
 		}
 	}
 	public function close()
 	{
 		mysqli_close();
 	}
 }

//https://www.w3schools.com/php/func_mysqli_connect.asp
?>