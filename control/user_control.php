<?php
	require_once ("../model/user_query.php");	
	/**
	* 
	*/
	class user_control
	{
		var $handle; // a class of user_query
		function __construct($name , $pass , $change_pass , $email , $phone)
		{
			$stored_pass = md5($pass);
			$stored_change_pass = md5($change_pass);
			$this->handle = new user_query ($name , $stored_pass ,
			     $stored_change_pass , $email , $phone);

		}
		function login(){
			$result = $this->handle ->dologin();	
			return $result;
		}  
		function reg(){
			$result = $this->handle ->doreg();
			return $result;	
		}
		function change_pass(){
			$result = $this->handle ->dochange_pass();
			return $result;	
		}
		function change_data(){
			$result = $this->handle ->dochange_data();
			return $result;	
		}
	}

?>