<?php
header("Content-Type:text/html; charset=UTF-8");
$link=mysql_connect("localhost","root","111111") or die("不能链接到数据库".mysql_error());
$db_selected = mysql_select_db("hustonline",$link);
mysql_query("set names utf8");
?>
