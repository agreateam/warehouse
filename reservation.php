<?php
//获取学生选择的时间
	session_start();
	require("./link.php");
	$tname=$_GET['t_name'];
	$tdate=$_GET['t_date'];
	$ttime=$_GET['t_time'];
	$tsdept=$_GET['t_sdept'];
	$uid=$_SESSION["uid"];//从登录页传送过来的学生id变量！！！！！
	$un=$_SESSION["un"];
	/*echo($tname);
	echo($tdate);*/
	//echo($uid);
	require("./link.php");
	$change_t="INSERT INTO `s_appointment`(`s_id`, `s_name`, `s_course`, `s_tname`, `s_time`, `s_date`) VALUES ('$uid','$un','$tsdept','$tname','$ttime','$tdate')";
	$res1=mysqli_query($link,$change_t);
	//修改学生表,未修改完！
	$change_s="delete from t_schedule1 where t_name='$tname' and t_date='$tdate' and t_time='$ttime'";
	//修改老师表
	$res2=mysqli_query($link,$change_s);
	if(!($res1||$res2)) 
			{ 
				echo "<script language=\"JavaScript\">\r\n";
				echo " alert(\"预约失败\");\r\n";
				echo " history.back();\r\n";
				echo "</script>";
				//exit; 
			} 
			else { 
				 
				echo "<script language=\"JavaScript\">\r\n";
				echo " alert(\"预约成功\");\r\n";
				echo " history.back();\r\n";
				//header('location.replace(location.back.href);');
				//echo "window.location.href = 'index2.php'";
				//header('refresh:3; url=index2.html');
				//header('Location: index2.php');
				echo "</script>";
				exit; 
			}
?>