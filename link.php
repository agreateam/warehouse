<?php
//连接数据库
$link = mysqli_connect('localhost','root','','tdb');//返回通道标识link
//$res = mysqli_query($link,'set name utf8');//设置字符集
mysqli_query($link,'set names utf8');
mysqli_query($link,'set character utf8');//!!!!!!!!!!!!!!!!!要加两句！！！！！！！！！
error_reporting(E_ALL ^ E_NOTICE);//屏蔽掉不推荐
//if($res)
	//{mysqli_error();}
?>