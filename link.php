<?php
//连接数据库
$link = mysqli_connect('localhost','','root','test');
$res = mysqli_query($link,'set name utf8');

?>