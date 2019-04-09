<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户注册</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <script src="JS/bootstrap.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/register.css">
    <link rel="shoutcut icon" href="favicon.ico" />
</head>
<body>
        <header>
                <div class="logo" id="logo" style="margin-top:10%">
                    <h3>哈尔滨工业大学（威海）校园预约系统</h3>
        
                </div>
                <form name="login" method="post" style="text-align:center;"> <!--html表单用提交动作控制login按钮-->                
                <div class="container">
                    <div class="row">
                        <div class="col-4 offset-4" style="margin-top: 10%">
                            <!-- 教师学生选择 -->
                            <input type="radio" name="choice" value="student" checked style="margin-left:50px">学生
                            <input type="radio" name="choice" value="teacher" style="margin-left:150px;margin-top: 10px">教师
                            <!-- 输入姓名 -->
                            <input type="text" name=sname id="name" class="form-control" placeholder="name">
                            <!-- 输入学号 -->
                            <input type="text" name=sid id="sid" class="form-control" placeholder="id">
                            <!-- 输入院系 -->
                            <input type="text" name="sdept" id=sdept class="form-control" placeholder="please input your department">
                            <!-- 输入联系方式 -->
                            <input type="text" name=stel id="tel" class="form-control" placeholder="telephone number">
                            <!-- 输入密码 -->
                            <input type="password" name=pwd1 id="password" class="form-control" placeholder="please input your password">
                            <!-- 确认密码 -->
                            <input type="password" name=pwd2 id="password" class="form-control" placeholder="please check out your password">
                            <br>
                            <!-- 注册按钮 -->
                            <input type="submit" name="submit" id="注册" class="btn btn-primary form-control" value="注册">
                            <small style="margin-left:240px">已有账号？<a href="./login.php">去登录</a></small>
                        </div>
                    </div>
        
                </div>
            </header>
        </form> 
        <?php
        
        if(isset($_POST["submit"]))
        {   
            include("mysql_connect.php");
            $s=$_POST["choice"];
            $usrn=$_POST["sname"];
            $usrid=$_POST["sid"];
            $sdept=$_POST["sdept"];
            $stel=$_POST["stel"];
            $pwd1=$_POST["pwd1"];
            $pwd2=$_POST["pwd2"];
            //echo $s,$usrn,$usrid,$sdept,$stel,$pwd1,$pwd2;
            //echo "test1";//ok
            $flag=true;
            if($usrn==null)
            {
                $flag=false;
                echo "请注意：姓名不能为空！";
                echo "<br>";
            }
            else if($usrid==null)
            {
                $flag=false;
                echo "请注意：学号不能为空！";
                echo "<br>";
            }
            else if($sdept==null)
            {
                $flag=false;
                echo "请注意：院系不能为空！";
                echo "<br>";
            }
            else if($stel==null)
            {
                $flag=false;
                echo "请注意：联系方式不能为空！";
                echo "<br>";
            }
            else if($pwd1==null || $pwd2==null)
            {
                $flag=false;
                echo "请注意：密码不能为空！";
                echo "<br>";
            }
            else
            {
                if($pwd1==$pwd2)
                {
                    //echo "test2";
                    if($s['0']=='s')//选择学生
                    {
                        $s_id=$dbh->query("select s_id from s_info where s_id='$usrid';");
                        $row1=$s_id->fetch(PDO::FETCH_BOTH);
                        //echo "ok";
                        if($row1[0]==$usrid)//学号已存在，提示登陆
                        {
                            //echo "不ok";
                            $dbh=null;
         ?>
                            <script>
                            alert("请注意：学号已存在，请直接登陆！");
                            location.href = './login.php';
                            </script>
         <?php                   
                        }
                        else//输入的学号不存在于已有数据库
                        {
                            try//插入数据库
                            {
                                //echo "mysqltest";
                                $con1=$dbh->query("insert into s_info(s_id,s_name,s_sdept,s_key,s_tel) values('$usrid','$usrn','$sdept','$pwd1','$stel')");
         ?>
                            <script>
                                $dbh=null;
                                alert("注册成功，请尝试登陆！");
                                location.href = './login.php';
                            </script>
        <?php
                            }
                            catch (Exception $err)
                            {
                                echo $err->getMessage();
                                $dbh=null;
                            }
                            
                        }

                    }
                    else//选择老师
                    {
                        $t_id=$dbh->query("select t_id from t_info where t_id='$usrid';");
                        $row1=$t_id->fetch(PDO::FETCH_BOTH);
                        if($row1[0]==$usrid)//该号码已存在，提示登陆
                        {
                            //echo "不ok";
                            $dbh=null;
         ?>
                            <script>
                            alert("请注意：工号已存在，请直接登陆！");
                            location.href = './login.php';
                            </script>
         <?php                   
                        }
                        else//输入的工号不存在于已有数据库
                        {
                            try//插入数据库
                            {
                                //echo "mysqltest";
                                $con2=$dbh->query("insert into t_info(t_id,t_name,t_sdept,t_tel,t_key) values('$usrid','$usrn','$sdept','$stel','$pwd1')");
         ?>
                            <script>
                                $dbh=null;
                                alert("注册成功，请尝试登陆！");
                                location.href = './login.php';
                            </script>
        <?php
                            }
                            catch (Exception $err)
                            {
                                echo $err->getMessage();
                                $dbh=null;
                            }
                        }
                    }
                }
            }
        }
        ?>


</body>
</html>