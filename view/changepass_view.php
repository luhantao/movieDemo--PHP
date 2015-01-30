<?php
	session_start(); 
    require_once ("../control/user_control.php");
    
	$old_password = $_POST['old_password'];
	$new_password1 = $_POST['new_password1'];
	$new_password2 = $_POST['new_password2'];
	$handle = new user_control($_SESSION['user'] , $old_password ,
	   $new_password1 , null , null );
	$result = $handle -> change_pass (); 
	header("Location: ../index.php"); 
?>
