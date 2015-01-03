<html>
	<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>主页面index.php</title>
	</head>
	<body>
		<?php
			session_start();
			// if (!isset($_SESSION['user']) ){
			// 	$_SESSION['user']="";
			// }
			// if ($_SESSION['user'] == ""){
			// 	echo "用户没登录，请登录！";	
			// }
			// else {
			// 	echo "欢迎你,".$_SESSION['user']." !";	
			// }
			if (!isset($_SESSION['user_whether_login']) ){
				$_SESSION['user_whether_login'] = 0 ;		
			}
			if ($_SESSION['user_whether_login']== 0) {
				echo "用户没登录，请登录！";
		?>
		<h1>注册</h1>
		<form action="view/reg_view.php" method="post"> 
			<p>用户名:
				<input type="text" name="user"><br>
			</p>
			<p>密码：
				<input type="password" name="password"><br>
			</p>
			<p>邮件地址:
				<input type="email" name="email"><br>
			</p>
			<p>联系电话:
				<input type="text" name="phone"><br>
			</p>
			<input type="submit" value="register">
		</form>
		<h3>&nbsp;</h3>
			
		<h1>登陆</h1>
		<form action="view/login_view.php" method="post"> 
			<p>用户名:
				<input type="text" name="user"><br>
			</p>
			<p>密码：
				<input type="password" name="password"><br>
			</p>
			<input type="submit" value="login">
		</form>
		<?php 
			}
			else {
				echo "欢迎你,".$_SESSION['user']." !";
				echo '<p><br></p>';
        ?>
		<h1>修改密码</h1>
		<form action="view/changepass_view.php" method="post"> 
			<p>原密码:
				<input type="password" name="old_password"><br>
			</p>
			<p>新密码：
				<input type="password" name="new_password1"><br>
			</p>
			<p>再次输入新密码：
				<input type="password" name="new_password2"><br>
			</p>
			<input type="submit" value="提交">
		</form>

        <form action="logout.php" method="post">
        	<input type="submit" value="logout">
        </form>
        
	 <!-- 	<a href="logout.php">
        	<button value="logout">
        		logout
        	</button>
        </a>  -->


        <?php
        	}
        ?>
        <div>
        	<?php 
        		for ($i=1; $i <7 ; $i++) { 
        			echo '<img src="image/' , "$i" , '.jpg" style="width: 500px" />';			
        			echo '<p><br></p>';
        		}
        	?>
        </div>
		
	</body>
</html>
