<?php
    require_once ("dbquery.php");
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
			$result = doreg($name, $password);
		?>
				<br>
                <h2><?php echo $result ?> </h2>
		
		<a href ="index.php"> 返回主页面 </a>
	
	</body>
</html>
