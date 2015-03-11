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
        <!-- 订单弹窗  -->
        <div class="container-fluid">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>电影名字</th>
                <th>播放日期</th>
                <th>播放时间</th>
                <th>座位信息</th>
                <th>退票</th>
              </tr>
            </thead>
            <tbody id="ticket_table">
              <!-- 
              <tr class="info">
                <td>4</td>
                <td>TB - Monthly</td>
                <td>04/04/2012</td>
                <td>Call in to confirm</td>
                <td><button class="btn btn-warning btn-mini" type="button">退票</button></td>
              </tr> -->
            </tbody>
          </table>
        </div>
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

<!-- 我的订单查看 + 退票  -->
<script type="text/javascript">
  $("[href='#modal-container-4']").click(function(){
      //获取当前日期
      var d = new Date();
      var date1 = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate() ;
      var date2 = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + (d.getDate()+1) ;
      //防止订单记录重叠
      $('#ticket_table tr[name = "temp"]').remove();
      //ajax请求用户订单
      var user_order = $.ajax({url:"control/ajax_getorders.php",async:false});
      if (user_order.responseText == "no"){
          alert("用户已失效，请重新登录！");
          window.location.href="index.php"; 
          return false;
      }
      else {
        //获得当前用户购买的电影票信息,全局变量，可用于之后的退票
         response_order = eval( user_order.responseText );
         //alert(response_order[3].seat);
           for (var i = 0; i < response_order.length; i++) {
              if (response_order[i].date == 1){
                  var date_transform = date1;
              }
              else {
                  var date_transform = date2;
              }
              //更改座位显示方式
              var seat_transform = response_order[i].seat.substr(0,1) + '排' +
                                  response_order[i].seat.substr(1,1) + '座';
               $('#ticket_table').append( 
                  '<tr class="success" name="temp"><td>'
                            + response_order[i].movie_name + '</td><td>'
                            + date_transform + '</td><td>'
                            + response_order[i].time + '</td><td>'
                            + seat_transform + 
                  '</td><td><button name="refund' + i +
                    '" class="btn btn-warning btn-mini" type="button">退票</button></td></tr>'
               );
           }
      }
  });
  
  //退票按钮点击事件
  $(document).on("click", "#ticket_table button", function(){
      var current_name = $(this).attr("name");
      //从name="refund*"属性，获取response_order[i]中的i值
      var order_id = current_name.substr(6,1);
      //alert(response_order[order_id].movie_name);

      var logon_test = $.ajax({url:"control/ajax_getmovie.php?type=logon_test",async:false});
      if (logon_test.responseText =="no"){
          alert ("用户已失效，请重新登录！");
          window.location.href="index.php"; 
          return false;
      }
      else {
          var refund_ticket = $.ajax({
              type:"post",
              url:"control/tickets_control.php" , 
              data: 
              {
                 type : "refund",
                 movie_name : response_order[order_id].movie_name,    
                 movie_date : response_order[order_id].date ,    
                 movie_time : response_order[order_id].time ,    
                 movie_seat : response_order[order_id].seat 
              },    
              async:false
          });
          alert (refund_ticket.responseText);
          window.location.href="index.php"; 
      }


  });
</script>