<?php
	include_once 'universal.php';
	include_once 'connect_db.php';

	if(isset($_COOKIE['rs_logged_user_id']))
	{
		$rs_logged_user_id = encrypt_decrypt('decrypt', $_COOKIE['rs_logged_user_id']);

		$query = "SELECT * FROM `rs_board_events` WHERE added_by = '$rs_logged_user_id' ORDER BY event_date DESC";
		
		$all_notices_array;	
		if($result = mysqli_query($connect_link ,$query))	
		{
			$all_notices_array = array();
			while ($row = mysqli_fetch_assoc($result)) 
			{
				array_push($all_notices_array, $row);			
			}		
		}
	}
?>