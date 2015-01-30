<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Theme Template for Bootstrap</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap-combobox.css">
    <link rel="stylesheet" href="css/select2Buttons.css">
    <link rel="stylesheet" href="css/style.css">
    <style type ="text/css">
    .pic{
        background-image:url(image/back3.jpg);
        background-attachment: fixed ;
        background-repeat: repeat ;
    }
    </style>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-combobox.js"></script>
    <script src="js/jQuery.select2Buttons.js"></script>
    
</head>
<!-- style="background-image:url(image/back2.jpg) ;background-repeat: no-repeat ;background-attachment: fixed " -->
<body class="pic" role="document" > 
<div class="panel panel-default">
  <img src="image/2.jpg" style="width: 100%; height: 30%; margin-top: 52px" >
</div>

<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
   <!--   <div >
        <p><font size="5">&nbsp</font></p>
        <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200" src="image/2.jpg" style="width: 100%; height: 23%;">
      </div>
   -->
 
 <!-- nav标签为整个顶栏的标签 -->     
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation" >

    <!-- 标签文字+链接定义 --> 
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >   
          <ul class="nav navbar-nav">
            <li  >
               <a style= "position: absoulute ;left: 20% ;color: #ffffff" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 您好，欢迎来到&nbsp</a>
            </li>
            <li >
               <a href="index.php" style= "color: #ffff00">&nbsp;&nbsp;&nbsp;爆米花电影网</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php
            //顶栏php代码**********************************************************************
              session_start();
              if (!isset($_SESSION['user_whether_login']) ){
                  $_SESSION['user_whether_login'] = 0 ;   
              }
              if ($_SESSION['user_whether_login']== 0) {
            ?>
            <li class ="active ">
               <a id="modal-2" href="#modal-container-2" role="button" class="btn" data-toggle="modal">登陆</a>
            </li>
            <li class ="active ">
               <a id="modal-1" href="#modal-container-1" role="button" class="btn" data-toggle="modal">注册</a>
            </li>
            <?php
              //顶栏php代码********************************************************************** 
              }
              else {
            ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="#ffffff">
                     欢迎您，<?php echo $_SESSION['user']; ?> ! 
                  </font>
                  <strong class="caret">
                  </strong>
               </a>
              <ul class="dropdown-menu">
                <li>
                   <a href="#modal-container-7" data-toggle="modal">修改密码</a>
                </li>
                <li>
                   <a href="#modal-container-3" data-toggle="modal">修改个人信息</a>
                </li>
                <li>
                   <a href="logout.php">退出</a>
                </li>
              </ul>
            </li>

            <li class ="active ">
               <a id="modal-1" href="#modal-container-6" role="button" class="btn" data-toggle="modal">电影票购买</a>
            </li>
            <li class ="active ">
               <a id="modal-4" href="#modal-container-4" role="button" class="btn" data-toggle="modal">我的订单</a>
            </li>
            <?php
              //顶栏php代码**********************************************************************
              }
            ?>

            <li class ="active ">
               <a id="modal-5" href="#modal-container-5" role="button" class="btn" data-toggle="modal">关于我们</a>
            </li>   
            <li>
               <a style= "position: absoulute ;right: 20%" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
            </li>

          </ul>
      </div>
      
<!--注册弹窗 -->
      <div class="modal fade" id="modal-container-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true" style="margin-left: 92%; margin-top: 4%; margin-bottom: -9%;">
                  &times;
            </button>
            <p>
               <h1 align ="center"> <font size =7><b>注册</b></font></h1>
               &nbsp <br>
            </p>

        <div class="col-md-12 column">

            <form class="form-horizontal" onSubmit="return regcheck(this)" role="form" name="reg" action="view/reg_view.php" method="post">
              <div class="form-group">          
                <label for="inputText3" class="col-sm-3 control-label">输入用户名</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputText3" name="user"/>
                </div>          
              </div>
              <div class="form-group"> 
                <label for="inputPassword3" class="col-sm-3 control-label">输入密码</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputPassword3"  name="password"/>
                </div>        
              </div>
              <div class="form-group">           
                <label for="inputPassword3" class="col-sm-3 control-label">确认密码</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputPassword3"  name="password2"/>
                </div>            
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">输入邮箱</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputEmail3" name="email"/>
                </div>
              </div>
              <div class="form-group">          
                <label for="inputNumber3" class="col-sm-3 control-label">输入电话</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputNumber3" name="phone"/>
                </div>          
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-lg" >注册</button>
                </div>
              </div>
            </form>
          </div>  
          <p>
            &nbsp; <br>       
            &nbsp; <br>
          </p>

          </div>       
        </div>   
      </div>
      
      <script type="text/javascript">
        function regcheck(form){
             if (form.user.value ==""||form.password.value ==""||form.password2.value ==""||form.email.value ==""||form.phone.value ==""){
               alert("信息栏不能有空！");
               return false;
             }
             else if (form.password.value != form.password2.value){
               alert("前后输入密码不一致！");
               return false;
             }
             else {
               return true;
             }
          
        }
      </script>

