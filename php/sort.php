<?php
header("Content-Type:text/html; charset=UTF-8");
    require_once("../sdk/php/lib/XS.php");
    $name=$_REQUEST["name"];
    require_once("$name");
try
{
    $xs = new XS('search_hustonline');
    $doc = new XSDocument('UTF-8');
    $index=$xs->index;
    $num = count($search);
    for($i=0;$i<$num;$i++)
    {
        $data = array(
              'pid'=>$search[$i]["pid"],
              'subject'=>$search[$i]["subject"],
              'message'=>$search[$i]["message"],
              'addr'=>$search[$i]["addr"],
              'chrono'=>$search[$i]["chrono"]
                  );
    $doc->setFields($data);
    $index->add($doc);
   } 
   echo 1;
}
catch (XSException $e)
{
    echo $e;               // 直接输出异常描述
    if (defined('DEBUG'))  // 如果是 DEBUG 模式，则输出堆栈情况
    echo "\n".$e->getTraceAsString() . "\n";
}
?>
