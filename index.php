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
	<title>Aditya Suman</title>
	<link href="css/style.css" rel="stylesheet"/>
	<link rel="icon" href="img/logo.png" />
	<script type="text/javascript" src="js/jquery.js"> </script>
	<meta name="viewport" content="width=device-width, initial-scale= 1">

	<meta charset="utf-8">
	<meta name="description" content="Aditya Suman | Software Developer | Ex-Intern at ISRO, Oxyvin, NGCN, CatchFreeDeal | B.Tech, IIT Patna">
	<meta name="google-site-verification" content="tmpTIfxUJCSXkF8NKNgLWkRBtFpKisiSJOipCBQT8DA" />
	<meta name="keywords" content="Aditya Suman, IIT, IIT Patna, software, developer, software developer, app development, web development, web, web application, website, android app, android, app, android studio, website, graphics, programming, coding, coder, programmer, development, enginner, software engineering, software ">
	<meta name="robots" content="index, follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="English">
	<meta name="revisit-after" content="1">
	<meta name="author" content="Aditya Suman">
</head>

<body>
<!---------preloader area------->
	<div class="preloader_container"></div>
	<script type="text/javascript">
		$('.preloader_container').load('preloader.php');
	</script>

<!-----main body container----->
<div class="body_container">
	<br>
	<a class="primary_button" target="_blank" href="CampusResume.pdf">Download Campus Resume</a>
	<a class="primary_button" target="_blank" href="OffCampusResume.pdf">Download Off-Campus Resume</a>

	<br><br>
<!----about me----->
	<div class="content_container">
		<h2>about me</h2>
		<div class="content">
			I'm a programmer and a computer geek. 
			<br>
			I have professional skill in Android App & Web Application Development and Database Administration. 
			<br>
			I have experience of internships at <b>ISRO - Bangalore, Oxyvin Technologies - Bangalore, NGCN Infosolutions - Suratkal, CatchFreeDeal - Noida</b>.
			<br>
			Other than programming I also enjoy reading novels, listening songs, graphics designing and nature photography. 
		</div>
	</div>
	<br><br>

<!----contact me----->
	<div class="content_container">
		<h2>contact me</h2>
		<div class="content">			
			<b>Homepage: </b><a href="#"> http://adityasuman.mngo.in</a>
 			<br>
 			<b>Address: </b><a href=""> Room No. A-629, A-Block Boys Hostel, IIT Patna, Bihta, Patna, Bihar – 801103 </a>
 			<br>
 			<b>Email: </b><a href="mailto:aditya.me16@iitp.ac.in">aditya.me16@iitp.ac.in</a>, 		
 			<a href="mailto:adityasuman2025@gmail.com">adityasuman2025@gmail.com</a>
 			<br>
 			<b>Phone: </b><a href="tel:+917424947945">+91-7424947945</a>,
 			<a href="tel:+918789619252">+91-8789619252</a>
 			<br>
 			<b>LinkedIn: </b> <a target="_blank" href="https://www.linkedin.com/in/adityasuman2025">https://www.linkedin.com/in/adityasuman2025</a>
 			<br>
 			<b>GitHub: </b> <a target="_blank" href="https://github.com/adityasuman2025">https://github.com/adityasuman2025</a>
		</div>
	</div>
	<br><br>

<!----education----->
	<div class="content_container">
		<h2>education</h2>
		<div class="content">
			<ul>
				<li>Bachelor Of Technology, <b>Indian Institute of Technology Patna (IIT P),</b> CPI- 7.18/10 (2016 - Present) </li>
				<!-- <li>Senior Secondary Schooling, <b>Magadh University</b> – 70.4% (2014 - 2016) </li>
				<li> Secondary Schooling, CBSE, <b>R.P.S Public School, Bihar Sharif,</b> CGPA- 10/10 (2013 - 2014)</li> -->
			</ul>		
		</div>
	</div>
	<br><br>

