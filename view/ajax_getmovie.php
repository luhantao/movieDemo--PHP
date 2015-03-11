<?php 
	session_start();
	require_once("../model/movie_query.php");
	
	$type = $_GET['type'];
	if ($type =="logon_test"){
		if (!isset($_SESSION['user']) ){
			echo "no";
		}
		else{
			echo "yes";
		}
	}
	if ($type =="id"){
		$id = $_GET['poster_id'];

		$handle = new movie_query($id ,null);
		$result = $handle -> getnamebyid();
		
		echo $result;
	}
	else if ($type =="time"){
		$date = $_GET['value'];
		$name = $_GET['name'];

		$handle = new ticket_query($name , $date , null);
		$temp = $handle -> gettime();
		//拼接json字符串$result ,除去temp中的null值
		
		//temp中最后一个值可能为空值，使用json_encode会出现一个空栏！！
		//echo json_encode($temp);    

		$result = '( ["' .$temp[0] ;
		for ($i=1; $i < sizeof($temp) ; $i++) { 
			if ($temp[$i]!=""){
				$result = $result . '" , "' .$temp[$i] ;
			}
		}
		$result = $result . '"] )';
		echo $result;		//返回当前日期,该电影的时间段
	}
	else if ($type == "seats"){
		$name = $_GET['name'];
		$date = $_GET['value1'];	//1 ,2
		$time = $_GET['value2'];  	//10:00-12:00 , 13:30-15:40

		$handle = new ticket_query($name , $date , $time);
		$contain = $handle -> getseats();

		//拼接json字符串$result , 返回座位情况
		$result = '( [ ' ;
		for ($i=1; $i <= 5 ; $i++) { 
			$string = 'seats'.$i.'1' ;
			$result = $result .'{ "'.$string.'":"'.$contain[$string].'" ';
			for ($j=2; $j <= 7 ; $j++) { 
				$string ='seats'.$i.$j ; 
				$result = $result .', "'.$string.'":"'.$contain[$string].'" ';
			}
			if ($i != 5){
				$result = $result .'} , ' ;
			}
			else{
				$result = $result .'} ] )' ;
			}
		}
		// $result ='( 
		// [
		// 	{ "seats11":"yes" , "seats12":"yes" , "seats13":"no" , "seats14":"no" , "seats15":"yes" , "seats16":"yes" , "seats17":"yes"},
		// 	{ "seats21":"yes" , "seats22":"yes" , "seats23":"no" , "seats24":"yes" , "seats25":"no" , "seats26":"yes" , "seats27":"yes"},
		// 	{ "seats31":"yes" , "seats32":"no" , "seats33":"no" , "seats34":"yes" , "seats35":"yes" , "seats36":"yes" , "seats37":"no"}
		// ]  )';  			//json格式例子
		echo $result;

	}

?>