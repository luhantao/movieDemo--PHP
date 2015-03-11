<?php  
  session_start(); 
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Helloworld,Luhantao</title>
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
<!-- selcect2Buttons 插件不能包入jquery.js文件，不然会出错！！！！  -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-combobox.js"></script>
    <script src="js/jQuery.select2Buttons.js"></script>

    <!--Ajax 服务端请求 -->
    <script type="text/javascript">
        var xmlhttp;
        function loadXMLDoc(url,cfunc){
          if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
          }
          else
          {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=cfunc;
          xmlhttp.open("GET",url,true);
          xmlhttp.send();
        }
      
    </script>
    
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

<!-- *****************************包含顶栏php文件 ********************-->
      <?php
        include_once("topbar.php");
      ?> 


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
          <?php  
            require_once("view/getmovie_view.php");
            require_once("model/movie_query.php");
            
            for ($i=1; $i<4; $i++){   //三个item的内容，第二个为active
              if ($i==2){
                echo '<div class="item active">';
              }
              else{
                echo '<div class="item">';
              }

              echo '<img src="image/ppt' , "$i" , '.jpg" style="width: 100%; "/> ';
              echo '<div class="carousel-caption">';
              echo '<h4>';
                $name = getname($i);
                echo "$name";

              echo '</h4> <p>';
                $content = "description";
                $description = getmovie($name ,$content);
                echo "$description";

              echo '</p> </div> </div>';
            }
          ?>
        </div> 

        <a class="left carousel-control" href="#carousel-343775" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a> 
        <a class="right carousel-control" href="#carousel-343775" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>

   <!--  载入时幻灯片自动开始滚动  -->
      <script type="text/javascript">
        $(document).ready(function(){
          $('.carousel').carousel( {interval: 3500} );
        });

      </script>


