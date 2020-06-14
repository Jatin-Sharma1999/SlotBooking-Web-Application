<html>
	<head>
		<meta charset="utf-8">
		<title>User Login</title>
		<link rel="stylesheet" type="text/css" href="loginstyle.css">
		<script>
			function checkLogin(){
				var usr = document.getElementById("usr_name").value;
				var pass = document.getElementById("usr_pass").value;
				
				if(usr==""){
					alert("Please enter your username.");
				}
				else if(!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$/.test(usr))){
					alert("Invalid username!");
				}
				else if(pass==""){
					alert("Please enter your password.");
				}
				else if(!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/.test(pass))){
					alert("Invalid password.");
				}
				else{
					<?php
					include('loginadmin.php');
					?>
					
				}
			}
		</script>
	</head>
	<body>
		<header>
			<div class="headNav">
				<ul class="general">
					<li><a href="index.php">Home</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
		</header>
		<div class="loginbox">
			<img src="avatar1.png" class="avatar">
			<h1 align="center">Login</h1>
			<form action="" method="POST">
			<?php include('error.php'); ?>
				<p>Username<sup style="color:red">*</sup></p>
				<input type="text" placeholder="Enter Username" id="usr_name" name="usr_name">
				<p>Password<sup style="color:red">*</sup></p>
				<input type="password" placeholder="Enter Password" id="usr_pass" name="usr_pass"></br>
				<input type="submit" value="Sign in" name="submitbt" onclick="checkLogin()"></br>
				<a href="forgotpasswordadm.php">Forgot your password</a></br>
				<a href="registeradm.php">Don't have an account?</a>
			</form>
		</div>
		<!--<footer>
			<div class="mainFoot">
				<img src="BOI.jpg" alt="logo_boi" width="70px" height="70px" style="margin-left:18px; margin-top:5px">
				<p align="center" style="font-size:12px; color: white; margin-top:-58px">
					Content managed by Bureau of Immigration, Ministry of Home Affairs</br>
					Designed & Developed by NIC</br>
					Updated as on Jan 1, 2020
				</p>
				<img src="nic_logo.png" alt="logo_nic" width="70px" height="70px" style="margin-right:18px; margin-top:-65px; float: right">
			</div>
		</footer>-->
		
	</body>
</html>