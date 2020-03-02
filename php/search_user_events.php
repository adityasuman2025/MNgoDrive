<?php
	include_once "universal.php";
	include_once "connect_db.php";

	if(isset($_POST['dept_id']) && isset($_POST['search_query']) && isset($_COOKIE['rs_logged_user_id']))
	{		
		$dept_id = $_POST['dept_id'];
		$search_query = $_POST['search_query'];

		$rs_logged_user_id = encrypt_decrypt('decrypt', $_COOKIE['rs_logged_user_id']);

		$query = "";
		if($dept_id == "1" && $search_query == "All") //both dept_id search and query search is empty
		{
			$query = "SELECT * FROM `rs_board_events` WHERE added_by = '$rs_logged_user_id' ORDER BY event_date DESC";
		}
		else if($dept_id == "1" && $search_query != "All") //only dept_id search is empty
		{
			$query = 'SELECT * FROM `rs_board_events` WHERE (event_date LIKE CONCAT("%", "' . $search_query . '", "%") OR event_venue LIKE CONCAT("%", "' . $search_query . '", "%") OR event_title LIKE CONCAT("%", "' . $search_query . '", "%") OR rs_name LIKE CONCAT("%", "' . $search_query . '", "%") OR rs_roll LIKE CONCAT("%", "' . $search_query . '", "%")) AND added_by = "' . $rs_logged_user_id . '" ORDER BY event_date DESC';
		}
		else if($dept_id != "1" && $search_query == "All") //only query search is empty
		{
			$query = "SELECT * FROM `rs_board_events` WHERE rs_dept = '$dept_id' AND added_by = '$rs_logged_user_id' ORDER BY event_date DESC";
		}
		else if($dept_id != "1" && $search_query != "All")  //both dept_id search and query search is not empty
		{
			$query = 'SELECT * FROM `rs_board_events` WHERE (event_date LIKE CONCAT("%", "' . $search_query . '", "%") OR event_venue LIKE CONCAT("%", "' . $search_query . '", "%") OR event_title LIKE CONCAT("%", "' . $search_query . '", "%") OR rs_name LIKE CONCAT("%", "' . $search_query . '", "%") OR rs_roll LIKE CONCAT("%", "' . $search_query . '", "%")) AND rs_dept = "' . $dept_id . '" AND added_by = "' . $rs_logged_user_id . '" ORDER BY event_date DESC';
		}
		
		if($result = @mysqli_query($connect_link ,$query))
		{
		//getting all departments and event_types from cookie
			if(isset($_COOKIE['depts_cookie']) && isset($_COOKIE['event_types_cookie']))
			{
				$depts_array_decrypted = encrypt_decrypt("decrypt", $_COOKIE['depts_cookie']);
				$depts_array = json_decode($depts_array_decrypted, TRUE);

				$event_types_array_decrypted = encrypt_decrypt("decrypt", $_COOKIE['event_types_cookie']);
				$event_types_array = json_decode($event_types_array_decrypted, TRUE);
			}

		//getting result from search query	
			$i = 0;
			$html = "";
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$i++;

				$id = $row['id'];

				$event_type_id = $row['event_type_id'];
				$event_type_name = $event_types_array[$event_type_id];
				
				$event_date = $row['event_date'];
				$event_venue = $row['event_venue'];
				$event_title = $row['event_title'];
				
				$rs_name = $row['rs_name'];
				$rs_roll = $row['rs_roll'];							
				$research_scholar_details = $rs_name . " (" . $rs_roll . ")";

				$rs_dept = $row['rs_dept'];
				$rs_dept_name = $depts_array[$rs_dept];

				$event_pdf_location = trim($row['event_pdf_location']);

			//checking if event date is todays date
				$event_DT = date("Y-m-d", strtotime($event_date));

				$class = "";
				if($today == $event_DT)
				{
					$class = "highlighted_table_row";
				}

			//creating HTML for rendering
				$html = $html . '<tr class="' . $class . '">
					      <th scope="row">' . $i . '</th>
					      <td>' . date("j M Y g:i A", strtotime($event_date)) . '</td>
					      <td>' . $event_type_name . '</td>					      
					      <td>' . $rs_dept_name . '</td>
					      <td>' . $event_venue . '</td>
					      <td>' . substr($event_title, 0, 80) . '</td>
					      <td>' . $research_scholar_details . '</td>
					      <td style="text-align: right;">';
					
			      		if($event_pdf_location != "")
			      		{
					      	$html = $html .'<span class="btn btn-xs btn-default view_btn" location="'. $event_pdf_location . '">
	                            <img src="img/view.png" />
	                        </span>';
			      		}

				$html = $html .'<span class="btn btn-xs btn-default edit_btn" id="' . $id . '">
	                            <img src="img/edit.png" />
	                        </span>
	                        <span class="btn btn-xs btn-default delt_btn" id="' . $id . '">
	                            <img src="img/delete.png" />
	                        </span>
					      </td>
					    </tr>';
			}

			echo $html;
		}
		else
		{
			echo 0;
		}
	}
	else
		echo 0;
?>