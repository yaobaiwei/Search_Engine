<?php 
session_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("insert.class.php");
require_once("geturl.php");
require_once("Snoopy.class.php");
$snoopy= new Snoopy;
$insert=new insert();
for($i = 0,$j=0; $i < (int)($_SESSION["num"]/3); $i++)
{
                $j++;
                $strSource_children = file_get_contents($_SESSION["#"."$j"]);
                if(isset($strSource_children))
                {
                     $p='/<title>(.*)<\/title>/i';
                     $regex='/<meta.+?charset=[\'"]?([-\w]+)[\'"]?/i';
                     preg_match($p, $strSource_children,$str_childrenResult);
                     preg_match($regex, $strSource_children,$str_charsetResult);
                     if(count($str_charsetResult)>=2)
                     {
                        $title=$str_childrenResult[1];
                     }
                     if(count($str_charsetResult)>=2)
                     {
                         $charset=$str_charsetResult[1];
                         echo $_SESSION["#"."$j"]."<br>";
                         if(strtolower($charset)!="utf-8")
                        {
                            $content = iconv("GBK", "UTF-8", $title);
                             echo $content."<br>";
                             $snoopy->fetchtext($_SESSION["#"."$j"]);
                             $snoopy->results = iconv("GBK", "UTF-8//IGNORE", $snoopy->results);
                             print_r($snoopy->results);
                          }  
                        else{
                               echo $title."<br>";
                               $snoopy->fetchtext($_SESSION["#"."$j"]);
                               print_r($snoopy->results);
                            }
                        $time=time();
                        echo "<br>"."---------------------------------------------------------------------------------------";
                     }
                 }
     echo "<br>";
     $insert->insertall($j,$title,$_SESSION["#"."$j"],$snoopy->results,$time);
} 
?>