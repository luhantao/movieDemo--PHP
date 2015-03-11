<?php
	session_start();
	require_once("../model/movie_query.php");

	$user_name = $_SESSION['user'];
	$movie_name = $_POST['movie_name'];
	$movie_date = $_POST['movie_date'];
	$movie_time = $_POST['movie_time'];
	$movie_seat = $_POST['movie_seat'];

	$handle = new buy_ticket ($user_name , $movie_name ,
		$movie_date , $movie_time , $movie_seat);	
	$result = $handle -> insert_record();

	if ($result =="succeed"){
		echo "购票成功！可在“我的订单”中查看购买信息";	
	}
	else {
		echo "购票失败！请重新购票";
	}
	// echo $result.$movie_name.$movie_date.$movie_time.$movie_seat ;

?>