<!----work experience----->
	<div class="content_container">
		<h2>internship experience</h2>
		<div class="content">
			<ul>	
				<li>
					<div class="job_title">Engineering Intern <div class="float_right">May 2019 – July 2019</div></div>
					<a href="https://www.istrac.gov.in/" target="_blank" class="title_a">ISRO Telemetry, Tracking and Command Network (ISTRAC), Bangalore</a>
					<ul>
						<li>Worked in <b>SDG Laboratory</b> (Software Development Group) of ISTRAC to develop a Android App & Web Interface for monitoring and controlling of MEOSAR.</li>
						<li>Created a <b>Web-Socket Client</b> in <b>Java</b> and <b>Web-Socket Client</b> in <b>JavaScript</b> to connect Mobile App & Web App respectively to the <b>Web-Socket Server</b> built on <b>Python</b>.</li>
						<li>Extracted the <b>JSON</b> coming from <b>Web-Socket Server</b> in human readable and interacting interface.</li>
						<li>Divided the software into 3 common modules, Schedule, Equipment & Map Module for Web-Interface & Mobile App and 1 extra Web-Socket Service Module only for the App.</li>
						<li>Implemented <b>Service</b> in Android to keep <b>Web-Socket Client</b> always running in background in the app even when the app is minimized or closed to get push notification, required for equipment status details and new beacon alert.</li>
						<li>Created <b>MySQL database</b> to store login credentials for the Mobile App & built its <b>REST API</b> in <b>PHP</b>.</li>
						<li><b>Technologies:</b> Android Studio, Java, REST API, JavaScript, Python, PHP, MariaDB, jQuery</li>
						<li>Ranked in the <b>top 2%</b> among the students handled by my project guide and received a <b>Letter of Recommendation</b> from her.</li>
					</ul>
				</li>
				<br>

				<li>
					<div class="job_title">Software Development Intern <div class="float_right">Nov 2018 – Jan 2019</div></div>				
					<a href="https://oxyvin.com" target="_blank" class="title_a">Oxyvin Technologies (OPC) Pvt Ltd, Bangalore</a> 
					<ul>
						<li>Worked on <b>CodeIgniter</b> framework for <b>MVC Architectural</b> Application Development.</li>
						<li>Developed Technical, Auditor, Planning, Manage & Customer Module of the software.</li>
						<li>Divided different forms in different steps to be followed in chronological order in each modules.</li>
						<li>Created tables of each form of each module in <b>MySQL database</b> and used different forms of <b>Normalization</b> to store filled forms data in more structured form.</li>
						<li>Used <b>AJAX</b> to implement multiple number of input type tag in HTML and to perform database actions asynchronously.</li>
						<li>Worked on the security aspects of the application to prevent cookie manipulation, SQL injection.</li>
						<li><b>Technologies:</b> CodeIgniter, PHP, MariaDB, jQuery, JavaScript, AJAX, Bootstrap </li>
					</ul>
				</li>
				<br>
				
 				<li>
 					<div class="job_title">Software Development Intern <div class="float_right">May 2018 – July 2018</div></div>
 					<a href="http://ngcn.co.uk/" target="_blank" class="title_a">NGCN Infosolutions Pvt Ltd, Suratkal </a> 
					<ul>
						<li>Developed an <b>ERP Software</b> used for <b>Billing and Inventory</b> purpose with facilities like Multi Branch, Multi User and can handle Inventory, Purchases, Stock, Billing, Reports, etc.</b></li>
						<li>Created a <b>Single Page Application</b> using <b>AJAX</b> where different pages for different tasks of the user loads without refreshing or redirecting to any other page.</li>
						<li>Used <b>AJAX</b> to perform all the task in background to minimize slow loading and to prevent loading of same UI again and again which results in improvement of speed of the application.</li>						
						<li><b>Technologies:</b> PHP, jQuery, JavaScript, AJAX, MariaDB, phpMyAdmin </li>
						<li><b>Demo:</b> <a target="_blank" href="http://demoerp.pnds.in">http://demoerp.pnds.in</a></li>
						<li>Received a <b>Return Offer</b> and <b>Recommendation</b> on LinkedIn Profile for completing the project much earlier than the assigned time period and outstanding performance during the internship.</li>
					</ul>									
				</li>
				<br>

				<li>
					<div class="job_title">Full Stack Web Development Intern <div class="float_right">Dec 2017</div></div>
					<a href="http://www.catchfreedeal.com" target="_blank" class="title_a">CatchFreeDeal, Noida </a>
					<ul>
						<li>Developed a complete website from scratch which displays best deals & coupons from different e-commerce website like amazon, flipkart, jabong, etc.</li>
						<li>Created database to store different deals and coupons data as per preference of the logged user.</li>
						<li>Implemented user authentication feature (login, logout, register) from scratch using PHP and MySQL database and used <b>facebook API</b> to give login feature from facebook.</li>
						<li><b>Technologies:</b> PHP, jQuery, JavaScript, AJAX, MariaDB, phpMyAdmin, Bootstrap</li>
						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/adityasuman2025/catchfreedeal"> https://github.com/adityasuman2025/catchfreedeal</a></li>						
					</ul>
				</li>
			</ul>		
		</div>
	</div>
	<br><br>

