<?php
session_start();
session_destroy();
?>
<html lang="en">
<head>
<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  

	<script src="jquery/jquery-1.1.4.js"></script>
	<script type="text/javascript" >
		$(document).ready(function(){
			var uname = $("#txtUname"); //user name field
			var password = $("#txtPassword"); //password field
			function checkCommentsForm(){
				if(uname.attr("value") && password.attr("value"))
					return true;
				else
					return false;
			}
			$("#formLogin").submit(function(){
				$.ajax({
				type: "post"
				,url: "login.php"
				,data: "uname="+uname.val()+"&password="+password.val(),
				success: function(msg) {
				$('#target').hide();
				if(msg=="1"){
					location.href="home.php";
					
				}
				else if(msg=="2")
				{
					location.href="profile.php";
				}
				else
				{
					$("#target").html ("<p>" + msg + "</p>").fadeIn("slow");
				}
				}
				});
			});
			
		});
	</script>
</head>
<body>
<!-- TOP BAR -->
	<div id="top-bar">
		<div class="page-full-width">
			<a href="#" class="round button dark ic-left-arrow image-left ">Return to website</a>
		</div> <!-- end full-width -->	
	</div> <!-- end top-bar -->

	<!-- HEADER -->
	<div id="header">
		<div class="page-full-width cf">
			<div id="login-intro" class="fl">		
				<h1>Login to Admin</h1>
			<h5>Enter your credentials below</h5>		
			</div> <!-- login-intro -->
	<a href="www.istar.ac.in" id="company-branding" class="fr"><img src="images/istar.png" alt="Blue Hosting" /></a>
		</div> <!-- end full-width -->	
	</div> <!-- end header -->
	
	<!-- MAIN CONTENT -->
	<div id="content">
		<form id="formLogin" name="formLogin" method="post" class="login-form" onsubmit="return false;">
			<fieldset>
				<p>
					<label for="login-username">username</label>
					<input type="text" name="txtUname" id="txtUname" class="round full-width-input" autofocus  required  />
				</p>

				<p>
					<label for="login-password">password</label>
					<input type="password" name="txtPassword" id="txtPassword" class="round full-width-input" />
				</p>		
				<p>I've <a href="#">forgotten my password</a>.</p>
			<p><input type="submit" name="btnLogin" id="btnLogin" class="formbutton"  value="Login">
	         <input type="reset" class="formbutton"  value="Cancal"></p>
			 <p id="target"></p>
			</fieldset>
			<br/><div class="information-box round">Just click on the "LOG IN" button to continue, no login information required.</div>
		</form>
	</div> <!-- end content -->
	
	<!-- FOOTER -->
	<div id="footer">
		<p>&copy; Copyright 2012 <a href="#">ISTAR,Vidhyanagar</a>. All rights reserved.</p>
		<p><strong>SimpleAdmin</strong> Created by <a href="http://www.istar.ac.in">ISTAR</a></p>
	</div> <!-- end footer -->
	
<!--<form id="formLogin" name="formLogin" onsubmit="return false;">
Login Id = <input type="text" name="txtUname" id="txtUname" required/>
Password = <input type="password" name="txtPassword" id="txtPassword" required/>
<input type="submit" name="btnLogin" id="btnLogin" value="Login" />
<p id="target"></p>-->
</form>
</body>
</html>