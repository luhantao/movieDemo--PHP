<?php
	session_start();
	require_once ("../control/user_control.php");

	$name = $_POST['user'];
	$password = $_POST['password'];
	
	$handle = new user_control($name , $password ,
	  null , null , null);
	$result = $handle ->login ();
	
	//echo $_SESSION['user'];
	header("Location: ../index.php"); 
?>