<!----academic projects----->
	<div class="content_container">
		<h2>academic projects </h2>
		<div class="content">
			<ul>
				<li>
					<a class="title_a">App for GST Department, Government of Bihar</a>
					<ul>
						<li>IIT Patna is building an App for GST Department of Bihar. The App will help the department in reporting of various GST related queries. It features calling the store owners & businessman to verify pending GST payments. </li>
						<li>	Working under professor <b>Dr. Mayank Agrawal</b> & <b>Dr. Jimson Mathew</b> at IIT Patna.</li>
						<li>As a part of the project I am developing the App and learn to extract data from long CSV files more rapid and conveniently in Java, different Android APIs for location system, Phone no dialer, etc.</li>
						<li>Developed the App by extracting data from large CSV files more rapid and conveniently in Java, different Android APIs for location system, Phone no dialer, etc.</li>
						<li><b>Technologies:</b> Android Studio, Java, REST API, PHP, MariaDB, opencsv library</li>
						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/adityasuman2025/GSTAppDemo">https://github.com/adityasuman2025/GSTAppDemo</a></li>
					</ul>				
				</li>
				<br>
				
				<li>
					<a class="title_a">Key Issue System for IIT Patna</a>
					<ul>
						<li>Developed a Key Issue & Return App for the rooms and labs of IIT Patna based on QR Code, under pic automation, <b>Dr. Mayank Agrawal.</b></li>
						<li>Used zxing library of Java and enabled mobile phone camera to scan QR code of the keys & person.</li>
						<li>Created <b>REST API</b> on <b>PHP</b> to verify and check QR Code data and get issued keys history, not returned keys list and issuing person details from database.</li>
						<li><b>It is successfully implemented and is in use in IIT Patna.</b> </li>
						<li><b>Technologies:</b> Android Studio, Java, REST API, PHP, SQL, MariaDB, Zxing library</li>
						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/adityasuman2025/KeyIssue">https://github.com/adityasuman2025/KeyIssue</a></li>
					</ul>
				</li>				
				<br>

				<li>
					<a class="title_a">Notice Board IIT Patna</a>
					<ul>
						<li>Developed a Notice Board Module for IIT Patna under pic automation, <b>Dr. Mayank Agrawal.</b>, where professors and administration can upload notices and students and staffs can open that using the web application</li>
						<li><b>It is successfully implemented and is in use in IIT Patna.</b> </li>
						<li><b>Technologies:</b> PHP, SQL, MariaDB, jQuery, AJAX, Bootstrap</li>
						<li><b>Demo: </b> <a target="_blank" href="http://172.16.26.43/noticeboard">http://172.16.26.43/noticeboard</a></li>
					</ul>
				</li>				
				<br>

				<li>
					<a class="title_a">IPR Module for IIT Patna</a>
					<ul>
						<li>Developed a IPR Module for IIT Patna under pic automation, <b>Dr. Mayank Agrawal.</b>. This module can be used for filing <b>IMMOVABLE PROPERTY RETURN</b> by professors and staffs of IIT Patna.</li>
						<li>Used <b>fpdf</b> library of PHP for generating digital pdf of the filed IPR, that can be printed and saved for later use.</li>
						<li><b>It is successfully implemented and is in use in IIT Patna.</b> </li>
						<li><b>Technologies:</b> PHP, fpdf, SQL, MariaDB, jQuery, AJAX, Bootstrap</li>
						<li><b>Demo: </b> <a target="_blank" href="http://172.16.26.43/ipr">http://172.16.26.43/ipr</a></li>
					</ul>
				</li>				
				<br>

				<li>
					<a class="title_a">Wi-Fi Based Attendance System for IIT Patna</a>
					<ul>
						<li>Developed an attendance system App using <b>Wi-Fi technology</b> of smartphone. A student can mark his attendance by connecting his phone to the hotspot created by professor’s phone. </li>
						<li>	Achieved this by implementing <b>Socket Client</b> in the <b>student version</b> of the App and <b>Socket Server</b> in the <b>professor version</b>. </li>
						<li>Used <b>Socket Programming</b> techniques to let the the socket communicate with each other at a particular <b>IP & PORT</b> using Wi-Fi Network. </li>
						<li>Implemented <b>SharedPreferences</b> in Android to store and retrieve data of the student and let the student mark their attendance even when they don’t have internet connection.</li>
						<li>Used REST API written in PHP to let the App communicate with server to get and send data to database.</li>
						<li><b>Technologies:</b> Android Studio, Java, Socket, REST API, PHP, MariaDB </li>
						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/adityasuman2025/WifiStudentAttendance">https://github.com/adityasuman2025/WifiStudentAttendance</a></li>
					</ul>
				</li>
				<br>

				<li>
					<a class="title_a">QR Based Attendance System for IIT Patna</a>
					<ul>
						<li>Used Zxing library of Java and enabled mobile phone camera to scan QR code of the student.</li>
						<li>Implemented <b>SharedPreferences</b> in Android to store and retrieve data of the student and let the student mark their attendance even when they don’t have internet connection.</li>
						<li>Created REST API in PHP to let the App communicate with server to get and send data to database.</li>
						<li>Stored registered students phone details to prevent logging of multiple students in the same phone and sharing of QR code.</li>
						<li><b>Technologies:</b> Android Studio, Java, REST API, PHP, SQL, MariaDB, Zxing library</li>
						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/adityasuman2025/QRStudentAttendance">https://github.com/adityasuman2025/QRStudentAttendance</a></li>
					</ul>
				</li>
				<br>		

				<li>
					<a class="title_a">Calculator</a>
					<ul>
						<li>Implemented <b>Infix to Postfix</b> conversion algorithm and stacks data structure in Java to develop a standard calculator in Android.</li>
						<li>Also implemented different string functions to extract data in useful form from the entered calculation statements in the App.</li>
						<li>Developed this as a semester project for course <b>CS382</b> at IIT Patna. </li>
						<li><b>Technologies:</b> Java, Android Studio</li>
						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/adityasuman2025/MNgoCalc">https://github.com/adityasuman2025/MNgoCalc</a></li>
					</ul>
				</li>
						
			</ul>
		</div>
	</div>
	<br><br>

