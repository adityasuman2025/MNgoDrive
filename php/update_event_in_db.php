<?php
	include_once 'universal.php';
	include_once "connect_db.php";

	if(isset($_POST["id"]) && isset($_POST["event_type_id"]) && isset($_POST["event_date"]) && isset($_POST["event_time"]) && isset($_POST["event_venue"]) && isset($_POST["event_title"]) && isset($_POST["rs_name"]) && isset($_POST["rs_roll"]) && isset($_POST["rs_dept"]) && isset($_COOKIE['rs_logged_user_id']))
	{
	//getting variable values from POST request
		$id = $_POST["id"];

		$rs_logged_user_id = encrypt_decrypt('decrypt', $_COOKIE['rs_logged_user_id']);

		$event_type_id = trim(mysqli_real_escape_string($connect_link, $_POST['event_type_id']));
		
		$event_date = trim(mysqli_real_escape_string($connect_link, $_POST['event_date']));
		$event_time = trim(mysqli_real_escape_string($connect_link, $_POST['event_time']));
		$combined_date_time = $event_date . " " . $event_time;

		$event_venue = trim(mysqli_real_escape_string($connect_link, $_POST['event_venue']));		
		$event_title = trim(mysqli_real_escape_string($connect_link, $_POST['event_title']));	
		$rs_name = trim(mysqli_real_escape_string($connect_link, $_POST['rs_name']));
		$rs_roll = trim(mysqli_real_escape_string($connect_link, $_POST['rs_roll']));	
		$rs_dept = trim(mysqli_real_escape_string($connect_link, $_POST['rs_dept']));

	//original query	
		$query2 = "UPDATE `rs_board_events` SET event_type_id = '$event_type_id', event_date = '$combined_date_time', event_venue = '$event_venue', event_title = '$event_title', rs_name = '$rs_name', rs_roll = '$rs_roll', rs_dept = '$rs_dept', updated_on = CURRENT_TIMESTAMP, updated_by = '$rs_logged_user_id' WHERE id = '$id'";	

	//updating notice data in database		
		if(@mysqli_query($connect_link ,$query2))		
		{
			echo 1;
		}
		else
			echo 0;
	}
	else
	{
		echo -1;
	}
?>