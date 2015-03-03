<?php 
	//require_once("../control/movie_control.php"); //".."从index中会出错
	//require_once("model/movie_query.php");  //在index.php中调入

	function getname($id){
		$handle = new movie_query($id ,null);
		$result = $handle -> getnamebyid();
		return $result;
	}

	function getmovie($name ,$content){
		//$handle = new get_movie($id ,$name);
		$handle = new movie_query(null ,$name);
		//拼接成调用语句，如 '$result = $handle ->getdescription'
		$code = '$result = $handle ->get' ."$content". '(); ';
		//把字符串转换成执行语句
		eval($code);

		return $result;
	}


?>