<!----other projects----->
	<div class="content_container">
		<h2>other projects </h2>
		<div class="content">
			<ul>				
				<li>
					<a class="title_a">ChatApp</a>
					<ul>
						<li>Created <b>Socket Server</b> on Node.js using <b>socket.io</b> library and express.js framework.</li>
						<li>Used <b>Socket Programming</b> libraries of Java to create <b>Socket Client</b> on Android to connect to socket.io Node.js Server and to handle specific message coming to a specific user.</li>
						<li>Used <b>REST API</b> written on <b>Node.js</b> to get user data & old messages and store new user data & new messages in <b>mongoDB</b> database.</li>
						<li>Used <b>Firebase Storage</b> to store multimedia messages (images).</li>
						<li>Implemented <b>SharedPreferences</b> in Android to store and retrieve data of the logged user and his old chats even when internet connection is not available.</li>
						<li>Implemented <b>Service & Foreground Process</b> in Android to keep <b>Socket Client</b> running in background in the app even when the app is minimized or closed to get push notification of new message or unseen messages.</li>
						<li>Used <b>Multithreading</b> feature of Java to perform different task in different thread to make the App faster and to minimize load on UI thread of the App.</li>
						<li><b>Technologies:</b> Node.js, mongoDB, express.js, socket.io, Android Studio, Java, Firebase, REST API</li>
						<li><b>App link:</b> <a target="_blank" href="http://chat.mngo.in">http://chat.mngo.in</a></li>
					</ul>
				</li>
				<br> 	

				<li>
					<a class="title_a">Wi-Fi Based Chatting App</a>
					<ul>
						<li>Developed 2 Apps, one as <b>Socket Server</b> & other as a <b>Socket Client</b> which will communicate with each other on a particular IP & PORT using Wi-Fi Technology of smartphone.</li>
						<li><b>Technologies:</b> Android Studio, Java, Socket</li>
						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/adityasuman2025/WifiChatServer">https://github.com/adityasuman2025/WifiChatServer</a>, <a target="_blank" href="https://github.com/adityasuman2025/WifiChatClient">https://github.com/adityasuman2025/WifiChatClient</a></li>
					</ul>
				</li>
				<br>								

 				<li>
 					<a class="title_a">QR Code Scanner & Generator</a>
 					<ul>
 						<li>Implemented Zxing Java library in Android to <b>decode</b> scanned QR code from smartphone camera and to generate QR Code Image from any text.</li>
 						<li><b>Technologies:</b> Android Studio, Zxing library</li>
 						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/adityasuman2025/MNgoQR">https://github.com/adityasuman2025/MNgoQR</a></li>
 					</ul>
 				</li>
				<br>

				<li>
					<a class="title_a">Anwesha 2k18 Website’s Front-end</a>
					<ul>
						<li>Implemented mousewheel.js to scroll the website <b>horizontally</b> and used jQuery features like mouse location, on scroll, image location coordinates, AJAX, etc to create a <b>unique design</b> of the website.</li>
						<li>Got <b>positive review</b> from other college fest’s web developers over the UI & design of the site.</li>
						<li><b>Technologies:</b>  jQuery, mousewheel.js, AJAX, HTML, CSS</li>
						<li><b>Web link:</b> <a target="_blank" href="https://2018.anwesha.info/">https://2018.anwesha.info/</a></li>
						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/anweshaiitp/anwesha">https://github.com/anweshaiitp/anwesha</a></li>
					</ul>
				</li>
				<br>
		
				<li>
					<a class="title_a">IITP Motorsports Website</a>
					<ul>
						<li>Built a complete website from scratch using HTML, CSS, PHP and MySQL.</li>
						<li>Used AJAX to send mail to website administrator and contacting person in background without reloading or redirecting to any page.</li>
						<li><b>Technologies:</b> PHP, MariaDB, jQuery, AJAX, jquery-ui.js, jquery.bxslider.js, HTML, CSS </li>
						<li><b>Web link:</b> <a target="_blank" href="http://iitpmotorsports.in/">http://iitpmotorsports.in/</a></li>
						<li><b>GitHub Repository:</b> <a target="_blank" href="https://github.com/adityasuman2025/IITPMotorsports">https://github.com/adityasuman2025/IITPMotorsports</a></li>
					</ul>
				</li>				
			</ul>
		</div>
	</div>
	<br><br>

