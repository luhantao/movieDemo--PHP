<?php
    
    // $sql1 = "insert into user_login values('".$_POST[name]."','".$_POST[password]."')";
    // $result1 = mysql_query ($sql1);
    // if ($result1){
    //     echo "成功插入记录";
    // }
    
    $link = mysqli_connect('localhost','root','83795381','myphp') ; //connect to database
    
    function dologin($user , $pass){
        if ($user == "" | $pass == ""){
            $result = "用户名或密码不能为空！";
            return $result ;
        }

        global $link ;  //定义全局变量
        //$link2 = mysql_select_db('myphp',$link) ; //mysqli函数用不到
        $SQL = "select * from users where user_name='$user' and user_password='$pass'";
        $result_handle = mysqli_query ($link , $SQL);
        $row = mysqli_num_rows($result_handle);
        $contain = mysqli_fetch_array($result_handle);
        if ($row != 1) {
            $result = "登陆失败！用户名或密码错误！";
        }
        else{
            // echo $contain["user_id"];
            // echo $contain["user_name"];
            // echo $contain["user_password"];
            // echo $contain["user_whether_login"];

            $result = "登陆成功！欢迎，".$user." ! ";
        }
        return $result;
    } 

    function doreg ($user , $pass){
        if ($user == "" | $pass == ""){
            $result = "用户名或密码不能为空！";
            return $result ;
        }

        global $link ;
        $SQL = "select * from users where user_name='$user'";
        $result_handle = mysqli_query($link , $SQL);
        $row = mysqli_num_rows($result_handle);
        if ($row == 1){
            $result = "注册失败！用户名已存在！";
        }
        else{
            $SQL2 = "insert into users(user_name , user_password) values('$user' , '$pass')";
            $result_handle = mysqli_query($link , $SQL2);
            if ($result_handle){
                $result = "注册成功！";
            }
            else{
                $result = "注册出错！";
            }
        }   
        return $result;
    }  
           

    
?>