<!--修改用户信息弹窗 -->
      <div class="modal fade" id="modal-container-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true" style="margin-left: 92%; margin-top: 4%; margin-bottom: -9%;">
                  &times;
            </button>
            <p>
               <h1 align ="center"> <font size =7><b>修改用户信息</b></font></h1>
               &nbsp; <br>
            </p>

        <div class="col-md-12 column">

            <form class="form-horizontal" role="form" name="change_data" action="view/changedata_view.php" method="post">

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">原有邮箱</label>
                <div class="col-sm-8">
                  <p><b>fuck</b></p>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">修改邮箱</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="inputEmail3" name="email"/>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">原有电话</label>
                <div class="col-sm-8">
                  <p><b>fuck</b></p>
                </div>
              </div>
              <div class="form-group">          
                <label for="inputNumber3" class="col-sm-3 control-label">修改电话</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputNumber3" name="phone"/>
                </div>          
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-lg">修改</button>
                </div>
              </div>
            </form>
          </div>  
          <p>
            &nbsp; <br>       
            &nbsp; <br>
          </p>

          </div>       
        </div>   
      </div>

<!--修改密码 -->
      <div class="modal fade" id="modal-container-7" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true" style="margin-left: 92%; margin-top: 4%; margin-bottom: -9%;">
                  &times;
            </button>
            <p>
               <h1 align ="center"> <font size =7><b>修改密码</b></font></h1>
               &nbsp; <br>
            </p>

        <div class="col-md-12 column">

            <form class="form-horizontal" role="form" name="change_pass" onSubmit="return passchange_check(this)"  action="view/changepass_view.php" method="post">

              <div class="form-group">
                <label for="inputpassword2" class="col-sm-3 control-label">输入原密码</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputpassword" name="old_password"/>
                </div>
              </div>
              <div class="form-group">          
                <label for="inputNumber3" class="col-sm-3 control-label">输入新密码</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputpassword2" name="new_password1"/>
                </div>          
              </div>
              <div class="form-group">          
                <label for="inputNumber3" class="col-sm-3 control-label">再次输入新密码</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputpassword3" name="new_password2"/>
                </div>          
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-lg">修改</button>
                </div>
              </div>
            </form>
          </div>  
          <p>
            &nbsp; <br>       
            &nbsp; <br>
          </p>

          </div>       
        </div>   
      </div>

      <script type="text/javascript">
        function passchagnge_check(form){
             if (form.old_password.value ==""||form.new_password1.value ==""||form.new_password2.value =="" ){
               alert("信息栏不能有空！");
               return false;
             }
             else if (form.new_password1.value != form.new_password2.value){
               alert("新密码不一致！");
               return false;
             }
             else {
               return true;
             }
          
        }
      </script>

<!--登陆 -->
      <div class="modal fade" id="modal-container-2"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" id = "open_div">
          <div class="modal-content" >
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true" style="margin-left: 92%; margin-top: 4%; margin-bottom: -9%;">
                  &times;
            </button>
            <p>
               <h1 align ="center"> <font size =7><b>登陆</b></font></h1>
               &nbsp <br>
            </p>

        <div class="col-md-12 column">

            <form class="form-horizontal" onSubmit="return logcheck(this)" role="form" name="login" action="view/login_view.php" method="post">
              <div class="form-group">
               
                <label for="inputText3" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputText3" name="user"/>
                </div>
                
              </div>
              <div class="form-group">
              
                <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="inputPassword3"  name="password"/>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-lg">登陆</button>
                </div>
              </div>
            </form>
          </div>  
            <p>
               &nbsp; <br>       
               &nbsp; <br>
            </p>

          </div>       
        </div>   
      </div>

      <script type="text/javascript">
        function logcheck(form){
             if (form.user.value ==""){
               alert("用户名不能为空！");
               return false;
             }
             else if (form.password.value ==""){
               alert("密码不能为空！");
               return false;
             }
             else {
               return true;
             }
        }
      </script>

<!--我的订单 -->   
      <div class="modal fade" id="modal-container-4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true" style="margin-left: 92%; margin-top: 4%; margin-bottom: -9%;">
                  &times;
            </button>
            <p>
               <h1 align ="center"> <font size =7><b>我的订单</b></font></h1>
               &nbsp; <br>
            </p>
          <p>
            &nbsp; <br>       
            &nbsp; <br>
          </p>
          </div>       
        </div>   
      </div>

<!--关于我们 -->   
      <div class="modal fade" id="modal-container-5" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" >
            <p>
                <img alt="200x200" src="image/baomihua.jpg" style="width: 100%; height: 43%;margin-bottom:-10px">
            </p>
          </div>       
        </div>   
      </div> 


