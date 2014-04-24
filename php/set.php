<?php
header("Content-Type:text/html; charset=UTF-8");
try{
     session_start();
     $way=$_REQUEST["way"];
     $page1=$_REQUEST["page1"];
     $_SESSION['way']=$way;
     $_SESSION['page1']=$page1;
     echo 1;
}
catch(Exception $e){
	echo $e->getMessage();
}
     
?>