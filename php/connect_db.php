<?php
	date_default_timezone_set('Asia/Kolkata');
	$now = date('Y-m-d H:i:s');

	$website = $_SERVER['HTTP_HOST']; //dns address of the site 

//iit patna server	
	if($website == "localhost")
	{
		$mysql_host = "172.16.26.43";
		$mysql_username  = "root";
		$mysql_password  = "qr@admin";
		$mysql_db = "Mess";
	}
	else
	{
		$mysql_host = "localhost";
		$mysql_username  = "root";
		$mysql_password  = "qr@admin";
		$mysql_db = "Mess";
	}	
	
	$connect_link = @mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_db);
	if(!$connect_link)
	{
		die("Database connection failed");
	}
?>