<!--购票页面 -->   
      <div class="modal fade" id="modal-container-6" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" id = "open_div">
          <div class="modal-content" >
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true" style="margin-left: 92%; margin-top: 4%; margin-bottom: -9%;">
                  &times;
            </button>
            <p>
               <h1 align ="center"> <font size =7><b>购票页面</b></font></h1>
               &nbsp; <br>
            </p>

        <div class="col-md-12 column">
            <form class="form-horizontal" role="form" name="login" action="dologin.jsp" method="post">
              <div class="form-group">            
                <label for="inputText3" class="col-sm-2 control-label">电影场次</label>
                <div class="col-sm-2">
                  <select class="combobox" name="time" >
                    <option></option>
                    <option value="a">9:00 -- 12:00</option>
                    <option value="b">12:00 -- 15:00</option>
                    <option value="c">15:00 -- 18:00</option>
                    <option value="d">18:00 -- 21:00</option>
                    <option value="e">21:00 -- 24:00</option>
                  </select>               
                </div>                
              </div>

              <div class="form-group">              
                <div class="col-sm-12">
                  <hr>
                  <h1 align ="center"> <font size =5><i><b>电影屏幕</b></i></font></h1>
                </div>
              </div>
          
              <div class="form-group">              
                <label for="inputPassword3" class="col-sm-2 control-label">选座</label>
                <div class="col-sm-8">
                  <select class="standard-demo" name="simple-select">
                    <option value="11">01-1</option>
                    <option value="12">01-2</option>
                    <option value="13">01-3</option>
                    <option value="14">01-4</option>
                    <option value="15">01-5</option>
                    <option value="16">01-6</option>
                    <option value="17">01-7</option>
                    <option value="18">01-8</option>

                    <option value="21">02-1</option>
                    <option value="22">02-2</option>
                    <option value="23">02-3</option>
                    <option value="24">02-4</option>
                    <option value="25">02-5</option>
                    <option value="26">02-6</option>
                    <option value="27">02-7</option>
                    <option value="28">02-8</option>

                    <option value="31">03-1</option>
                    <option value="32">03-2</option>
                    <option value="33">03-3</option>
                    <option value="34">03-4</option>
                    <option value="35">03-5</option>
                    <option value="36">03-6</option>
                    <option value="37">03-7</option>
                    <option value="38">03-8</option>

                  </select>
                  <p>&nbsp<br> </p>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2">
                  <div class="col-sm-11">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-success btn-block btn-lg">购买</button>
                    </div>
                  </div>
                </div>
              </div>

            </form>
          </div>  
            <p>
               &nbsp; <br>       
               &nbsp; <br>
            </p>

          </div>       
        </div>   
      </div>
    </nav> 


<!-- 滚动幻灯片 -->
      <div class="carousel slide" id="carousel-343775" style="margin-top: -20px">
        <ol class="carousel-indicators">
          <li data-slide-to="0" data-target="#carousel-343775">
          </li>
          <li data-slide-to="1" data-target="#carousel-343775" class="active">
          </li>
          <li data-slide-to="2" data-target="#carousel-343775">
          </li>
        </ol>
        <div class="carousel-inner">
          <div class="item">
            <img alt="" src="image/congcongnanian2.jpg" style="width: 100%; "/>
            <div class="carousel-caption">
              <h4>
                First Thumbnail label
              </h4>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
          <div class="item active">
            <img alt="" src="image/quanchengtongji2.jpg" style="width: 100%; "/>
            <div class="carousel-caption">
              <h4>
                Second Thumbnail label
              </h4>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
          <div class="item">
            <img alt="" src="image/xingjichuanyue2.jpg" style="width: 100%; "/>
            <div class="carousel-caption">
              <h4>
                Third Thumbnail label
              </h4>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
            </div>
          </div>
        </div> <a class="left carousel-control" href="#carousel-343775" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-343775" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
      
<!-- 电影信息界面 -->
      
      <div class="row">
        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="300x200" src="image/bbbb.jpg" style="width: 100%"/>
            <div class="caption">
              <h3>
                Thumbnail label
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
              <p>
                 <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="300x200" src="image/aaaa.jpg"/>
            <div class="caption">
              <h3>
                Thumbnail label
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
              <p>
                 <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="thumbnail">
            <img alt="300x200" src="image/cccc.jpg" />
            <div class="caption">
              <h3>
                Thumbnail label
              </h3>
              <p>
                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
              </p>
              <p>
                 <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row clearfix">
        <div class="col-md-12 column" >
          <blockquote style="background-color:#ffffff ">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
            </p> <small>Someone famous <cite>Source Title</cite></small>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
    $('.combobox').combobox();
});
</script>
<script>
    $('.standard-demo').select2Buttons();
    $('select[name=js-callback-select]').change(function() {
    alert('Changed to ' + $(this).val());
});
$('select[name=no-default-select]').select2Buttons({noDefault: true});
</script>

</body>
</html>

<?php 
  //php代码，用于登录时密码错误弹框**************************************************************
    if (!isset($_SESSION['alert']) ){
      $_SESSION['alert'] = "";
    }
    else if ($_SESSION['alert'] != ""){
      echo '<script type="text/javascript">alert(" ' , $_SESSION['alert'] , ' ");</script>' ;
      $_SESSION['alert'] = "";
    }
    
?>