<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>预约系统登录</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="JS/bootstrap.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/register.css">
    <link rel="shoutcut icon" href="favicon.ico" />
</head>

<body>

        <div class="logo" id="logo" style="margin-top:10%">
            <h3>哈尔滨工业大学（威海）校园预约系统</h3>

        </div>
<form name="login" method="post" style="text-align:center;">         
        <div class="container">
            <div class="row">
                <div class="col-4 offset-4" style="margin-top: 10%">
                    <!-- 老师学生选择 choice=student/teacher -->
                    <input type="radio" name="choice" value="student" style="margin-left:50px">学生
                    <input type="radio"
                        name="choice" value="teacher" style="margin-left:150px;margin-top: 10px">教师
                        <!-- 姓名输入提示字 -->
                    <input type="text" name="name" class="form-control" placeholder="number">
                    <!-- 密码输入提示字 -->
                    <input type="password" name="password" class="form-control" placeholder="password">
                    <br>
                    <!-- 登陆按钮 login -->
                    <input type="submit" name="submit" class="btn btn-primary form-control" value="login" >
                    <br>
                    <br>
                    <input type="reset" class="btn btn-primary form-control" value="重置">
                    <small style="margin-left:240px">没有账号？<a href="./register.html">去注册</a></small>
                </div>
            </div>
        </div>
</form>   

    <?php
        
        if(isset($_POST["submit"]))
        {
            include("mysql_connect.php");
            $s=$_POST["choice"];
            $usr=$_POST["name"];
            $pwd=$_POST["password"];
            if($s['0']=='s')//选择学生
            {
                $cusr=$dbh->query("select s_id from s_info where s_id='$usr';");
                $cpwd=$dbh->query("select s_id from s_info where s_id='$usr' and s_key='$pwd';");
                $peo="select s_name from s_info where s_id='$usr' and s_key='$pwd'";
                $row1=$cusr->fetch(PDO::FETCH_BOTH);
                $row2=$cpwd->fetch(PDO::FETCH_BOTH);
                $result=$dbh->prepare($peo);
                
                if(empty($row1[0]))
                        {
                            $dbh=null;
                ?>
                <script>
                            alert ("用户名不存在");
                            login.onreset();
                </script>
                <?php       
                        }
                        else if(empty($row2[0]))
                        {
                            $dbh=null;
                ?>
                <script>
                            alert ("用户名或密码错误");
                            login.onreset();
                </script>
                <?php
                        }
                        else
                        {
                            $dbh=null;
                ?>
                <script>
                    
                    alert("欢迎! <?php  if ($result->execute()){while ($row = $result->fetch()){echo $row['s_name'];}}?>");
                    window.location.href="index2.html";
                </script>
<?php
                }
            }
            else//选择老师
            {
                $cusr1=$dbh->query("select t_id from t_info where t_id='$usr';");
                $cpwd1=$dbh->query("select t_id from t_info where t_id='$usr' and t_key='$pwd';");
                $peo1="select t_name from t_info where t_id='$usr'";
                $row11=$cusr1->fetch(PDO::FETCH_BOTH);
                $row22=$cpwd1->fetch(PDO::FETCH_BOTH);
                $result1=$dbh->prepare($peo1);
                if(empty($row11[0]))
                        {
                            $dbh=null;
                ?>
                <script>
                            alert ("用户名不存在");
                            login.onreset();
                </script>
                <?php       
                        }
                        else if(empty($row22[0]))
                        {
                            $dbh=null;
                ?>
                <script>
                            alert ("用户名或密码错误");
                            login.onreset();
                </script>
                <?php
                        }
                        else
                        {
                            $dbh=null;
                            echo "ok";
                ?>
               <script>     
                    alert("欢迎 !<?php  if ($result1->execute()){while ($row1= $result1->fetch()){echo $row1['t_name'];}}?>");
                    window.location.href="Teacher1.html";
                </script>
<?php
                }
                ?>
                <?php
            }
        }
?>

</body>
</html>