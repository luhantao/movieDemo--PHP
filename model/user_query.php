<?php
    /**
    * 
    */
    class user_query 
    {
        var $user ;
        var $pass ;
        var $change_pass ;
        var $email ;
        var $phone ;
        function __construct($user , $pass , $change_pass , $email , $phone){
            $this->user = $user ;
            $this->pass = $pass ;
            $this->change_pass = $change_pass ;
            $this->email = $email ;
            $this->phone = $phone ;
        }

        function dologin(){
            $link = mysqli_connect('localhost','root','83795381','myphp') ; //connect to database
            //$link2 = mysql_select_db('myphp',$link) ; //mysqli函数用不到
            $SQL = "select * from users where user_name='$this->user' and user_password='$this->pass'";
            $result_handle = mysqli_query ($link , $SQL);
            $nums = mysqli_num_rows($result_handle);
            //这句返回数据表的各栏位数据
            $contain = mysqli_fetch_array($result_handle);
            if ($nums != 1) {
                $result = "登录失败！用户名或密码错误！";
            }
            else{
                $result = "登录成功！欢迎您，".$this->user." ! ";
                $lifetime = 120; //设置session生命周期（秒）
                setcookie(session_name(),session_id(),time()+$lifetime,"/");
                $_SESSION['user'] = "$this->user" ;
                $_SESSION['user_whether_login'] = 1; 
                    
               // echo $_SESSION['user'];
            }
            return $result;
        } 

        function doreg (){
            $link = mysqli_connect('localhost','root','83795381','myphp') ; //connect to database
            $SQL = "select * from users where user_name='$this->user'";
            $result_handle = mysqli_query($link , $SQL);
            $nums = mysqli_num_rows($result_handle);
            if ($nums != 0){
                $result = "注册失败！用户名已存在！";
            }
            else{
                $SQL2 = "insert into users(user_name , user_password , user_email , user_phone)
                 values('$this->user' , '$this->pass' , '$this->email' , '$this->phone')";
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
        function dochange_pass (){
           // session_start(); 
            $link = mysqli_connect('localhost','root','83795381','myphp') ; //connect to database
            $SQL = "select * from users where user_name='$this->user'";
            $result_handle = mysqli_query($link , $SQL);
            $contain = mysqli_fetch_array($result_handle);
            if ($contain['user_password'] != $this->pass ){
                $result = "原密码错误！";
                return $result;
            }
            else {
                $SQL2 = "update users set user_password='$this->change_pass' where user_name='$this->user'";
                $result_handle = mysqli_query($link , $SQL2);
                if ($result_handle){
                    $result = "修改成功！";
                }
                else{
                    $result = "修改出错！";
                }
                return $result;

            }
        }

    }

?>
