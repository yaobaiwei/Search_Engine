<?php
header("Content-Type:text/html; charset=UTF-8");
require_once("../sdk/php/lib/XS.php");
try
{
    $xs = new XS('search_hustonline');
    $doc = new XSDocument('UTF-8');
    $index=$xs->index;
    $index->clean();
    echo 1;
}
catch (XSException $e)
{
    echo $e;               // 直接输出异常描述
    if (defined('DEBUG'))  // 如果是 DEBUG 模式，则输出堆栈情况
        echo "\n".$e->getTraceAsString() . "\n";
}
?>