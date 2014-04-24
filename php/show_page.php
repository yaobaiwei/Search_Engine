<?php
     session_start();
header("Content-Type:text/html; charset=UTF-8");
require '../sdk/php/lib/XS.php';
$value=$_REQUEST["value"];
if(isset($_SESSION['way']))
{
   $way=$_SESSION['way'];
}
else {
	$way="fuzzy";
}
if(isset($_SESSION['page1']))
{
   $page1=(int)$_SESSION['page1'];
}
else {
	$page1=10;
}
try
{
$xs = new XS('search_hustonline');
$search = $xs->search;
$search->setLimit(1000);
$search->setCharset('UTF-8');
$search->setCollapse('subject' ,2);
if($way=="fuzzy")
{
	$docs = $search->setFuzzy()->search("$value");
}
elseif($way=="exact"){
	$docs = $search->search("$value");
}
elseif($way=="title"){
	$what="subject:".$value;
	$docs = $search->search("$what");
}
elseif($way=="body"){
	$what="message:".$value;
	$docs = $search->search("$what");
}
else{
  $docs = $search->search("$value");
}
$count = count($docs);
$_SESSION['count']=$count;
echo $count;
echo "|".$page1;
}
catch (XSException $e)
{
    echo $e;               // 直接输出异常描述
    if (defined('DEBUG'))  // 如果是 DEBUG 模式，则输出堆栈情况
        echo "\n".$e->getTraceAsString() . "\n";
}
?>
