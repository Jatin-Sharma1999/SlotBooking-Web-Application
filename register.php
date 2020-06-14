<html>
	<head>
		<meta charset="utf-8">
		<title>User New Registration</title>
		<link rel="stylesheet" type="text/css" href="regstyle.css">
		<script>
			function chkFormVaildation(){
				var fname = document.getElementById("first_name").value;
				var lname = document.getElementById("last_name").value; 
				var DOB = document.getElementById("dob").value;				
				DOB = new Date(DOB);
				var currDate = new Date();
				var mail = document.getElementById("eMail").value;
				var m_no = document.getElementById('mob').value;
				var usrName = document.getElementById("usrNm").value;
				var pass = document.getElementById("usrpass").value;
				var c_Pass = document.getElementById("confrmPass").value;
				
				if(fname==""){
					alert("Please enter your first name.");
				}
				else if(!(/^[A-Z][a-z]*$/g.test(fname))){
					alert("First name is invalid!");
				}
				else if(lname==""){
					alert("Please enter your last name.");
				}
				else if(!(/^[A-Z][a-z]*$/g.test(lname))){
					alert("Last name is invalid!");
				}
				else if(!(document.getElementById("male").checked || document.getElementById("female").checked || document.getElementById("Other").checked)){
					alert("Please select your gender.");
				}
				else if(!Date.parse(DOB)){
					alert("Please enter your date of birth.");
				}
				else if((DOB > currDate) || (DOB.toDateString() == currDate.toDateString())){
					alert("Invalid date of birth!");
				}
				else if(mail==""){
					alert("Please enter your valid email-id.")
				}
				else if(!(/^[a-z]+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))){
					alert("Invalid email!");
				}
				else if(m_no == ""){
					alert("Please enter your mobile number.");
				}
				else if(usrName==""){
					alert("Please enter an username.");
				}
				else if(!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$/.test(usrName))){
					alert("Invalid username!\nUsername should consist minimum of 6 and maximum of 15 characters containing at least one numeric digit, one uppercase, and one lowercase letter.");
				}
				else if(pass==""){
					alert("Please enter a password.");
				}
				else if(!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/.test(pass))){
					alert("Your password must consist minimum of 8 and maximum of 15 characters containing at least one lowercase letter, one uppercase letter, one numeric digit, and one special character.")
				}
				else if(c_Pass==""){
					alert("Please enter a confirm password.");
				}
				else if(c_Pass != pass){
					alert("Confirm Password doesn't match with your entered password!")
				}
				else{
					<?php include_once('register_php.php') ?>
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
		<div class="wrap">
			<h1 align="center" style="color:red">Create New Account</h1>
			<form action="" method="post">
			<?php include('error.php'); ?>
				<table cellpadding="6"  align="center">
					<tr>
						<td id="label">First Name:&nbsp<sup style="color:red">*</sup></td>
						<td><input type="text" id="first_name" placeholder="Enter first name" name="first_name"></td>
					</tr>
					<tr>
						<td id="label">Middle Name:&nbsp</td>
						<td><input type="text" id="mid_name" placeholder="Enter middle name" name="mid_name"></td>
					</tr>
					<tr>
						<td id="label">Last Name:&nbsp<sup style="color:red">*</sup></td>
						<td><input type="text" id="last_name" placeholder="Enter last name" name="last_name"></td>
					</tr>
					<tr>
						<td id="label">Gender:&nbsp<sup style="color:red">*</sup></td>
						<td>
							<input type="radio" name="gender" value="M" id="male"><font color="white">Male</font>
							<input type="radio" name="gender" value="F" id="female"><font color="white">Female</font>
							<input type="radio" name="gender" value="O" id="other"><font color="white">Other</font>
						</td>
					</tr>
					<tr>
						<td id="label">Date of birth:&nbsp<sup style="color:red">*</sup></td>
						<td><input type="date" id="dob" name="dob"></td>
					</tr>
					<tr>
						<td id="label">Email:&nbsp<sup style="color:red">*</sup></td>
						<td><input type="text" id="eMail" placeholder="Enter your email-id" name="eMail"></td>
					</tr>
					<tr>
						<td id="label">Mobile:&nbsp<sup style="color:red">*</sup></td>
						<td><input type="text" id="mob" placeholder="Enter your mobile number" name="mob"></td>
					</tr>
					<tr>
						<td id="label">Username:&nbsp<sup style="color:red">*</sup></td>
						<td><input type="text" id="usrNm" placeholder="Enter a username" name="usrNm"></td>
						<td id="label1">Format- 6-15 characters, at least 1 uppercase,<br> 1 lowercase and 1 digit</td>
					</tr>
					<tr>
						<td id="label">Password:&nbsp<sup style="color:red">*</sup></td>
						<td><input type="password" id="usrpass" placeholder="Enter a password" name="usrpass"></td>
						<td id="label1">Format- 8-15 characters, at least 1 uppercase,<br> 1 lowercase, 1 special character and 1 digit</td>
					</tr>
					<tr>
						<td id="label">Confirm Password:&nbsp<sup style="color:red">*</sup></td>
						<td><input type="password" id="confrmPass" placeholder="Enter confirm password"></td>
					</tr>
				</table>
				<p align="center"><input type="submit" value="Sign up" name="submitbtn" onclick="chkFormVaildation()"></p>				
			</form>
		</div>
</body>
</html>

	</body>
</html>