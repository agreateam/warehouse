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
            <form name="fix" method="post" style="text-align:center;"> <!--html表单用提交动作控制login按钮-->   
                <div class="container">
                    <div class="row">
                        <div class="col-4 offset-4" style="margin-top: 10%">
                            <!-- 教师学生选择 -->
                            <input type="radio" name="choice" value="student" checked style="margin-left:50px">学生
                            <input type="radio" name="choice" value="teacher" style="margin-left:150px;margin-top: 10px">教师
                               <br>
                                <lable>
                                    输入学号
                                </lable>
                            
                            <!-- 输入学号 -->
                            <input type="text" name=sid id="number" class="form-control" placeholder="number">
                            <lable>
                                输入旧密码
                            </lable>
                            <!-- 输入密码 -->
                            <input type="password" name=pwdo id="password" class="form-control" placeholder="password">
                            <lable>
                                输入新密码
                            </lable>
                            <!-- 确认密码 -->
                            <input type="password" name=pwdn id="password" class="form-control" placeholder="new password">
                            <br>
                            <!-- 修改密码按钮 -->
                            <input type="submit" name="submit" id="修改密码" class="btn btn-primary form-control" value="修改密码">
                           
                        </div>
                    </div>
        
                </div>
      </header>
            </form> 

        <?php
        
            if(isset($_POST["submit"]))
            {   
                include("mysqlconnect.php");
                $s=$_POST["choice"];
                $usrid=$_POST["sid"];
                $pwd1=$_POST["pwdo"];
                $pwd2=$_POST["pwdn"];
                //echo $s,$usrid,$pwd1,$pwd2;
                $flag=true;
                if($usrid==null)//输入空学号
                {
                    $flag=false;
        ?>
                    <script>
                    alert("请注意：学号不能为空！");
                    </script>
        <?php            
                }
                else if($pwd1==null || $pwd2==null)//输入空密码
                {
                    $flag=false;
        ?>
                    <script>
                    alert("请注意：密码不能为空！");
                    </script>
        <?php            
                }
                else if($pwd1==$pwd2)//新旧密码相同
                {
                    $flag=false;
        ?>            
                    <script>
                    alert("两次输入的密码不能相同！请检查后重新输入！");
                    </script> 
        <?php            
                }
                if($flag==true)
                {
                    if($s['0']=='s')//选择学生
                    {
                        $s_id=$dbh->query("select s_id from s_info where s_id='$usrid';");
                        $row1=$s_id->fetch(PDO::FETCH_BOTH);//row1[0]存储通过输入的学号查询到的学号（若学号不存在，为null；否则为学号值）
                        $s_pwd=$dbh->query("select s_key from s_info where s_id='$usrid';");
                        $row2=$s_pwd->fetch(PDO::FETCH_BOTH);//row2[0]存储通过输入的学号查询到的密码（若学号不存在，为null；否则为密码值）
                        if($row1[0]==null)//输入不存在的学号
                        {
                            $dbh=null;
    ?>
                            <script>
                                alert("请输入正确的学号！");
                                location.href = './fix.php';
                            </script>
    <?php
                        }
                        else //学号输入正确，且输入的新旧密码不同
                        {
                            if($row2[0]==$pwd1)//输入了正确的旧密码，更改密码
                            {
                                try
                                {
                                    $con1=$dbh->query("update s_info set s_key='$pwd2' where s_id='$row1[0]'");
    ?>
                                    <script>
                                        $dbh=null;
                                        alert("修改密码成功，请尝试重新登陆！");
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
                            else//旧密码错误，输出提醒
                            {
    ?>
                                <script>
                                   alert("密码错误！请检查后重新输入！");
                                </script>   
    <?php
                            }
                        }
                        
                    }
                    else if($s['0']=='t')//选择老师
                    {
                        $t_id=$dbh->query("select t_id from t_info where t_id='$usrid';");
                        $row3=$t_id->fetch(PDO::FETCH_BOTH);//row3[0]存储通过输入的教师工号查询到的工号（若工号不存在，为null；否则为工号值）
                        $t_pwd=$dbh->query("select t_key from t_info where t_id='$usrid';");
                        $row4=$t_pwd->fetch(PDO::FETCH_BOTH);//row4[0]存储通过输入的教师工号查询到的密码（若工号不存在，为null；否则为密码值）
                        //echo $row3[0],$row4[0];
                        if($row3[0]==null)//输入不存在的工号
                        {
                            $dbh=null;
    ?>
                            <script>
                                alert("请输入正确的工号！");
                                location.href = './fix.php';
                            </script>
    <?php
                        }
                        else //工号输入正确，且输入的新旧密码不同
                        {
                            if($row4['0']==$pwd1)//输入了正确的旧密码，更改密码
                            {
                                try
                                {
                                    $con2=$dbh->query("update t_info set t_key='$pwd2' where t_id='$row3[0]'");
    ?>
                                    <script>
                                        $dbh=null;
                                        alert("修改密码成功，请尝试重新登陆！");
                                        location.href = './login.php';
                                    </script>
    <?php
                                    }
                                    catch (Exception $err1)
                                    {
                                        echo $err1->getMessage();
                                        $dbh=null;
                                    }
                            }
                            else//旧密码错误，输出提醒
                            {
    ?>
                                <script>
                                   alert("密码错误！请检查后重新输入！");
                                </script>   
    <?php
                            }
                        }


                    }
                }
                else//flag=false,不满足条件，刷新修改密码窗口
                {
    ?>              <script>location.href = './fix.php';</script>
    <?php   }
            }
    ?>






</body>
</html>