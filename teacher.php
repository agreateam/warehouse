<?php
//获取教师选择的时间
	session_start();
	$un=$_SESSION["un"];
	if(empty($_POST))
	{
		require("./Teacher1.php");//没有输入
	}
	else
	{
		//有选择的时候
		require("./link.php");//连接数据库
		$num=count($_POST['ttime']);
		$date=$_POST['choosedate'];//选择的日期
		//echo($num);
		for($i=0;$i<$num;$i++)
		{
			$column=$_POST['ttime'][$i];//修改的时间
			$change="INSERT INTO `t_schedule1`(`t_id`,`t_name`,`t_date`,`t_time`) VALUES (3,'$un','$date','$column')";
			$res=mysqli_query($link,$change);
			if(!$res) 
			{ 
				echo "<script language=\"JavaScript\">\r\n";
				echo " alert(\"提交失败\");\r\n";
				echo " history.back();\r\n";
				echo "</script>";
				
			} 
			else { 
				 
				echo "<script language=\"JavaScript\">\r\n";
				echo " alert(\"修改成功\");\r\n";
				//echo "window.location();\r\n";
				//header('Location: Teacher1.html');
				echo " history.back();\r\n";
				echo "</script>";
				
				
			}
		}
		//var_dump($_POST['ttime']);
		//echo($_POST['choosedate']);
		//require("./Teacher1.html");
	}
?>