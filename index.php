<!-------counter & ip tracking-------->
<?php
	$ip = $_SERVER["REMOTE_ADDR"];
	date_default_timezone_set('Asia/Kolkata');
	$time = date ("H:i:s", time());
	$date = date ("d M Y", time());

	$handleip =fopen('ip.txt', 'a');
	$handlecnt= fopen('count.txt', 'r');
	$currentcnt= fread($handlecnt, 1342177);
	fwrite($handleip, "$currentcnt :---> \t \t $ip  \t \t Time :--> \t $time \t \t Date:--> \t $date \n");

	$newcnt= $currentcnt + 1;
	$handlecnt= fopen('count.txt', 'w');
	fwrite($handlecnt, $newcnt);	
?>

<!-------counter & ip tracking-------->
<html>
<head>
	<title>MNgo Drive</title>
	<link href="css/index.css" rel="stylesheet"/>
	<link rel="icon" href="img/logo.png" />
	<script type="text/javascript" src="js/jquery.js"> </script>
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
<!-----main body container----->
<div class="body_container">
	<center>		
		<form class="login_form">
			<img src="img/logo.png" id="login_logo" />
			<h2 id="login_title">MNgo Drive</h2>
			
			<input type="text" id="login_username" placeholder="Username">
			<br><br>

			<input type="password" id="login_password" placeholder="Password">
			<br>

			<div id="button-5">
			    <div id="translate"></div>
			    <button style="background: none; border: none;" href="#">Login</button>
			</div>
		</form>
		<div class="error"></div>		
	</center>
</div>
	
<!-------script-------->
	<script type="text/javascript">
		$('#button-5').on("click", function(e)
		{
			e.preventDefault();
			
			var login_username = $('#login_username').val().trim();
			var login_password = $('#login_password').val().trim();

			if(login_username != "" && login_password != "")
			{
				$('.error').text("");
				$('.error').html("<img class=\"gif_loader\" src=\"img/loader1.gif\">");

				$.post('php/verify_user.php', {login_username: login_username, login_password: login_password}, function(data)
				{
					if(data == 0)
					{
						$('#error1').text("Please fill all the fields");
					}
					else if(data == -1)
					{
						$('#error1').text("Invalid email or password");	
					}				
					else if(data == 1)
					{
						location.href = "results.php";
					}
					else
					{
						$('#error1').text("Unknown error");	
					}
				});	
			}
			else
				$('.error').text("Please fill all the fields");
					
			console.log(login_username);
			console.log(login_password);
		});
	</script>
</body>
</html>