<!-- 电影海报信息 -->
      <div class="row">
      <?php 
        for ($i=3; $i<=5; $i++){
        echo '<div class="col-md-4">';
          echo '<div class="thumbnail">';

                $name = getname($i);
                $content = "picture";
                $picture = getmovie($name , $content);
            echo '<img src="image/' , "$picture" , '" style="width: 100%"/>';
            echo '<div class="caption">';
              echo '<h3> <b>';
                echo "$name";

              echo '</b> </h3> <p>';
                $content = "description";
                $description = getmovie($name ,$content);
                echo "$description";

              echo '</p> <p>';
                 echo '<a href="#modal-container-6" name=' , $i , ' role="button" class="btn btn-primary" data-toggle="modal">购票</a> ';
                 echo '<a class="btn" href="movie_details.php">影片详情</a>';
              echo '</p> </div> </div> </div>';
        }
      ?>
      </div>

      <div class="row">
      <?php 
        for ($i=6; $i<=8; $i++){    
        echo '<div class="col-md-4">';
          echo '<div class="thumbnail">';
                
                $name = getname($i);
                $content = "picture";
                $picture = getmovie($name , $content);

           echo '<img src="image/' , "$picture" , '" style="width: 100%"/>';
            echo '<div class="caption">';
              echo '<h3> <b>';
                echo "$name";

              echo '</b> </h3> <p>';
                $content = "description";
                $description = getmovie($name ,$content);
                echo "$description";

              echo '</p> <p>';
                 echo '<a href="#modal-container-6" name=' , $i , ' role="button" class="btn btn-primary" data-toggle="modal">购票</a> ';
                 echo '<a class="btn" href="movie_details.php">影片详情</a>';
              echo '</p> </div> </div> </div>';
        }
      ?>
      </div>


      <!-- 购票功能 + 多次Ajax -->
      <script type="text/javascript">
        $("[href='#modal-container-6']").click(function(){
            //获取当前电影id,Ajax查询得到电影名,学会this的用法！！！！！！！！！！！1
            poster_id = $(this).attr("name");
            loadXMLDoc("control/ajax_getmovie.php?type=id&&poster_id="+poster_id , function(){
              if (xmlhttp.readyState==4 && xmlhttp.status==200){
                // document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                response_name = xmlhttp.responseText;  //全局变量

                   //防止多次生成的名字重叠
                $('#current_name h4[name = "movie_name"]').remove();
                var name_result = '<h4 name="movie_name"><b>'+ response_name + '</b></h4>';
                $('#current_name').append(name_result);
              }
            });

            //获取当前日期,并添加到电影日期
            var d = new Date();
            var date1 = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + d.getDate() ;
            var date2 = d.getFullYear() + '-' + (d.getMonth()+1) + '-' + (d.getDate()+1) ;
            $('#select_date option[name = "temp"]').remove();
            $('#select_date').append('<option value="1" name="temp">' + date1 + '</option>');
            $('#select_date').append('<option value="2" name="temp">' + date2 + '</option>');

            //隐藏除电影日期外部分
            $('#movie_time').hide();
            $('#movie_screen').hide();
            $('#movie_seats').hide();
        });


  //记录座位表的选择次数的全局变量，后面用于判断是否已选座位
        seats_count = 0;

        //绑定日期select_date变化的onchang事件。jquery原live事件被删除，用on事件代替
        $(document).on("change", "#select_date", function(){
            current_date = $('#select_date').val();
            seats_count = 0;

            //值为空时重新隐藏
            if (current_date ==""){
                $('#movie_time').hide();        
                $('#movie_screen').hide();
                $('#movie_seats').hide();
               return ;
            }

            //获取当前电影时间
            $('#movie_time').show();        
            loadXMLDoc("control/ajax_getmovie.php?type=time&&name="+response_name+"&&value="+current_date , function(){
              if (xmlhttp.readyState==4 && xmlhttp.status==200){
                //alert(xmlhttp.responseText);   //debug*************
                var response_time = eval( xmlhttp.responseText );  //eval函数执行json转换

                $('#select_time option[name = "temp"]').remove();  //防止多次select值重叠  
                //根据json返回变量，动态生成场次时间的select
                for (var i = 1; i <= response_time.length; i++) {
                  $('#select_time').append(' <option value="'+ response_time[i-1] +'" name="temp">' + response_time[i-1] + '</option>');
                };
              }
            });
        });

        //绑定select_time的change事件。jquery原live事件被删除，用on事件代替
        $(document).on("change", "#select_time", function(){
            var current_time = $('#select_time').val();
            seats_count = 0;

            if (current_time ==""){
                $('#movie_screen').hide();        
                $('#movie_seats').hide();        
                return ;
            }

            $('#movie_screen').show();        
            $('#movie_seats').show();        
            //获取当前电影场次的座位情况
            loadXMLDoc("control/ajax_getmovie.php?type=seats&&name="+response_name
                       +"&&value1="+current_date+"&&value2="+current_time , function(){
              if (xmlhttp.readyState==4 && xmlhttp.status==200){
               //alert(xmlhttp.responseText);      //debug************
                  response_seats = eval( xmlhttp.responseText );  //eval函数执行json转换

                  $('#select_seats option[name = "temp"]').remove();  //防止多次select值重叠  
                  //修改select2Buttons的js文件，加入#show_buttons，同时改变disable按钮的样式
                  $('#show_buttons').remove();       

                  for (var i = 1; i <= 5; i++) {
                      for (var j = 1; j <= 7; j++) {
                        var code = "( response_seats[i-1].seats"+ i + j + ")" ; 
                        //alert(code);
                        if (eval(code) == "no"){
                          $('#select_seats').append('<option value="'+ i + j + 
                            '"name="temp" disabled>0' + i + '-' + j + '</option>');
                        }
                        else if (eval(code) == "yes"){
                          $('#select_seats').append('<option value="'+ i + j + 
                            '"name="temp">0' + i + '-' + j + '</option>');
                        }
                      }
                  }
                  //调用select2Buttons函数，生成按钮组
                   $('select[name=no-default-select]').select2Buttons({noDefault: true});
              }
            });
        });

        //绑定select_seats的change事件,统计座位按钮被按次数。
        $(document).on("change", "#select_seats", function(){
           seats_count ++;
           //alert( $(this).val() + " " + seats_count);      //debug******************
        });

        //绑定buy_tickets的click事件，判断是否选择了座位。表单提交用原生submit处理
        $(document).on("click", "#buy_tickets", function(){
          //先判断用户是否登录
          //用jQuery的Ajax方法可以大大简化代码！！这个位置用原生的Ajax方法很诡异会出错************
          var logon_test = $.ajax({url:"control/ajax_getmovie.php?type=logon_test",async:false});
          if (logon_test.responseText =="no"){
              alert ("购票失败！请先登录！");
              return false;
          }
          else {            //logon_test.responseText =="yes"
              if ($('#select_date').val()==""){
                  alert("请选择电影日期！");
                  return false;
              }
              else if ($('#select_time').val()==""){
                  alert("请选择电影时间！");
                  return false;
              }
              else if ($('#select_seats').val()==11 && seats_count == 0){
                  alert("请选择电影座位！");
                  return false;
              }
              else {   //ajax发送购票信息，后台处理购票请求
                  var buyticket = $.ajax({
                      type:"post",
                      url:"control/tickets_control.php" , 
                      data: //"movie_name="+response_name+"&&movie_date="+$('#select_date').val()+
                                 //"&&movie_time="+$('#select_time').val()+"&&movie_seat="+$('#select_seats').val() ,
                      {
                         type : "buy",
                         movie_name : response_name,    
                         movie_date : $('#select_date').val() ,    
                         movie_time : $('#select_time').val() ,    
                         movie_seat : $('#select_seats').val() 
                      },    
                      async:false
                  });
                  alert (buyticket.responseText);
              }
          }
          
        });
             
      </script>


      <!--购票页面 -->
      <div class="modal fade" id="modal-container-6" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
          <div class="modal-content" >
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true" style="margin-left: 92%; margin-top: 4%; margin-bottom: -9%;">
            &times;
            </button>
            <p>
              <h1 align ="center"> <font size =7><b>购票页面</b></font></h1>
            </p>
            <div class="col-md-12 column">
              <!-- 数据表单 -->
              <form class="form-horizontal" role="form"  name="tickets" method="post">
                <div class="form-group">
                  <label for="inputText3" class="col-sm-3 control-label">电影名字</label>
                  <div class="col-sm-7" id="current_name">
                        <!-- jQuery动态插入代码 -->
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputText3" class="col-sm-3 control-label">电影日期</label>
                  <div class="col-sm-7">
                    <select style="width:130px" name="movie_date" id="select_date" required>
                      <option></option>
                        <!-- jQuery动态插入代码 -->
                    </select>
                  </div>
                </div>

                <div class="form-group" id="movie_time">
                  <label for="inputText3" class="col-sm-3 control-label">场次时间</label>
                  <div class="col-sm-7">
                    <select style="width:130px" class="combobox" name="movie_time" id="select_time" required>
                      <option></option>
                        <!-- jQuery动态插入代码 -->
                    </select>
                  </div>
                </div>
                <div class="form-group" id="movie_screen">
                  <div class="col-sm-12">
                    <hr>
                    <h1 align ="center"> <font size =5><i><b>电影屏幕</b></i></font></h1>
                  </div>
                </div>
                
                <div class="form-group" id="movie_seats">
                  <label for="inputPassword3" class="col-sm-3 control-label">选座</label>
                  <div class="col-sm-7" style="margin-left: -5px">
                    <select name="no-default-select" id="select_seats" name="movie_seat" required>
                        <!-- jQuery动态插入代码 -->
                    </select>
                    <p>&nbsp;<br> </p>
                        <h5 ><b>&nbsp;&nbsp;(注：
                          <font color="#3c89c8">蓝色</font>为可选座位，
                          <font color="#999"   >灰色</font>为已售座位)</b></h5>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2">
                    <div class="col-sm-offset-1">
                      <div class="col-sm-8" style="margin-left: 10px">
                        <button type="submit" id="buy_tickets" class="btn btn-success btn-block btn-lg">购买</button>
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

<!-- 底部注释栏 -->
      <div class="row clearfix">
        <div class="col-md-12 column" >
          <blockquote style="background-color:#ffffff ">
            <p>
              本网站是一个关于电影信息查询，以及电影票购买的网站。
            </p> <small>开发：陆瀚陶（qq:1312294854）&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<cite>广州大学城中山大学东校区至善园2号604房</cite></small>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    //原有combobox 插件的调用代码
    //$(document).ready(function(){
    // $('.combobox').combobox();
//});

//原有select2Buttons 插件的调用代码
//     $('.standard-demo').select2Buttons();
//     $('select[name=js-callback-select]').change(function() {
//     alert('Changed to ' + $(this).val());
// });
// $('select[name=no-default-select]').select2Buttons({noDefault: true});
</script>

</body>
</html>

<?php 
  //用于登录时密码错误弹框**************************************************************
    if (!isset($_SESSION['alert']) ){
      $_SESSION['alert'] = "";
    }
    else if ($_SESSION['alert'] != ""){
      echo '<script type="text/javascript">alert(" ' , $_SESSION['alert'] , ' ");</script>' ;
      $_SESSION['alert'] = "";
    }
    
?>