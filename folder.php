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

		if(isset($_POST['folder_id']) && isset($_POST['folder_name']))
		{
			$folder_id = $_POST['folder_id'];
			$folder_name = $_POST['folder_name'];
		}	
		else
			die("Something is wrong");
	}
?>
<html>
<head>
	<title><?php echo $folder_name . " - " . $project_title; ?></title>

	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/index.css" rel="stylesheet"/>
	<link rel="icon" href="img/logo.png" />
	<script type="text/javascript" src="js/jquery.js"> </script>
	<script type="text/javascript" src="js/jquery.redirect.js"></script>
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

<!------new file upload modal--------->
	<div id="upload_file_sample">
		<input type="file" name="file" id="file">
		<br />
		<div class="error"></div>
	</div>

<!------rename file/folder modal--------->
	<div id="rename_file_folder_sample">
		<input type="text" id="rename_file_folder_text_input" placeholder="New Name" />
		<br />
		<div class="button-5" id="rename_btn">
		    <div class="translate"></div>
		   	<button class="button_btn">Rename</button>
		</div>
		<div class="error"></div>
	</div>

<!------delete file/folder modal--------->
	<div id="delete_file_folder_sample">
		<div class="name_text">Are you sure to delete</div>
		
		<div class="button-5" id="yes_btn">
		    <div class="translate"></div>
		   	<button class="button_btn">Yes</button>
		</div>
		<div class="button-5" id="cancel_btn">
		    <div class="translate"></div>
		   	<button class="button_btn">Cancel</button>
		</div>
		<div class="error"></div>
	</div>

<!------custom context menu----------->
	<ul class='custom-menu'></ul>

