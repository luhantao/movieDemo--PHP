<html>
	<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>tao的第一个PHP程序</title>
	</head>
	<body>
		<?php
			echo "hello Lu Hantao, 这是一个PHP程序";
		?>

		<h1>注册</h1>
		<form action="reg.php" method="post"> 
			<p>用户名:
				<input type="text" name="user"><br>
			</p>
			<p>密码：
				<input type="password" name="password"><br>
			</p>
			<input type="submit" value="register">
		</form>
		<h2>&nbsp;</h2>
		
		<h1>登陆</h1>
		<form action="login.php" method="post"> 
			<p>用户名:
				<input type="text" name="user"><br>
			</p>
			<p>密码：
				<input type="password" name="password"><br>
			</p>
			<input type="submit" value="login">
		</form>
        <!-- <a href=dbquery.php><button value="数据库判定">数据库判定</button></a> -->


	</body>
</html>
