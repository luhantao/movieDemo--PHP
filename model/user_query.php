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
                $_SESSION['alert'] = "登录失败！用户名或密码错误！";
            }
            else{
                // $_SESSION['alert'] = "登录成功！欢迎您，".$this->user." ! "; 

                $lifetime = 3600; //设置session生命周期（秒）
                setcookie(session_name(),session_id(),time()+$lifetime,"/");
                
                $_SESSION['user'] = "$this->user" ;
                $_SESSION['user_whether_login'] = 1; 
                $_SESSION['user_phone'] = $contain['user_phone']; 
                $_SESSION['user_email'] = $contain['user_email']; 
            }
            return $_SESSION['alert'] ;
        } 

        function doreg (){
            $link = mysqli_connect('localhost','root','83795381','myphp') ; //connect to database
            $SQL = "select * from users where user_name='$this->user'";
            $result_handle = mysqli_query($link , $SQL);
            $nums = mysqli_num_rows($result_handle);
            if ($nums != 0){
                $_SESSION['alert'] = "注册失败！用户名已存在！";
            }
            else{
                $SQL2 = "insert into users(user_name , user_password , user_email , user_phone)
                 values('$this->user' , '$this->pass' , '$this->email' , '$this->phone')";
                $result_handle = mysqli_query($link , $SQL2);
                if ($result_handle){
                    $_SESSION['alert'] = "注册成功！";
                    $_SESSION['user'] = "$this->user" ;
                    $_SESSION['user_whether_login'] = 1; 
                    $_SESSION['user_phone'] = "$this->phone";
                    $_SESSION['user_email'] = "$this->email";
                }
                else{
                    $_SESSION['alert'] = "注册出错！";
                }
            }   
            return $_SESSION['alert'];
        }

        function dochange_pass (){
           // session_start(); 
            $link = mysqli_connect('localhost','root','83795381','myphp') ; //connect to database
            $SQL = "select * from users where user_name='$this->user'";
            $result_handle = mysqli_query($link , $SQL);
            $contain = mysqli_fetch_array($result_handle);
            if ($contain['user_password'] != $this->pass ){
                $_SESSION['alert'] = "原密码错误！";
                return $_SESSION['alert'];
            }
            else {
                $SQL2 = "update users set user_password='$this->change_pass' where user_name='$this->user'";
                $result_handle = mysqli_query($link , $SQL2);
                if ($result_handle){
                    $_SESSION['alert'] = "修改成功！";
                }
                else{
                    $_SESSION['alert'] = "修改出错！";
                }
                return $_SESSION['alert'];

            }
        }

        function dochange_data (){
           // session_start(); 
            $link = mysqli_connect('localhost','root','83795381','myphp') ; //connect to database
            $SQL = "select * from users where user_name='$this->user'";
            $result_handle = mysqli_query($link , $SQL);
            $contain = mysqli_fetch_array($result_handle);
            if ($this->email == null){
                $this->email = $contain['user_email'];
            }
            if ($this->phone == null){
                $this->phone = $contain['user_phone'];
            }
            $SQL2 = "update users set user_phone='$this->phone' , user_email='$this->email' where user_name='$this->user'";
            $result_handle = mysqli_query($link , $SQL2);
            if ($result_handle){
                $_SESSION['alert'] = "修改成功！";
                $_SESSION['user_phone'] = $this->phone; 
                $_SESSION['user_email'] = $this->email; 
            }
            else{
                $_SESSION['alert'] = "修改出错！";
            }
            return $_SESSION['alert'];

        }

    }

?>