<!----achievements---->
	<div class="content_container">
		<h2>achievements</h2>
		<div class="content">
			<ul>
				<li><b>Internship at ISRO: </b>Recieved Letter of Recommendation and ranked among <b>top 2% students</b> worked under <b>S. Santhalakshmi, Scientist ‘SF’ & Manager SDG, ISTRAC-ISRO.</b></li>
				<li><b>Internship at NGCN: </b>Recieved <b>Return Offer & Recommendation</b> on LinkedIn Profile from <b>Justin Sebastian, CEO of NGCN, Oxyvin.</b></li>
				<li><b>Professor of IIT Patna: </b>Got Letter of Recommendation from <b>Dr. Jimson Mathew, Head of Department (HOD),</b> Computer Science & Engg Department, IIT Patna and <b>Dr. Mayank Agrawal, Assistant Professor,</b> Computer Science & Engg Department, IIT Patna</li>

				<li>
					<b>JEE Main:</b> Secured <b>98.97 percentile</b> out of 12,07,058 candidates appeared in JEE Main 2016. 	
				</li>
				<li>
					<b>JEE Advance:</b> Secured <b>94.27 percentile</b> out of 1,55,948 candidates appeared in JEE Advance 2016. 		
				</li>
				<li>
					<b>All India Secondary School Examination:</b> Scored a <b>10 CGPA</b> in Secondary School Examination 2014 (Class 10) conducted by CBSE. 		
				</li>
				
				<li>
					<b>Key Issue App for IIT Patna:</b> This app resulted in faster issuing and returning of keys which prevents queue and saves everyone’s time. <b>2750+</b> keys of labs and rooms of different blocks of IIT Patna have been issued and returned till date. 		
				</li>
				<li>
					<b>Attendance System for IIT Patna:</b> Used by Dr. Mayank Agrawal to take attendance of <b>244 students</b> enrolled in the course CS102 at IIT Patna. Currently giving demo of the App to other professors in my college. 		
				</li>
				<li>
					<b>Billing & Inventory ERP Software:</b> <b>3100+</b> invoices and quotations have been generated till date using software developed by me, during my internship at <b>NGCN.</b>		
				</li>
				<li>
					<b>Deals & Coupons Website:</b> <b>1000+</b> deals and coupons have been posted till date on the website developed by me, during my internship at <b>CatchFreeDeal.com.</b>		
				</li>
				<li>
					<b>Anwesha 2k18 Website:</b> Used by <b>3500+</b> peoples to register in the biggest cultural fest of North India held at IIT Patna in 2018.		
				</li>
			</ul>
		</div>
	</div>
	<br><br>

