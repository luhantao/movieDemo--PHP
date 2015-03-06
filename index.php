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
                 echo '<a href="#modal-container-6" role="button" class="btn btn-primary" data-toggle="modal">购票</a> ';
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
                 echo '<a href="#modal-container-6" role="button" class="btn btn-primary" data-toggle="modal">购票</a> ';
                 echo '<a class="btn" href="movie_details.php">影片详情</a>';
              echo '</p> </div> </div> </div>';
        }
      ?>
      </div>

<!-- 底部注释栏 -->
      <div class="row clearfix">
        <div class="col-md-12 column" >
          <blockquote style="background-color:#ffffff ">
            <p>
              本网站是一个关于电影信息查询，以及电影票购买的网站。
            </p> <small>开发：陆瀚陶&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<cite>广州大学城中山大学东校区至善园2号604房</cite></small>
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
  //用于登录时密码错误弹框**************************************************************
    if (!isset($_SESSION['alert']) ){
      $_SESSION['alert'] = "";
    }
    else if ($_SESSION['alert'] != ""){
      echo '<script type="text/javascript">alert(" ' , $_SESSION['alert'] , ' ");</script>' ;
      $_SESSION['alert'] = "";
    }
    
?>