<!-------script-------->
	<script type="text/javascript">
		session_length = "<?php echo $session_time; ?>";
		API_ADDRESS = "<?php echo $API_ADDRESS; ?>";		

		logged_user_id = "<?php echo $logged_user_id; ?>";
		folder_id = "<?php echo $folder_id; ?>";

	//date and tym formatter
		var dateFormat = function () 
	    {
		    var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
		        timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
		        timezoneClip = /[^-+\dA-Z]/g,
		        pad = function (val, len) {
		            val = String(val);
		            len = len || 2;
		            while (val.length < len) val = "0" + val;
		            return val;
		        };

		    // Regexes and supporting functions are cached through closure
		    return function (date, mask, utc) {
		        var dF = dateFormat;

		        // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
		        if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
		            mask = date;
		            date = undefined;
		        }

		        // Passing date through Date applies Date.parse, if necessary
		        date = date ? new Date(date) : new Date;
		        if (isNaN(date)) throw SyntaxError("invalid date");

		        mask = String(dF.masks[mask] || mask || dF.masks["default"]);

		        // Allow setting the utc argument via the mask
		        if (mask.slice(0, 4) == "UTC:") {
		            mask = mask.slice(4);
		            utc = true;
		        }

		        var _ = utc ? "getUTC" : "get",
		            d = date[_ + "Date"](),
		            D = date[_ + "Day"](),
		            m = date[_ + "Month"](),
		            y = date[_ + "FullYear"](),
		            H = date[_ + "Hours"](),
		            M = date[_ + "Minutes"](),
		            s = date[_ + "Seconds"](),
		            L = date[_ + "Milliseconds"](),
		            o = utc ? 0 : date.getTimezoneOffset(),
		            flags = {
		                d:    d,
		                dd:   pad(d),
		                ddd:  dF.i18n.dayNames[D],
		                dddd: dF.i18n.dayNames[D + 7],
		                m:    m + 1,
		                mm:   pad(m + 1),
		                mmm:  dF.i18n.monthNames[m],
		                mmmm: dF.i18n.monthNames[m + 12],
		                yy:   String(y).slice(2),
		                yyyy: y,
		                h:    H % 12 || 12,
		                hh:   pad(H % 12 || 12),
		                H:    H,
		                HH:   pad(H),
		                M:    M,
		                MM:   pad(M),
		                s:    s,
		                ss:   pad(s),
		                l:    pad(L, 3),
		                L:    pad(L > 99 ? Math.round(L / 10) : L),
		                t:    H < 12 ? "a"  : "p",
		                tt:   H < 12 ? "am" : "pm",
		                T:    H < 12 ? "A"  : "P",
		                TT:   H < 12 ? "AM" : "PM",
		                Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
		                o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
		                S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
		            };

		        return mask.replace(token, function ($0) {
		            return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
		        });
		    };
		}();

			// Some common format strings
				dateFormat.masks = {
				    "default":      "ddd mmm dd yyyy HH:MM:ss",
				    shortDate:      "m/d/yy",
				    mediumDate:     "mmm d, yyyy",
				    longDate:       "mmmm d, yyyy",
				    fullDate:       "dddd, mmmm d, yyyy",
				    shortTime:      "h:MM TT",
				    mediumTime:     "h:MM:ss TT",
				    longTime:       "h:MM:ss TT Z",
				    isoDate:        "yyyy-mm-dd",
				    isoTime:        "HH:MM:ss",
				    isoDateTime:    "yyyy-mm-dd'T'HH:MM:ss",
				    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
				};

			// Internationalization strings
				dateFormat.i18n = {
				    dayNames: [
				        "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
				        "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
				    ],
				    monthNames: [
				        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
				        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
				    ]
				};

			// For convenience...
			Date.prototype.format = function (mask, utc) {
			    return dateFormat(this, mask, utc);
		};

	//function to show custom context menu
		document.addEventListener('contextmenu', event => event.preventDefault()); //removing default context menu

		function showCustomContext(folder_class)
		{
			var html = "<li>Open</li><li>Rename</li><li>Delete</li><li>Details</li>";

		// Trigger action when the contexmenu is about to be shown
			$('.' + folder_class).bind("contextmenu", function (event)
			{
			//getting the details of the selected folder/file	
				var type = $(this).attr('type');
				var name_text = $(this).find('.name_text').text().trim();
				if(type == "folder")
				{
					var folder_id =  $(this).attr('folder_id');

					$(".custom-menu").html(html);
					$(".custom-menu").attr('folder_id', folder_id);
					$(".custom-menu").attr('name_text', name_text);
					$(".custom-menu").attr('file_address', "folder_address_not_allowed");
				}
				else if(type == "file")
				{
					var file_id =  $(this).attr('file_id');
					var file_address = $(this).attr('file_address');

					$(".custom-menu").html(html);
					$(".custom-menu").append("<li>Share</li>");
					$(".custom-menu").attr('file_id', file_id);
					$(".custom-menu").attr('file_address', file_address);
					$(".custom-menu").attr('name_text', name_text);					
				}
				$(".custom-menu").attr('type', type);

		    // Avoid the real one
			    event.preventDefault();
			    
		    // Show contextmenu
			    $(".custom-menu").finish().toggle(100).
			    
		    // In the right position (the mouse)
			    css({
			        top: event.pageY + "px",
			        left: event.pageX + "px"
			    });

			// If the menu element is clicked
				$(".custom-menu li").click(function()
				{
			    // This is the triggered action name
			    	var text = $(this).text().trim();
				    switch(text) 
				    {
				        case "Open": open_File_Folder($(this).parent()); break;
				        case "Rename": rename_File_Folder($(this).parent()); break;
				        case "Delete": delete_File_Folder($(this).parent()); break;
				        case "Share": share_File($(this).parent()); break;
				        case "Details": details_File_Folder($(this).parent()); break;
				    }
				  
			    // Hide it AFTER the action was triggered
				    $(".custom-menu").hide(100);
				});
			});

		// If the document is clicked somewhere
			$(document).bind("mousedown", function (e) 
			{
			    // If the clicked element is not the menu
			    if (!$(e.target).parents(".custom-menu").length > 0) {
			        // Hide it
			        $(".custom-menu").hide(100);
			    }
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

	//on clicking on upload file btn
		$('#upload_file_btn').on("click", function()
		{
		//displaying the overlay div and its content	
			$('.overlay_backgrnd').fadeIn(400);
			$('.overlay_div').fadeIn(400);

			var html = $('#upload_file_sample').html();
			$('.overlay_content').html(html);

		//for uploading file			
			var post_address = API_ADDRESS + "upload_file_on_server.php";
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
		var post_address = API_ADDRESS + "get_user_folder_contents.php";
		$.post(post_address, {logged_user_id: logged_user_id, folder_id: folder_id}, function(data)
		{
			if(data == -100)
			{
				$('.drive_container').html("Database connection error");
			}
			else if(data == -1)
			{
				$('.drive_container').html("Something went wrong");
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
						var file_id = resultArray[index]['file_id'];

						var name_extension = name.split('.').pop().toLowerCase();
						var only_name = name.split('.').slice(0, -1).join('.')
						only_name = only_name.substring(0, 20);

						var display_name = only_name + "." + name_extension;

						tempHTML += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 x_m-p file_folder_container" type="' + type + '" file_id="' + file_id + '" file_address="' + file_address + '"><img src="img/' + icon_name + '.png" /><div class="name_text">' + display_name + '</div></div>';
					}

					html += tempHTML;
				}

			//rendering the root folder/file contents and displaying custom context menu
				$('.drive_container').html("");
				$('.drive_container').html(html);
				showCustomContext('file_folder_container');

			//on clicking on any file/folder
				$('.file_folder_container').on("click", function()
				{
					open_File_Folder($(this));
				});
			}
		});

	//function to open file/folder
		function open_File_Folder(_this_)
		{
			var type = $(_this_).attr("type");
			if(type == "file") //opening the file new tab
			{
				var file_address = $(_this_).attr("file_address");

				$.redirect(file_address,
		        {
		        }, "GET", "_blank");
			}
			else if(type == "folder") //displaying the content of the folder
			{
				var folder_id = $(_this_).attr("folder_id");		
				$.redirect("folder.php",
		        {
		        	folder_id: folder_id
		        }, "POST");
			}
		}	
	
	//function to rename folder/file
		function rename_File_Folder(_this_)
		{
		//displaying the overlay div and its content	
			$('.overlay_backgrnd').fadeIn(400);
			$('.overlay_div').fadeIn(400);

			var old_name = $(_this_).attr('name_text');			
			// $('#rename_file_folder_sample #rename_file_folder_text_input').attr("value", old_name);

			var html = $('#rename_file_folder_sample').html();
			$('.overlay_content').html(html);

		//on pressing rename btn
			$('#rename_btn').on("click", function()
			{
				$('.error').text("");
				$('.error').html("<img class=\"gif_loader\" src=\"img/loader1.gif\">");

				var new_name = $('#rename_file_folder_text_input').val().trim();
				
				var type = $(_this_).attr("type");				
				if(type == "file")
					var id = $(_this_).attr("file_id");
				else if(type == "folder")
					var id = $(_this_).attr("folder_id");				
				
			//sending rqst to api	
				var post_address = API_ADDRESS + "rename_file_folder.php";
				$.post(post_address, {logged_user_id: logged_user_id, type: type, id: id, old_name: old_name, new_name: new_name}, function(data)
				{
					// console.log(data);

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
						$('.error').text("Fail to rename");
					}
					else if(data == 1) //renamed successfully
					{						
					 	location.reload();
					}
					else
					{
						$('.error').text("Unknown error");
					}
				});
			});
		}

	//function to delete folder/file
		function delete_File_Folder(_this_)
		{
		//displaying the overlay div and its content	
			$('.overlay_backgrnd').fadeIn(400);
			$('.overlay_div').fadeIn(400);

			var html = $('#delete_file_folder_sample').html();
			$('.overlay_content').html(html);

		//on pressing cancel btn
			$('#cancel_btn').on("click", function()
			{
				$('.overlay_backgrnd').fadeOut(200);
				$('.overlay_div').fadeOut(200);
			});

		//on pressing yes btn
			$('#yes_btn').on("click", function()
			{
				$('.error').text("");
				$('.error').html("<img class=\"gif_loader\" src=\"img/loader1.gif\">");

				var file_address = "";

				var type = $(_this_).attr("type");
				if(type == "file")
				{
					var id = $(_this_).attr("file_id");
					var file_address = $(_this_).attr("file_address");
				}
				else if(type == "folder")
					var id = $(_this_).attr("folder_id");
				
			//sending rqst to api	
				var post_address = API_ADDRESS + "delete_file_folder.php";
				$.post(post_address, {logged_user_id: logged_user_id, type: type, id: id, file_address: file_address}, function(data)
				{
					// console.log(data);

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
						$('.error').text("Fail to rename");
					}
					else if(data == 1) //renamed successfully
					{						
					 	location.reload();
					}
					else
					{
						$('.error').text("Unknown error");
					}
				});
			});
		}
	
	//function to share file location/link
		function share_File(element)
		{
			var web_address   = window.location.origin;   // Returns base URL (https://example.com)
			if(web_address == "http://localhost") {
			//for local server
				web_address = "http://localhost/MNgoDrive";
			} else if( web_address == "http://mngo.in" || "https://mngo.in" ) {
				web_address += "/drive";
			}
			
			var file_address = $(element).attr("file_address");
			var full_address = web_address + "/" + file_address;

		//copy to clipboard stuffs	
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val(full_address).select();
			document.execCommand("copy");
			$temp.remove();

		//displaying the overlay div and its content	
			$('.overlay_backgrnd').fadeIn(400);
			$('.overlay_div').fadeIn(400);
					
			$('.overlay_content').html('<div style="color: #f1f1f1; font-size: 150%;">copied</div>');
		}
	
	//function to get details of file/folder
		function details_File_Folder(_this_)
		{
		//displaying the overlay div and its content	
			$('.overlay_backgrnd').fadeIn(400);
			$('.overlay_div').fadeIn(400);
					
			$('.overlay_content').html("<img class=\"gif_loader\" src=\"img/loader1.gif\">");

			var type = $(_this_).attr("type");				
			if(type == "file")
				var id = $(_this_).attr("file_id");
			else if(type == "folder")
				var id = $(_this_).attr("folder_id");				
			
		//sending rqst to api	
			var post_address = API_ADDRESS + "get_details_of_file_folder.php";
			$.post(post_address, {logged_user_id: logged_user_id, type: type, id: id}, function(data)
			{
				// console.log(data);

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
							var icon_name = "folder";

							var added_on = resultArray[index]['added_on'];

							tempHTML += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 x_m-p details_container"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 x_m-p details_img_cont"><img src="img/' + icon_name + '.png" /></div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 x_m-p details_details_cont"> <b> Name: </b> ' + name + '<br /> <b> Added on: </b> ' + dateFormat(added_on, "dd mmmm yy - h:MM TT") + '</div></div></div>';
						}
						else if(type == "file")
						{
							var icon_name = "file";

							var added_on = resultArray[index]['added_on'];
							var file_address = resultArray[index]['file_address'];

							var web_address   = window.location.origin;   // Returns base URL (https://example.com)
							if(web_address == "http://localhost") {
							//for local server
								web_address = "http://localhost/MNgoDrive";
							} else if( web_address == "http://mngo.in" || "https://mngo.in" ) {
								web_address += "/drive";
							}

							var full_address = web_address + "/" + file_address;
							
							tempHTML += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 x_m-p details_container"><div class="row"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 x_m-p details_img_cont"><img src="img/' + icon_name + '.png" /></div><div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 x_m-p details_details_cont"> <b> Name: </b> ' + name + '<br /> <b> Added on: </b> ' + dateFormat(added_on, "dd mmmm yy - h:MM TT") + '<br /> <b> File Address: </b> <a target="_blank" href="' + full_address + '">' + full_address + '</a></div></div></div>';
						}

						html += tempHTML;
					}
					$('.overlay_content').html(html);
				}
			});
		}
	</script>
</body>
</html>