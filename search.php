<?php
	session_start();
	error_reporting(E_ALL ^ E_NOTICE);
//header("Content-type:text/html;charset=utf-8");
//print_r($_POST);
if(empty($_POST))//检查输入是否为空
{
	require("./index2.php");
	//屏蔽掉不推荐
}
else
{
	$in=$_POST['inputname'];//搜索框输入的姓名
	//echo($in);
	require("./link.php");
	$search="select t_info.t_name,t_schedule1.t_date,t_schedule1.t_time,t_info.t_sdept from t_schedule1,t_info where t_schedule1.t_id=t_info.t_id and t_schedule1.t_name='$in'";
	//$in是字符串，要加''!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$res=mysqli_query($link,$search);
	$data = array(); 
	while($row = mysqli_fetch_assoc($res)) //按行读取的
	{ $data[] = $row; } 
	include('./index2.php');
	//print_r($data);

}
?>