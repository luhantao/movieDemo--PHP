<?php
	session_start();
	require_once("../model/movie_query.php");

	$user_name = $_SESSION['user'];
	$type = $_POST['type'];
	$movie_name = $_POST['movie_name'];
	$movie_date = $_POST['movie_date'];
	$movie_time = $_POST['movie_time'];
	$movie_seat = $_POST['movie_seat'];

	if ($type == "buy"){
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
	}
	else if($type =="refund"){
		$handle = new buy_ticket ($user_name , $movie_name ,
			$movie_date , $movie_time , $movie_seat);	
		$result = $handle -> delete_record();

		//echo $user_name.'-'.$movie_name.'-'.$movie_date.'-'.$movie_time.'-'.$movie_seat;
		
		if ($result =="succeed"){
			echo "退票成功！";	
		}
		else {
			//echo "退票失败！请重新操作！";
			echo $result;
		}
	}

?>