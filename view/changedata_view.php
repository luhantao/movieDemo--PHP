<?php
	session_start();
	require_once ("../control/user_control.php");

	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$handle = new user_control($_SESSION['user'] , null ,
	      null , $email , $phone); //a class of user_control

	$result = $handle ->change_data ();
	header("Location: ../index.php"); 
?>