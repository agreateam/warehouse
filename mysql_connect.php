<?php
header("Content-type: text/html;charset=utf-8");
$dbh = new PDO("mysql:host=localhost;dbname=tdb", "root", "");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->query("SET NAMES utf8"); // $_pdo->exec('SET NAMES utf8'); //设置数据库编码，两种方法都可以
return $dbh;

?>