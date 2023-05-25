<?php

$sname = "localhost";
$uname = "admin";
$password = "admin";

$db_name = "bbsub";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) 
{
	echo "Connection failed!";
	exit();
}