<!----technial skills----->
	<div class="content_container">
		<h2>skills & interests</h2>
		<div class="content">
			<ul>
				<li><b>General:</b> Web Application Development, Android App Development, API Development, Database Administration, MVC Architectural Application Development</li>
				<li><b>Programming language:</b> Java, JavaScript, Python, PHP, SQL</li>
				<li><b>Database:</b> MySQL, MariaDB, mongoDB </li>
				<li><b>Framework:</b> CodeIgniter, express.js, Django, Bootstrap</li>
				<li><b>Web Technologies:</b> jQuery, Node.js, react.js, REST API, Web-Socket, Socket.io, HTML, CSS</li>
				<li><b>Other Utilities:</b> Android Studio, Octave, Adobe Photoshop, Solidworks</li>
				<li><b>Experience with:</b> Linux, Git, cPanel, Heroku, Google Cloud Platform Compute Engine, Google Firebase, Amazon Web Services EC2</li>
			</ul>			
		</div>
	</div>
	<br><br>

<!----por----->
	<div class="content_container">
		<h2>position of responsibility</h2>
		<div class="content">
			<ul>	
				<li>Former Coordinator, Design Club, IIT Patna <div class="float_right">2017 - 2019</div></li>
				<li>Former Team Member, <a href="http://www.iitpmotorsports.in" target="_blank">IITP Motorsports</a> <div class="float_right">2016 - 2018</div></li>
				<li>Former Web & App Team Sub-Coordinator, <a href="https://anwesha.info" target="_blank">Anwesha 2018, IIT Patna</a> <div class="float_right">2017 - 2018</div></li>
				<li>Former Web Master, <a href="http://www.eclubiitp.org" target="_blank">Entrepreneurship Club, IIT Patna</a><div class="float_right">2017 - 2018</div></li>	
			</ul>		
		</div>
	</div>
	<br><br>

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

<!-----footer--->
	<br><br>
	<div class="footer">
		<span>&copy 2017-20 This property belongs to Aditya Suman</span>
	</div>
</div>
	
<!-------script-------->
	<script type="text/javascript">
		$(document).ready(function()
		{
		//preloader size	
			$(window).resize(function() 
			{
				var preloader_height = 400;
				var window_width = $(window).width();		

				if(window_width<850)
				{
					preloader_height = 200;
				}
				$('.preloader_container').height(preloader_height + "px").css('z-index', '-1');
				$('.body_container').fadeIn(0).css('margin-top', preloader_height + "px");
			});

			var preloader_height = 400;
			var window_width = $(window).width();		

			if(window_width<850)
			{
				preloader_height = 200;
			}

			setTimeout(function()
			{
				$('.preloader_container').height(preloader_height + "px").css('z-index', '-1');
				$('.preloader_container .loading_gif').fadeOut(0);
				$('.body_container').fadeIn(0).css('margin-top', preloader_height + "px");
			}, 1000);

		//topic titles	
			var about_me = document.createTextNode('<about_me />');
			var contact_me = document.createTextNode('<contact_me />');
			var education = document.createTextNode('<education />');
			var internship_experience = document.createTextNode('<internship_experience />');
			var academic_projects = document.createTextNode('<academic_projects />');
			var other_projects = document.createTextNode('<other_projects />');
			var achievements = document.createTextNode('<achievements />');
			var skills_and_interests = document.createTextNode('<skills_and_interests />');
			var position_of_responsibility = document.createTextNode('<position_of_responsibility />');
			var follow_me = document.createTextNode('<follow_me />');

			var topic_titles = [];
			topic_titles.push(about_me);
			topic_titles.push(contact_me);
			topic_titles.push(education);
			topic_titles.push(internship_experience);
			topic_titles.push(academic_projects);
			topic_titles.push(other_projects);
			topic_titles.push(achievements);
			topic_titles.push(skills_and_interests);
			topic_titles.push(position_of_responsibility);
			topic_titles.push(follow_me	);

		
			var i = 0;
			$('.content_container h2').each(function(argument) 
			{
				var id = "topic" + i;
				$(this).attr("id", id);
				$(this).text("");
				
				document.getElementById(id).appendChild(topic_titles[i]);

				i++;
			});
		});
	</script>
</body>
</html>
