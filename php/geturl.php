<?php 
session_start();
header("Content-Type:text/html; charset=UTF-8");
$strSource = file_get_contents("http://www.hustonline.net/");
preg_match_all('/<a.*?(?: |\\t|\\r|\\n)?href=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>(.+?)<\/a.*?>/sim', $strSource, $strResult, PREG_PATTERN_ORDER);
for($i = 0,$j=0; $i < count($strResult[1]); $i++)
{
    $j++;
    if($strResult[1][$i]=="#")
    {
        $j--;
        continue;
     }
    else{
           $mark = strchr($strResult[1][$i],"#");
            if($mark!=false)
            {
                $addr="http://www.hustonline.net/".$strResult[1][$i];
            }
           else{
                $addr=$strResult[1][$i];
            }
               if(($addr!=("http://info.hustonline.net/softnew/index.aspx"))&&($addr!=("http://ik.hustonline.net/index/search?w=%E4%BF%9D%E7%A0%94"))&&($addr!=("http://focus.hustonline.net/zhuanti/xiaoshi/")))
               {
                   $_SESSION["#"."$j"]=$addr;
              }
           else{
                  $j--;
               }
      }
      $_SESSION["num"]=$j;
} 
?>