<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
require '../sdk/php/lib/XS.php';
$value=$_REQUEST["value"];
$page_num=$_REQUEST["page_num"];

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
$search->setLimit($page1, ($page1*($page_num-1)));
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
$count = $_SESSION['count'];
$total = $search->dbTotal;
 echo  $count."^,^".$total."^,^".$page1."^;^"; 
foreach ($docs as $doc)
{
   $subject = $search->highlight($doc->subject); // 高亮处理 subject 字段
   $message = $search->highlight($doc->message); // 高亮处理 message 字段
   echo $doc->rank().'.'.$subject . '^,^';
   echo $message.'^,^';
   echo ($doc->addr).'^,^';
   echo date("Y-m-d", $doc->chrono) ."^,^"." [" . $doc->percent() . "%] "."^;^";
}
echo "^|^";
 $words = $search->getRelatedQuery("$value", 6);
 if (count($words)!= 0)
{
echo "6"."^;^";
 foreach($words as $word)
 {
      echo $word."^,^";
}
}
else{
    echo "0"."^;^";
     echo "暂未找到相关搜索！";
}
echo "^|^";
$corrected = $search->getCorrectedQuery("$value");
if (count($corrected) != 0)
{
    echo  count($corrected)."^;^";
   foreach ($corrected as $word)
   {
      echo $word."^,^";
   }
}
else{
    echo "0"."^;^";
     echo "暂未找到相关建议关键词！";
}
}
catch (XSException $e)
{
    echo $e;               // 直接输出异常描述
    if (defined('DEBUG'))  // 如果是 DEBUG 模式，则输出堆栈情况
        echo "\n".$e->getTraceAsString() . "\n";
}
?>
