<?php
	require_once ("../model/movie_query.php");	
	/**
	* 
	*/
	class get_movie
	{
		var $handle; // a class of movie_query
		
		function __construct($id ,$name)
		{
			$this->handle = new movie_query ($id ,$name);
		}
		
		function namebyid(){
			$result = $this->handle ->getnamebyid();	
			return $result;
		}  
		function fare(){
			$result = $this->handle ->getfare();
			return $result;	
		}
		function type(){
			$result = $this->handle ->gettype();
			return $result;	
		}
		function lasttime(){
			$result = $this->handle ->getlasttime();
			return $result;	
		}
		function director(){
			$result = $this->handle ->getdirector();
			return $result;	
		}
		function starring(){
			$result = $this->handle ->getstarring();
			return $result;	
		}
		function description(){
			$result = $this->handle ->getdescription();
			return $result;	
		}
		function picture(){
			$result = $this->handle ->getpicture();
			return $result;	
		}
		function language(){
			$result = $this->handle ->getlanguage();
			return $result;	
		}
		function video(){
			$result = $this->handle ->getvideo();
			return $result;	
		}
	}


?>








