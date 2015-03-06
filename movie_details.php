<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Theme Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <style type ="text/css">
    .pic{
        background-image:url(image/back3.jpg);
        background-attachment: fixed ;
        background-repeat: repeat ;
    }
    </style>
</head>
<!-- style="background-image:url(image/back2.jpg) ;background-repeat: no-repeat ;background-attachment: fixed " -->
<body class="pic" role="document" > 
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<p><font size="6">&nbps</font></p>


			<div class="row clearfix">
				<!-- 左边电影巨幕海报-->
				<div class="col-md-6 column" style ="height:100% ;">
					<div class="col-md-10 column" style ="margin-left:50px ; margin-top: 17px ; width:90% ;">
						<div class="thumbnail">
							<img alt="300x200" src="image/bbbb.jpg" style="width: 100%"/>
							<div class="caption">				
								<p>
									
									<p align="center"><font size="6"><b>￥69</b></font></p>
							
									<a href="#"><button type="button" class="btn btn-default btn-block btn-primary"><font size="6"> 购买</font></button></a>
								
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 column" style ="height:100% ;">
					<p>
						<p><font size="6" color="#0000FF"><b>影片名：</b></font><font size="6">星际穿越</font></p>
					</p>
					<p>
						<p><font size="6" color="#0000FF"><b>导演：</b></font><font size="6">需小心</font></p>
					</p>
					<p>
						<p><font size="6" color="#0000FF"><b>主演：</b></font><font size="6">徐晓欣</font></p>
					</p>
					<p>
						<p><font size="6" color="#0000FF"><b>放映时段：</b></font><font size="6">9:00、12:00、15:00</font></p>
					</p>
					<p>
						<p><font size="6" color="#0000FF"><b>时长：</b></font><font size="6">110分钟</font></p>
					</p>
					<p>
						<p><font size="6" color="#0000FF"><b>简介：</b></font><font size="6">66666666666666666</font></p>
					</p>

					<embed src ="image/xingjichuanyue.swf" style="width: 100% ; height:45.7%" >
					
			<!--		<embed src="image/image/xingjichuanyue.swf" wmode="transparent" width="350" align="center" border="1" height="200"> 
-->
				
				</div>
			</div>
			
			 <!-- ****************************包含顶栏php文件 ************* -->     
			<?php
        		include_once("topbar.php");
      		?> 
      		
		</div>
	</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>