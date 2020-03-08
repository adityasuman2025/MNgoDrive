<?php
	include_once("php/universal.php");

	if(!$isSomeOneLogged) //redirecting to the login page
	{
		header("location: index.php");
		die();
	}

	$logged_user_id = $_COOKIE['MNgoDrive_logged_user_id'];
?>
<html>
<head>
	<title><?php echo $project_title; ?></title>

	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/index.css" rel="stylesheet"/>
	<link rel="icon" href="img/logo.png" />
	<script type="text/javascript" src="js/jquery.js"> </script>
	<script type="text/javascript" src="js/jquery.redirect.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale= 1">
	<meta charset="utf-8">
	<meta name="description" content="MNgo | Works in Software Development, Android App Development, Web Development, Graphics Designing | Founder: Aditya Suman">
	<meta name="google-site-verification" content="tmpTIfxUJCSXkF8NKNgLWkRBtFpKisiSJOipCBQT8DA" />
	<meta name="keywords" content="Aditya Suman, IIT, IIT Patna, app, android, android studio, app development, web development, website web application, graphics, programming, coding, coder, programmer, software, developer, software developer, development, enginner, software engineering, software">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
	<meta name="revisit-after" content="1">
	<meta name="author" content="Aditya Suman">
</head>

<body>
<!--------navigation bar---->
	<nav class="navbar navbar-inverse header_nav">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      	<a class="navbar-brand" >
	      		<div class="row">		      	
	      			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 x_m-p header_bar_title">
	      				<img src="img/logo.png" />
	      				<!-- Indian Institute Of Technology Patna -->
	      				<?php echo $project_title; ?>
	      			</div>
	      		</div>
			</a>
	    </div>
	   		
	    <ul class="nav navbar-nav navbar-right">
	    	<li class="active">
	    		<a id="logout_btn" class="log_btn" style="background-color: red;">Logout</a>
	    	</li>
	    </ul>	
	  </div>
	</nav>

<!-----main body container----->
	<div class="row drive_container">		
		<img class="gif_loader" src="img/loader1.gif">
	</div>

<!-------add file/folder btn area---->
	<div class="add_btns">
		<div class="button-5" id="make_new_folder_btn">
		    <div class="translate"></div>
		   	<button class="button_btn">New Folder</button>
		</div>
		<div class="button-5" id="upload_file_btn">
		    <div class="translate"></div>
		    <button class="button_btn">Upload File</button>
		</div>
	</div>

<!--------overlay modal--------->
	<div class="overlay_backgrnd"></div>
	<div class="overlay_div">
		<div class="close_overlay_btn"></div>
		<br />
		<div class="overlay_content">dsf</div>
	</div>

<!--new folder create modal--------->
	<div id="make_folder_sample">
		<input type="text" id="create_folder_text_input" placeholder="Folder Name" />
		<br />
		<div class="button-5" id="create_folder_btn">
		    <div class="translate"></div>
		   	<button class="button_btn">Create Folder</button>
		</div>
		<div class="error"></div>
	</div>

<!--new file upload modal--------->
	<div id="upload_file_sample">
		<input type="file" name="file" id="file">
		<br />
		<div class="error"></div>
	</div>

<!------custom context menu----------->
	<ul class='custom-menu'>
		<li data-action = "first">First thing</li>
		<li data-action = "second">Second thing</li>
		<li data-action = "third">Third thing</li>
	</ul>

