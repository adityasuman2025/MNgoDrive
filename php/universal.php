<?php	
//global variables		
	$session_time = 60*24; //in minutes //1 day
	$project_title = "MNgo Drive";
	$today = (date('Y-m-d'));
	
	$website = $_SERVER['HTTP_HOST']; //dns address of the site 
	if($website == "localhost")
	{	
		$api_address = "http://localhost/MNgo/drive_api/";		
	}
	else
	{
		$api_address = ""; //change this address when deplying somewhere else
	}	

	$isSomeOneLogged = false;
	if(isset($_COOKIE['MNgoDrive_logged_user_id']))
	{
		$isSomeOneLogged = true;
	}
?>