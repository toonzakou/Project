<?php

$host = "localhost" ; 
$username = "root" ; 
$password = "0841446192" ; 
$db = "test_project" ;  
$conn = mysql_connect($host,$username,$password) ;
mysql_select_db($db) ;
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

?>