<!-------script-------->
	<script type="text/javascript">
		session_length = "<?php echo $session_time; ?>";
		api_address = "<?php echo $api_address; ?>";		

		logged_user_id = "<?php echo $logged_user_id; ?>";
		folder_id = "0";

	//function to show custom context menu
		document.addEventListener('contextmenu', event => event.preventDefault()); //removing default context menu

		function showCustomContext(folder_class)
		{
		// Trigger action when the contexmenu is about to be shown
			$('.' + folder_class).bind("contextmenu", function (event) {
			    
			    // Avoid the real one
			    event.preventDefault();
			    
			    // Show contextmenu
			    $(".custom-menu").finish().toggle(100).
			    
			    // In the right position (the mouse)
			    css({
			        top: event.pageY + "px",
			        left: event.pageX + "px"
			    });
			});

		// If the document is clicked somewhere
			$(document).bind("mousedown", function (e) {
			    
			    // If the clicked element is not the menu
			    if (!$(e.target).parents(".custom-menu").length > 0) {
			        
			        // Hide it
			        $(".custom-menu").hide(100);
			    }
			});

		// If the menu element is clicked
			$(".custom-menu li").click(function(){
			    
			    // This is the triggered action name
			    switch($(this).attr("data-action")) {
			        
			        // A case for each action. Your actions here
			        case "first": alert("first"); break;
			        case "second": alert("second"); break;
			        case "third": alert("third"); break;
			    }
			  
			    // Hide it AFTER the action was triggered
			    $(".custom-menu").hide(100);
			});
		}

	//on clicking on logout btn
		$('#logout_btn').on('click', function()
		{
			$.post('php/logout.php', {}, function(data)
			{
				location.href = "index.php";
			});
		});

	//on clicking on close btn
		$('.close_overlay_btn, .overlay_backgrnd').on("click", function()
		{
			$('.overlay_backgrnd').fadeOut(200);
			$('.overlay_div').fadeOut(200);
		});

	//on clicking on new folder btn	
		$('#make_new_folder_btn').on("click", function()
		{
		//displaying the overlay div and its content	
			$('.overlay_backgrnd').fadeIn(400);
			$('.overlay_div').fadeIn(400);

			var html = $('#make_folder_sample').html();
			$('.overlay_content').html(html);

		//on clicking on create folder btn
			$('#create_folder_btn').on("click", function()
			{
				$('.error').text("");
				$('.error').html("<img class=\"gif_loader\" src=\"img/loader1.gif\">");

				var logged_user_id = "<?php echo $logged_user_id; ?>";
				var new_folder_name = $('#create_folder_text_input').val().trim();
				
				var post_address = api_address + "create_new_folder.php";
				$.post(post_address, {logged_user_id: logged_user_id, new_folder_name: new_folder_name}, function(data)
				{				
					if(data == -100)
					{
						$('.error').text("Database connection error");
					}
					else if(data == -1)
					{
						$('.error').text("Something went wrong");
					}
					else if(data == -2)
					{
						$('.error').text("This folder name already exists");
					}
					else if(data == 0)
					{
						$('.error').text("Fail to create new folder");
					}
					else if(data == 1) //new folder created successfully
					{						
					 	location.reload();
					}
					else
					{
						$('.error').text("Unknown error");
					}
				});
			});	
		});

	//on clicking on upload file btn
		$('#upload_file_btn').on("click", function()
		{
		//displaying the overlay div and its content	
			$('.overlay_backgrnd').fadeIn(400);
			$('.overlay_div').fadeIn(400);

			var html = $('#upload_file_sample').html();
			$('.overlay_content').html(html);

		//for uploading file			
			var post_address = api_address + "upload_file_on_server.php";
		    $(document).on('change', '#file', function()
		    {
		      	$('.error').html("<img class=\"gif_loader\" src=\"img/loader1.gif\">");

	      	//sending upload request to api 
		        var property = document.getElementById("file").files[0];
		        var image_name = property.name;
		        var image_extension = image_name.split('.').pop().toLowerCase();
		        
		        var form_data = new FormData();
				form_data.append("file", property);
				form_data.append("logged_user_id", logged_user_id);
				form_data.append("folder_id", folder_id);
				$.ajax(
				{
					url: post_address,
					method: "POST",
					data: form_data,
					contentType: false,
					cache: false,
					processData: false,
					beforeSend:function()
					{
						$('.error').html("<img class=\"gif_loader\" src=\"img/loader1.gif\" /></br>Uploading File").css('color', '#f1f1f1');
					},
					success: function(data)
					{		
						// console.log(data);
						if(data == 0)
						{
							$('.error').text('Failed to upload file').css("color", 'red');
						}
						else if(data == -2)
						{
							$('.error').text("file uploading directory not present on server").css("color", 'red');
						}
						else if(data == -1)
						{
							$('.error').text("Something went wrong").css("color", 'red');
						}
						else if(data == 1)
						{
							location.reload();
						}
						else
							$('.error').text("Unknown error").css("color", 'red');
					}
				});
		    });
		});

	//getting root folder and file of that user
		var post_address = api_address + "get_user_root_file_folder.php";
		$.post(post_address, {logged_user_id: logged_user_id}, function(data)
		{
			if(data == -100)
			{
				$('.error').text("Database connection error");
			}
			else if(data == -1)
			{
				$('.error').text("Something went wrong");
			}
			else
			{
				var html = "";

				var resultArray = $.parseJSON(data);				
				for(var index in resultArray) 
				{
					var tempHTML = "";

					var name = (resultArray[index]['name']);
					var type = resultArray[index]['type'];

					if(type == "folder")
					{
						name = name.substring(0, 18);

						var icon_name = "folder";
						var folder_id = resultArray[index]['folder_id'];

						tempHTML += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 x_m-p file_folder_container" type="' + type + '" folder_id="' + folder_id + '"><img src="img/' + icon_name + '.png" /><div class="name_text">' + name + '</div></div>';
					}
					else if(type == "file")
					{
						var icon_name = "file";
						var file_address = resultArray[index]['file_address'];

						var name_extension = name.split('.').pop().toLowerCase();
						var only_name = name.split('.').slice(0, -1).join('.')
						only_name = only_name.substring(0, 13);

						var display_name = only_name + "." + name_extension;

						tempHTML += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 x_m-p file_folder_container" type="' + type + '" file_address="' + file_address + '"><img src="img/' + icon_name + '.png" /><div class="name_text">' + display_name + '</div></div>';
					}

					html += tempHTML;
				}

			//rendering the root folder/file contents and displaying custom context menu
				$('.drive_container').html(html);
				showCustomContext('file_folder_container');

			//on clicking on any file/folder
				$('.file_folder_container').on("click", function()
				{
					var type = $(this).attr("type");
					if(type == "file") //opening the file new tab
					{
						var file_address = $(this).attr("file_address");

						$.redirect(file_address,
				        {
				        }, "POST", "_blank");
					}
					else //displaying the content of the folder
					{
						var folder_id = $(this).attr("folder_id");		
						$.redirect("folder.php",
				        {
				        	folder_id: folder_id
				        }, "POST");
					}
				});
			}
		});	
	</script>
</body>
</html>