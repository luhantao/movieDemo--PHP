<?php
	session_start();
	session_destroy();
//	$_SESSION['user'] = "";
//	$_SESSION['user_whether_login'] = 0;
	header("Location: index.php"); 
 ?>
