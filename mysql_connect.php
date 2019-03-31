<?php
header("Content-type: text/html;charset=utf-8");
$dbh = new PDO("mysql:host=localhost;dbname=tdb", "root", "lyf@980616");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>