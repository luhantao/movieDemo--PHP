<?php
    require_once ("../control/user_control.php");
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	</head>
	<body>
		<h1>登录界面</h1>
		<?php
        	$name = $_POST['user'];
			$password = $_POST['password'];
            if ($name == "" | $password == ""){
                $result = "用户名或密码不能为空！";
            }
            else{
				$handle = new user_control($name , $password ,
				 null , null , null);
				$result = $handle ->login ();
			}
            //echo $_SESSION['user'];
		?>
				<br>
                <h2><?php echo $result ?> </h2>
		
		<a href ="../index.php"> 返回主页面 </a>
	
	</body>
</html>
