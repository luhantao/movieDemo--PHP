<?php
	session_start(); 
    require_once ("../control/user_control.php");
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	</head>
	<body>
		<h1>注册验证页面</h1>
		<?php
			$name = $_POST['user'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
            if ($name == ""| $password == ""| $email == ""| $phone == ""){
                $result = "用户信息栏不能为空！";
            }
            else {
				$handle = new user_control($name , $password ,
				   null , $email , $phone );
				$result = $handle -> reg(); 
            }
		?>
				<br>
                <h2><?php echo $result ?> </h2>
		
		<a href ="../index.php"> 返回主页面 </a>
	
	</body>
</html>
