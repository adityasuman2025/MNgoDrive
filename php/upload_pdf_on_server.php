<?php
	include_once "universal.php"; 

	if(isset($_COOKIE['rs_roll']) && isset($_COOKIE['event_date']) && isset($_COOKIE['event_type']))
	{
	//getting cookies
		$rs_roll = encrypt_decrypt('decrypt', $_COOKIE['rs_roll']);
		$event_date_str = encrypt_decrypt('decrypt', $_COOKIE['event_date']);
		$event_type = encrypt_decrypt('decrypt', $_COOKIE['event_type']);

	//getting year from the notice_date	
		$event_date = strtotime($event_date_str);
		$iprOfYear = date('Y',$event_date);

		if($rs_roll != "" && $iprOfYear !="" && $event_type !="")
		{
		//removing special symbol from name of the file to be uploaded	
			$find = array("$", ",", "`", "~", ">", "<", "'", "\"","]","[","]","{","}","=","+",")", "(", "^", "!", "/","-", "@", "#","%","&", ".", "*",";", ":", "|", " ", "?", "\\");
			$rs_roll = str_replace($find, "_", $rs_roll);

			$find = array("$", ",", "`", "~", ">", "<", "'", "\"","]","[","]","{","}","=","+",")", "(", "^", "!", "/","-", "@", "#","%","&", ".", "*",";", ":", "|", " ", "?", "\\");
			$event_type = str_replace($find, "_", $event_type);

		//getting folder where the file is to be uploaded	
			$file_id = "file";

			$dir_to_upload_this_file = "pdf/" . $iprOfYear . "/" . $event_type;
			$dir_to_upload = $project_address . "../" . $dir_to_upload_this_file;

		//creating the required folder if folder is not present	
			$fold_status = 0;	
			if (!file_exists($dir_to_upload)) 
			{				
				$oldmask = umask(0); //for giving all permission to the folder
			    if(mkdir($dir_to_upload, 0777, true))
			    {
			    	umask($oldmask);
			    	$fold_status = 1;
			    	// echo "folder created";
			    }
			    else
			    {
			    	// echo "fail to create folder";
			    }
			}
			else
			{
				// echo "folder already exist";
				$fold_status = 1;
			}

		//trying to upload	
			if($fold_status == 1)//folder where file is to uploaded exists
			{
				//Ref.No.IITP/Acad/2018/Notice/SA-01
				if($_FILES[$file_id]["name"] != '')
				{
				//getting name of the file								
					$file_extension = strtolower( substr( strrchr($_FILES[$file_id]['name'], '.') ,1) ); //extension name of the file
					
					//$timestamps = time();

					$new_name = strtolower($rs_roll) . "_" . $iprOfYear . "_" . $event_type . "." . $file_extension; 
					$upload_location = $dir_to_upload ."/". $new_name;
					
				//uploading file 	
					if(move_uploaded_file($_FILES[$file_id]['tmp_name'], $upload_location))
						echo $dir_to_upload_this_file ."/". $new_name;
					else
						echo 0;
				}	
				else
				{
					echo 0; //file uploading failed
				}		
			}
			else
			{
				echo -2; //file uploading directory not present in server
			}
		}
		else
		{
			echo -1;
			//array_push($errors, "Something went wrong");
		}	
	}
	else
	{
		echo -1;
		//array_push($errors, "Something went wrong");
	}
?>

