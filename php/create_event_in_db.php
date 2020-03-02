<?php
	include_once 'universal.php';
	include_once "connect_db.php";

	if($website != "localhost")
	{
		require_once '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
		require_once '/usr/share/php/libphp-phpmailer/class.smtp.php';
	}

	if(isset($_POST["event_type_id"]) && isset($_POST["event_date"]) && isset($_POST["event_time"]) && isset($_POST["event_venue"]) && isset($_POST["event_title"]) && isset($_POST["rs_name"]) && isset($_POST["rs_roll"]) && isset($_POST["rs_dept"]) && isset($_POST["notice_pdf_location"]) && isset($_COOKIE['rs_logged_user_id']))
	{
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

		$readable_date = date("j M Y", strtotime($event_date));
		$readable_time = date("g:i A", strtotime($event_time));

		$event_pdf_location = trim(mysqli_real_escape_string($connect_link, $_POST['notice_pdf_location']));

	//getting array elements from object	
		$query2 = "INSERT INTO `rs_board_events` (`event_type_id`, `event_date`, `event_venue`, `event_title`, `rs_name`, `rs_roll`, `rs_dept`, `event_pdf_location`, `added_by`) VALUES ('$event_type_id', '$combined_date_time', '$event_venue', '$event_title', '$rs_name', '$rs_roll', '$rs_dept', '$event_pdf_location', '$rs_logged_user_id')";		

	//inserting all rows of the IPR form
		if(@mysqli_query($connect_link ,$query2))
		{
			if($website != "localhost")
			{
			//sending mail
				$mail = new PHPMailer;
				$message = "Title: $event_title\nDate: $readable_date\nTime: $readable_time\nVenue: $event_venue";
				
				$email = $email_to;

				$mail->setFrom('no-reply@iitp.ac.in');//no-reply@cse.iitp.ac.in
				$mail->addAddress($email);
				$mail->Subject = 'EE Head';
				$mail->Body = $message; //event title
				
				$mail->IsSMTP();
				// $mail->isHTML(true);
				$mail->SMTPSecure = '';
				$mail->Host = '172.16.1.2'; //'ssl://smtp.gmail.com'; :995/pop3/ssl/novalidate-cert
				$mail->SMTPAuth = false;
				$mail->Port =25;

				if(!$mail->send())
		        {
		        	echo 1;
		        }
		        else
		        {
		          	echo 1;
		        }
			}
			else
			{
				echo 1;
			}		
		}
		else
			echo 0;
	}
	else
	{
		echo -1;
	}
?>