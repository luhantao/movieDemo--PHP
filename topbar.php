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
            <a href="#modal-container-3" data-toggle="modal">个人信息管理</a>
          </li>
          <li>
            <a href="logout.php">退出</a>
          </li>
        </ul>
      </li>
      <li class ="active ">
        <a id="modal-4" href="#modal-container-4" role="button" class="btn" data-toggle="modal">我的订单</a>
      </li>
      <?php
      //顶栏php代码**********************************************************************
        }
      ?>
      <li class ="active ">
        <a id="modal-5" href="#modal-container-5" role="button" class="btn" data-toggle="modal">关于作者</a>
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
        &nbsp; <br>
        </p>
        <div class="col-md-12 column">
          <form class="form-horizontal" onSubmit="return regcheck(this)" role="form" name="reg" action="view/reg_view.php" method="post">
            <div class="form-group">
              <label for="inputText3" class="col-sm-3 control-label">输入用户名</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="user" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">输入密码</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">确认密码</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="password2" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">输入邮箱</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="email" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="inputNumber3" class="col-sm-3 control-label">输入电话</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="phone" required/>
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
    if (form.password.value != form.password2.value){
      alert("前后输入密码不一致！");
    return false;
   }
    else {
      return true;
  }
  
  }
  </script>

  <!--修改用户信息弹窗 -->
  <?php
    if (!isset($_SESSION['user_email']) ){
      $_SESSION['user_email'] = "" ;
    }
     if (!isset($_SESSION['user_phone']) ){
      $_SESSION['user_phone'] = "" ;
    }
  ?>
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
              <label for="inputEmail3" class="col-sm-3 control-label">用户邮箱</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['user_email']; ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label for="inputNumber3" class="col-sm-3 control-label">用户电话</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="phone" value="<?php echo $_SESSION['user_phone']; ?>"/>
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
        <div class="col-md-12 column">
        </p>
          <form class="form-horizontal" role="form" name="change_pass" onSubmit="return passchagnge_check(this)" action="view/changepass_view.php" method="post">
            <div class="form-group">
              <label for="inputpassword2" class="col-sm-3 control-label">输入原密码</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="old_password" required />
              </div>
            </div>
            <div class="form-group">
              <label for="inputNumber3" class="col-sm-3 control-label">输入新密码</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="new_password1" id="change1" required />
              </div>
            </div>
            <div class="form-group">
              <label for="inputNumber3" class="col-sm-3 control-label">再次输入新密码</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="new_password2" id="change2" required />
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
    if (form.new_password1.value != form.new_password2.value){
      alert("两次输入密码不一致！");
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
        &nbsp; <br>
        </p>
        <div class="col-md-12 column">
          <!--onSubmit="return logcheck(this)"-->
          <form class="form-horizontal" role="form" name="login" action="view/login_view.php" method="post">
         
            <div class="form-group">     
              <label for="inputText3" class="col-sm-2 control-label">用户名</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="username" name="user"/>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="userpassword"  name="password" />
              </div>
            </div> 

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-lg" onClick ="logcheck()" >登陆</button>
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
  // function logcheck(form){
  //   if (form.user.value ==""){
  //     alert("用户名不能为空！");
  //     return false;
  //   }
  //   else if (form.password.value ==""){
  //     alert("密码不能为空！");
  //     return false;
  //   }
  //   else {
  //     return true;
  //   }
  // }
      function logcheck(){
        var name = document.getElementById("username");
        var pass = document.getElementById("userpassword");
        if (name.value==""){
          name.setCustomValidity("用户名不能为空！");
        }
        else{
          name.setCustomValidity("");
        }
        if (pass.value==""){
          pass.setCustomValidity("密码不能为空！");
        }
        else{
          pass.setCustomValidity("");
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
  <!--关于作者 -->
  <div class="modal fade" id="modal-container-5" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" >
        <p>
        <img alt="200x200" src="image/author.jpg" style="width: 100%; height: 70%; margin-bottom:-10px ; margin-top:-10px">
        </p>
      </div>
    </div>
  </div>
</nav>