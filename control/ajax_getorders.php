<?php 
	session_start();
	require_once("../model/movie_query.php");

	if (!isset($_SESSION['user']) ){
		echo "no";
	}
	else{
		$handle = new tickets_sold_query($_SESSION['user']);
		$data = $handle -> query();
		// echo $data[0]['user_name'].$data[0]['movie_name'].
		// 	$data[1]['user_name'].$data[1]['movie_name'];
		$result = '( [ ' ;
		for ($i=0; $i < sizeof($data) ; $i++) { 

			$result = $result.'{ "movie_name":"'.$data[$i]["movie_name"]. '" , "date":"' 
			.$data[$i]["date"]. '" , "time":"'.$data[$i]["time"]. '" , "seat":"' .$data[$i]["seat"]. '" } ' ;
			if ($i != sizeof($data)-1 ){
				$result = $result. ',' ;
			}
		 } 

		$result = $result. '] )' ;

		echo $result;
		// $result ='( 
		// [
		// 	{ "movie_name":"***" , "date":"***" , "time":"***" , "seat":"**" },
		//  { "movie_name":"***" , "date":"***" , "time":"***" , "seat":"**" },
		//  { "movie_name":"***" , "date":"***" , "time":"***" , "seat":"**" }
		// ]  )';  			//json格式例子

	}

?>