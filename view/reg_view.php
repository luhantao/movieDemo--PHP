<?php
	session_start(); 
	require_once ("../control/user_control.php");

	$name = $_POST['user'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$handle = new user_control($name , $password ,
	     null , $email , $phone );
	
	$result = $handle -> reg(); 
	header("Location: ../index.php"); 
?>

