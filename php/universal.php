<?php	
//global variables		
	$project_title = "MNgo Drive";
	$today = (date('Y-m-d'));

	$website = $_SERVER['HTTP_HOST']; //dns address of the site 
	if ($website == "localhost") {
		$API_ADDRESS = "http://localhost/MNgo/drive_api/";
	} else {
		$API_ADDRESS = "https://mngo.in/drive_api/"; //change this address when deplying somewhere else
	}

	$SESSION_TIME = 60*24; //in minutes //1 day
	$AUTH_API_ADDRESS = "https://mngo.in/auth_api/";

	$isSomeOneLogged = false;
	if(isset($_COOKIE['MNgoDrive_logged_user_token'])) {
		$isSomeOneLogged = true;
	}
?>