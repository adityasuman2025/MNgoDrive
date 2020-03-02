<?php
	include_once 'universal.php';
	include_once "connect_db.php";

	if(isset($_POST["selected_server"]) && isset($_POST["user_login"]) && isset($_POST["user_password"]))
	{
		$mailhost = $_POST["selected_server"];
		$passwd   = $_POST["user_password"];
		
	//accepting full or short email both
		$user     = $_POST["user_login"];
		if(contains("@iitp.ac.in", $user))
		{
			$user = str_replace("@iitp.ac.in", "", $user);
		}			
		
		if($website == "localhost")
			$pop = true; // comment this while deploying
		else
			$pop = imap_open('{' . $mailhost . '}', $user, $passwd); //remove comment while deploying project		

		if ($pop == false) //email id not found in official iit patna's database
		{
			echo -1;
		} 
		else 
		{
			if($website == "localhost")
			{}
			else
				imap_close($pop); // un-comment this	
			
		//setting up cookie	
			setcookie('rs_logged_user_id', encrypt_decrypt('encrypt', $user), time()+($session_time*60), "/");
			
			echo 1;
		}
	}
	else
	{
		echo 0;
	}

	function contains($needle, $haystack)
	{
	    return strpos($haystack, $needle) !== false;
	}
?>