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
	<link href="css/style.css" rel="stylesheet"/>
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
<!----follow me----->
	<div class="content_container">
		<h2>follow me</h2>
		<div class="content">
			<ul>				
				<li>facebook: <a href="https://www.facebook.com/adityasuman2025" target="_blank">https://www.facebook.com/adityasuman2025</a></li>
				<li>quora: <a href="https://www.quora.com/profile/Aditya-Suman-15" target="_blank">https://www.quora.com/profile/Aditya-Suman-15</a></li>	
			</ul>	
		</div>
	</div>
	<br><br>
</div>
	
<!-------script-------->
	<script type="text/javascript">
		
	</script>
</body>
</html>
