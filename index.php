<?php
	include_once("php/universal.php");

	if($isSomeOneLogged) {
		//redirecting to the drive page
		header("location: drive.php");
		die();
	}
?>
<html>
<head>
	<title><?php echo $project_title; ?></title>

	<link href="css/index.css" rel="stylesheet"/>
	<link rel="icon" href="img/logo.png" />
	<script type="text/javascript" src="js/jquery.js" ></script>
	<script type="text/javascript" src="js/cookie.js" ></script>

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
		const SESSION_TIME = "<?php echo $SESSION_TIME; ?>";
		const AUTH_API_ADDRESS = "<?php echo $AUTH_API_ADDRESS; ?>";

	//on clicking on login btn
		$('.button-5').on("click", function(e) {
			e.preventDefault();
			
			var login_username = $('#login_username').val().trim();
			var login_password = $('#login_password').val().trim();

			if(login_username != "" && login_password != "") {
				$('.error').text("");
				$('.error').html("<img class=\"gif_loader\" src=\"img/loader1.gif\">");

				var post_address = AUTH_API_ADDRESS + "verify_user.php";
				$.ajax({
					type: "POST",
					url: post_address,
					contentType: "application/json",
					dataType: "json",
					data: JSON.stringify({
						username: login_username,
						password: login_password
					}),
					success: function(response) {
						if (response.statusCode === 200) {
							if(response.token) {
								const token = response.token;
								setCookie('MNgoDrive_logged_user_token', token, SESSION_TIME);
								location.href = "drive.php";
							} else {
								$('.error').text("Something went wrong");
							}
						} else {
							$('.error').text(response.msg);
						}
					},
					error: function(response) {
						$('.error').text("Something went wrong");
					}
				});
			} else {
				$('.error').text("Please fill all the fields");
			}
		});
	</script>
</body>
</html>