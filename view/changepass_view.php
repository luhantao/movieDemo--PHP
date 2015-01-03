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
		<h1>改密码界面</h1>
		<?php
			$old_password = $_POST['old_password'];
			$new_password1 = $_POST['new_password1'];
			$new_password2 = $_POST['new_password2'];
            if ($old_password == ""| $new_password1 == ""| $new_password2 == ""){
                $result = "密码不能为空！";
            }
			elseif ($new_password1 != $new_password2){
				$result = "两次输入的新密码不同！" ;
			}
			else {
				$handle = new user_control($_SESSION['user'] , $old_password ,
				   $new_password1 , null , null );
				$result = $handle -> change_pass (); 
			}

            //echo $_SESSION['user'];
		?>
				<br>
                <h2><?php echo $result ?> </h2>
		
		<a href ="../index.php"> 返回主页面 </a>
	
	</body>
</html>
