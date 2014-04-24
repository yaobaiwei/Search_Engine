<?php
header("Content-Type:text/html; charset=UTF-8");
require_once("../sdk/php/lib/XS.php");
$xs = new XS('search_hustonline'); // 建立 XS 对象
$search = $xs->search;
$search->setCharset('UTF-8');
$search->setLimit(100000); 
$total = $search->dbTotal;
echo $total;
$docs = $search->search('华中大');
if($docs)
{
foreach ($docs as $doc)
{
   $subject = $search->highlight($doc->subject); // 高亮处理 subject 字段
   $message = $search->highlight($doc->message); // 高亮处理 message 字段
   echo $doc->rank() . '. ' . $subject . " [" . $doc->percent() . "%] - "."<br>";
   echo $message."<br>".date("Y-m-d", $doc->chrono) .". ".$doc->addr ."<br>";
}
}
?>
