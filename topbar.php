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
                <p>&nbsp;<br> </p>
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