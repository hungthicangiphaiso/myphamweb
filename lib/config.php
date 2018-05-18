<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = mysql_connect($host,$user,$pass) or die("Không thể kết nối database!");
	mysql_select_db("giasu",$db)  or die("Không thể select database!");
	mysql_query("SET NAMES utf8");
	define("BASEURL","http://localhost/giasu");
	?>