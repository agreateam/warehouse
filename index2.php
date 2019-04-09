<?php
     session_start();
	 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>预约系统</title>
    <link href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://getbootstrap.com/assets/css/docs.min.css" />
	<link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/highlight.min.css" rel="stylesheet"> 
	<link href="assets/theme/css/tempusdominus-bootstrap-4.css" rel="stylesheet">
	<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="js/moment-timezone-with-data-2012-2022.min.js"></script>
    <!-- <link href="assets/theme/css/base.css" rel="stylesheet"> -->
	<script src="assets/theme/js/base.js"></script>
	<script src="js/highlight.min.js"></script> 
    <script src="assets/theme/js/tempusdominus-bootstrap-4.js"></script>
    
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="JS/bootstrap.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/index.css">
</head>

<body>
<?php
   if(empty($_SESSION["uid"]))//如果从登录页获取用户id失败
   {
?>     
       <script>
       alert("未获得登陆人信息");
       //window.location.href="login.php";
       </script>
<?php    
       exit;
   }
   //id获取成功
   $uid=$_SESSION["uid"];//从登录页传送过来的学生id变量！！！！！
   $un=$_SESSION["un"];
   //include("mysql_connect.php");
  // $sn=$dbh->Query("select s_name from s_info where s_id='{$uid}'");
   //$row=$sn->fetch(PDO::FETCH_BOTH);
   //$sname=$row[0];
   //echo "欢迎登陆：{$sname}";
   
?>
    <header>
        <div class="logo">
            <img src="image/hit.jpg" style="width: 100px;height: 100px;">
        </div>
        <div class="title">
            <t>哈尔滨工业大学(威海）校园预约</t>
        </div>
        <div id="time">

        </div>
        <div class="person">
        <label>欢迎</label>
            <!--登陆人显示有问题-->
        <div id="na">
                <script>
               
                var sname="<?php echo $un ?>";
                document.getElementById("na").innerHTML =sname;
                </script>
        </div>

        </div>
    </header>
    <div class="banner">
        <!-- 左边功能表格 -->
        <div class="subnav">
            <ul>
                <li><a href="./index2.php">教师查询 <span> > </span></a></li>
                <li><a href="./indexDate.html">日期查询<span> > </span></a></li>
                <li><a href="./indexCourse.html">课程查询 <span> > </span></a></li>
                <li><a href="./indexCancel.html">预约记录 <span> > </span></a></li>
                <li><a href="./indexCancelHis.html">违约记录 <span> > </span></a></li>
				<li><a href="./fix.php">修改密码<span> > </span></a></li>
                <li><a href="./login.php">退出 <span> > </span></a></li>
            </ul>
        </div>
        <div class="SearchText">
            <div class="search">
			<form method="post" action="search.php"> 
                <!-- 教师姓名搜索框 -->
                <input type="text"  name="inputname" placeholder="请输入教师姓名"><button ></button>
			</form>
            </div>
        </div>
        <div class="TSelect">
            <!-- 搜索结果表格 -->
            <div class="result">
                <div id="rside">
                    <table>
                        <!-- 第一行 -->
                        <tr>
                            <td>姓名</td>
                            <td>课程</td>
							<td>日期</td>
                            <td>时间</td>
                            <td>预约</td>
                        </tr>
                        <!-- 第二行 -->
                        <tr><?php foreach($data as $d){?>
                            <td><?php echo $d['t_name'];?></td>
                            <td><span class="badge"><?php echo $d['t_sdept'];?></span>
							</td>
                            <td><span class="badge"><?php echo $d['t_date'];?></span>
							</td>
							<td><span class="badge"><?php echo $d['t_time'];?></span>
							</td>
                            <td><a href="reservation.php?t_name=<?php echo $d['t_name']?>&t_sdept=<?php echo $d['t_sdept']?>&t_date=<?php echo $d['t_date']?>&t_time=<?php echo $d['t_time'];?>">预约</a></td>
                        </tr>
					<?php }?>	
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function CurentTime() {
            var now = new Date();

            var year = now.getFullYear();       //年
            var month = now.getMonth() + 1;     //月
            var day = now.getDate();            //日

            var hh = now.getHours();            //时
            var mm = now.getMinutes();          //分
            var ss = now.getSeconds();           //秒

            var clock = year + "-";

            if (month < 10)
                clock += "0";

            clock += month + "-";

            if (day < 10)
                clock += "0";

            clock += day + " ";

            if (hh < 10)
                clock += "0";

            clock += hh + ":";
            if (mm < 10) clock += '0';
            clock += mm + ":";

            if (ss < 10) clock += '0';
            clock += ss;
            document.getElementById('time').innerHTML = clock;
            
        }

        window.setInterval("CurentTime()", 1000);

    </script>
</body>
</html>