<!DOCTYPE HTML>
<html>
<head>
<title>Contact Form</title>
<link href="../static/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keywords" content=""/>
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
			<div class="main">
				<div class="main-section">
					<div class="login-form">
						<form id="frmcontact" method="POST" action="../contact">
							<ul>
								 <li class="text-info">Name</li>
								 <li><input name="txtname" id="txtname" type="name" required></li>
								 <div class="clear"></div>
							 </ul>
							<ul>
								 <li class="text-info">Email</li>
								 <li><input name="useremail" id="useremail" type="email" required></li>
								 <div class="clear"></div>
							 </ul>
							<ul>
								 <li class="text-info">Mobile</li>
								 <li><input name="mobile" id="mobile" type="phone" required></li>
								 <div class="clear"></div>
							 </ul>
							 <ul>
								<li class="text-info">Message</li>
								<li><textarea name="message" id="message" row="3" cols="3"></textarea></li>
								<div class="clear"></div>
							</ul>
							<input type="hidden" name="secret_key" value="">
							<input type="hidden" name="admin_email" id="admin_email" value="<?= $admin_email ?>">
							<input name="submit" type="submit" value="Send Message">

							
						</fo
			</div>
</body>
</html>