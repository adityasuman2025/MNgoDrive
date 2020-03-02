<?php
	include_once 'connect_db.php';

	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
		
		$query = "DELETE FROM `rs_board_events` WHERE id = '$id'";
		
		if(@mysqli_query($connect_link ,$query))
			echo 1;
		else
			echo -1;
	}
	else
		echo 0;
?>