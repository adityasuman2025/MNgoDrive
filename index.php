<?php
	include_once("php/universal.php");

	if($isSomeOneLogged) //redirecting to the drive page
	{
		header("location: drive.php");
		die();
	}
?>
<html>
<head>
	<title><?php echo $project_title; ?></title>
	<link href="css/index.css" rel="stylesheet"/>
	<link rel="icon" href="img/logo.png" />
	<script type="text/javascript" src="js/jquery.js"> </script>
	<meta name="viewport" content="width=device-width, initial-scale= 1">
</head>

<body>
<!-----main body container----->
<div class="body_container">
	<center>		
		<form class="login_form">
			<img src="img/logo.png" id="login_logo" />
			<h2 id="login_title"><?php echo $project_title; ?></h2>
			
			<input type="text" id="login_username" placeholder="Username">
			<br><br>

			<input type="password" id="login_password" placeholder="Password">
			<br>

			<div class="button-5">
			    <div class="translate"></div>
			    <button class="button_btn">Login</button>
			</div>
		</form>
		<div class="error"></div>
	</center>
</div>
	
<!-------script-------->
	<script type="text/javascript">
	//on clicking on go btn	    
		session_length = "<?php echo $session_time; ?>";
		api_address = "<?php echo $api_address; ?>";		

		$('.button-5').on("click", function(e)
		{
			e.preventDefault();
			
			var login_username = $('#login_username').val().trim();
			var login_password = $('#login_password').val().trim();

			if(login_username != "" && login_password != "")
			{
				$('.error').text("");
				$('.error').html("<img class=\"gif_loader\" src=\"img/loader1.gif\">");

				var post_address = api_address + "verify_user.php";
				$.post(post_address, {login_username: login_username, login_password: login_password}, function(data)
				{
					if(data == -100)
					{
						$('.error').text("Database connection error");
					}
					else if(data == -1)
					{
						$('.error').text("Something went wrong");
					}
					else if(data == 0)
					{
						$('.error').text("Invalid login credentials");
					}					
					else if(data == 1)
					{
						location.href = "drive.php";
					}
					else
					{
						$('.error').text("Unkown error");
					}
				});	
			}
			else
				$('.error').text("Please fill all the fields");
		});
	</script>
</body>
</html>