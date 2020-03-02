<?php
	include_once("php/universal.php");

	if(!$isSomeOneLogged) //redirecting to the drive page
	{
		header("location: index.php");
		die();
	}
?>
<html>
<head>
	<title><?php echo $project_title; ?></title>

	<link href="css/bootstrap.min.css" rel="stylesheet"/>
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
<!--------navigation bar---->
	<nav class="navbar navbar-inverse">
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
		<div class="button-5">
		    <div class="translate"></div>
		   	<button class="button_btn">New Folder</button>
		</div>
		<div class="button-5">
		    <div class="translate"></div>
		    <button class="button_btn">Upload File</button>
		</div>

		<img class="gif_loader" src="img/loader1.gif">
	</div>
	
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

	//on clicking on go btn	    
		session_length = "<?php echo $session_time; ?>";
		api_address = "<?php echo $api_address; ?>";		

	</script>
</body>
</html>