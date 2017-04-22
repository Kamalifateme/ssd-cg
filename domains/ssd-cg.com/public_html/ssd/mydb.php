<?php
$host="localhost";
$user="root";
$password="";
$dbname="ussdc531_ssd";
$link=@mysql_connect($host,$user,$password);
if (!$link) die('Can\'t establish a connection to the database: ' . mysql_error());  
$db_select=mysql_select_db($dbname);
$path="http://localhost/ssd-cg/domains/ssd-cg.com/public_html/ssd/";
?>