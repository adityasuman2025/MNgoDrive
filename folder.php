<?php
	include_once("php/universal.php");

	if(!$isSomeOneLogged) //redirecting to the login page
	{
		header("location: index.php");
		die();
	}
	else //if someone is logged
	{
		$logged_user_id = $_COOKIE['MNgoDrive_logged_user_id'];

		if(isset($_POST['folder_id']))
			$folder_id = $_POST['folder_id'];
		else
			die("Something is wrong");
	}
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
		<div class="button-5">
		    <div class="translate"></div>
		   	<button class="button_btn">New Folder</button>
		</div>
		<div class="button-5">
		    <div class="translate"></div>
		    <button class="button_btn">Upload File</button>
		</div>
	</div>

<ul class='custom-menu'>
  <li data-action = "first">First thing</li>
  <li data-action = "second">Second thing</li>
  <li data-action = "third">Third thing</li>
</ul>

<!-------script-------->
	<script type="text/javascript">
	//function to handle cookies  
	    function setCookie(name,value,mins) 
	    {
	       	var now = new Date();
	        var time = now.getTime();
	        var expireTime = time + 60000 * mins;
	        now.setTime(expireTime);
	        var tempExp = 'Wed, 31 Oct 2012 08:50:17 GMT';

	      document.cookie =  name + "=" + value + ";expires=" + now.toGMTString() + ";path=/";
	    }

	    function getCookie(name) {
	        var nameEQ = name + "=";
	        var ca = document.cookie.split(';');
	        for(var i=0;i < ca.length;i++) {
	            var c = ca[i];
	            while (c.charAt(0)==' ') c = c.substring(1,c.length);
	            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	        }
	        return null;
	    }

	    function eraseCookie(name) 
	    {
	    	var now = new Date(); 
	        document.cookie = name + '=; expires=' + now.toGMTString() + ";path=/";
	    }

	//functiom to show custom context menu
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

	//getting root folder and file of that user
		session_length = "<?php echo $session_time; ?>";
		api_address = "<?php echo $api_address; ?>";		

		var logged_user_id = "<?php echo $logged_user_id; ?>";
		var folder_id = "<?php echo $folder_id; ?>";

		var post_address = api_address + "get_user_folder_contents.php";
		$.post(post_address, {logged_user_id: logged_user_id, folder_id: folder_id}, function(data)
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

					var name = (resultArray[index]['name']).substring(0, 18);
					var type = resultArray[index]['type'];
					
					if(type == "folder")
					{
						var icon_name = "folder";
						var folder_id = resultArray[index]['folder_id'];

						tempHTML += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 x_m-p file_folder_container" type="' + type + '" folder_id="' + folder_id + '"><img src="img/' + icon_name + '.png" /><div class="name_text">' + name + '</div></div>';
					}
					else if(type == "file")
					{
						var icon_name = "file";
						var file_address = resultArray[index]['file_address'];

						tempHTML += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 x_m-p file_folder_container" type="' + type + '" file_address="' + file_address + '"><img src="img/' + icon_name + '.png" /><div class="name_text">' + name + '</div></div>';
					}

					html += tempHTML;
				}

			//rendering the root folder/file contents and displaying custom context menu
				$('.drive_container').html(html);
				showCustomContext('file_folder_container');

			//on clicking on file/folder
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