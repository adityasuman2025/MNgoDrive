<?php	
//global variables		
	$project_title = "MNgo Drive";

	$website = $_SERVER['HTTP_HOST']; //dns address of the site 
	if ($website == "localhost") {
		$API_ADDRESS = "http://localhost/MNgo/drive_api/";
		$AUTH_API_ADDRESS = "http://localhost/MNgo/auth_api/";
	} else {
		$API_ADDRESS = "https://mngo.in/drive_api/"; //change this address when deplying somewhere else
		$AUTH_API_ADDRESS = "https://mngo.in/auth_api/";
	}

	$SESSION_TIME = 60*24; //in minutes //1 day

	$isSomeOneLogged = false;
	if(isset($_COOKIE['MNgoDrive_logged_user_token'])) {
		$isSomeOneLogged = true;
	}
?>