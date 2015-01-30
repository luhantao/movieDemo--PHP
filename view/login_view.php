<?php
	session_start();
	require_once ("../control/user_control.php");

	$name = $_POST['user'];
	$password = $_POST['password'];
	$handle = new user_control($name , $password ,
	      null , null , null); //a class of user_control

	$result = $handle ->login ();
	header("Location: ../index.php"); 
?>