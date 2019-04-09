<?php
     session_start();
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
    <!-- <link href="assets/theme/css/base.css" rel="stylesheet"> -->
    <!-- <link href="css/highlight.min.css" rel="stylesheet"> -->
    <link href="assets/theme/css/tempusdominus-bootstrap-4.css" rel="stylesheet">
    <script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="js/moment-timezone-with-data-2012-2022.min.js"></script>
    <script src="assets/theme/js/base.js"></script>
    <script src="js/highlight.min.js"></script>
    <script src="assets/theme/js/tempusdominus-bootstrap-4.js"></script>

    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/fency-checkbox.css">

    <!-- <link href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/bootstrap.min.css"> -->
    <!-- <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="css/hoverbuttons.css">    
    <link rel="stylesheet" href="css/Teacher.css">
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

        <div class="subnav">
            <ul>
                <li><a href="./Teacher1.php">时间选择 <span> > </span></a></li>
                <!--li><a href="./">****<span> > </span></a></li>
                <li><a href="./">**** <span> > </span></a></li>
                <li><a href="./">**** <span> > </span></a></li>
                <li><a href="./">**** <span> > </span></a></li>-->
                <li><a href="./fix.html">修改密码 <span> > </span></a></li>
                <li><a href="./login.html">退出 <span> > </span></a></li>
            </ul>
        </div>
        
		<form action="teacher.php" method="post">
		<div class="SearchText">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <!-- 日期选择后里面带有数字的文本框 -->
                                <input type="text" id="choosedate" name="choosedate" class="form-control datetimepicker-input"
                                    data-target="#datetimepicker4" />
                                <!-- 这是实现日期选择的按钮 -->
                                <div class="input-group-append" data-target="#datetimepicker4"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
								
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker4').datetimepicker({
                                format: 'L'
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="TSelect">
            <div class="result">
			<!--form action="test.php" method="post"-->
                <div id="rside">
                    <!-- 复选框 -->
                    <h3>
                        上午
                    </h3>
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <!-- 这是第一个复选按钮，id为sample1 -->
                        <input type="checkbox" id="sample1" name="ttime[]" value="8:00">
                        <label for="sample1">
                            <!-- i中是圆圈样式（大小渐变效果等） -->
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                            S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第一节
                        </label>
                    </div>
                    <!-- 以下同sample1，注意每个复选框id不同 -->
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <input type="checkbox" id="sample2" name="ttime[]" value="9:00">
                        <label for="sample2">
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                                S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第二节
                        </label>
                    </div>
                    <br>
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <input type="checkbox" id="sample3" name="ttime[]" value="10:00">
                        <label for="sample3">
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                                    S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第三节
                        </label>
                    </div>
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <input type="checkbox" id="sample4" name="ttime[]" value="11:00">
                        <label for="sample4">
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                                        S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第四节
                        </label>
                    </div>
                    <h3>
                        下午
                    </h3>
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <input type="checkbox" id="sample5" name="ttime[]" value="14:00">
                        <label for="sample5">
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                                                    S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第五节
                        </label>
                    </div>
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <input type="checkbox" id="sample6" name="ttime[]" value="15:00">
                        <label for="sample6">
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                                                        S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第六节
                        </label>
                    </div>
                    <br>
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <input type="checkbox" id="sample7" name="ttime[]" value="16:00">
                        <label for="sample7">
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                                                            S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第七节
                        </label>
                    </div>
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <input type="checkbox" id="sample8" name="ttime[]" value="17:00">
                        <label for="sample8">
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                                                                S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第八节
                        </label>
                    </div>
                    <h3>
                        晚上
                    </h3>
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <input type="checkbox" id="sample9" name="ttime[]" value="19:00">
                        <label for="sample9">
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                                                                            S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第一节
                        </label>
                    </div>
                    <div class="checkboxWrapper theme2 extraSmallCheckboxSize">
                        <input type="checkbox" id="sample10" name="ttime[]" value="20:00">
                        <label for="sample10">
                            <i>
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px"
                                    height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50"
                                    xml:space="preserve">
                                    <circle fill="none" stroke="#B7B7B7" stroke-width="3" stroke-miterlimit="10"
                                        cx="25.11" cy="24.883" r="23.519" />
                                    <path fill="none" stroke-width="3" stroke-miterlimit="10"
                                        d="M48.659,25c0,12.998-10.537,23.534-23.534,23.534
                                                                                                S1.591,37.998,1.591,25S12.127,1.466,25.125,1.466c9.291,0,17.325,5.384,21.151,13.203L19,36l-9-14" />
                                </svg>
                            </i>
                            第二节
                        </label>
                    </div>
                    <br>
                    <!-- 提交按钮 -->
					<input type="submit" class="hbtn hb-fill-on-rev" value="submit1">
                </div>
            <!--/form-->
			</div>
        </div>
		
		</form>
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