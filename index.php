<?php 
    session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Online booking slot</title>
		<link rel="stylesheet" type="text/css" href="mainstyle.css">
		<script type="text/javascript">
			function showTime(){			
				//Date
				var mydate = new Date();
				var year = mydate.getYear();
				if(year < 1000){
					year += 1900;
				}
				var day = mydate.getDay();
				var month = mydate.getMonth();
				var daym = mydate.getDate();
				var dayarray = new Array("Sunday,", "Monday,", "Tuesday,", "Wednesday,", "Thursday,", "Friday,", "Saturday,");
				var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
				
				//Time
				var currentTime = new Date();
				var h = currentTime.getHours();
				var m = currentTime.getMinutes();
				var s = currentTime.getSeconds();
				if(h == 24){
					h = 0;
				}
				else if(h > 12){
					h = h - 0;
				}
				
				if(h < 10){
					h = "0" + h;
				}
				
				if(m < 10){
					m = "0" + m;
				}
				
				if(s < 10){
					s = "0" + s;
				}
				
				var myClock = document.getElementById("clockDisplay");
				myClock.textContent = "" + dayarray[day] + " " + daym + " " + montharray[month] + " " + year + "\n" + h + ":" + m + ":" + s;
				myClock.innerText = "" + dayarray[day] + " " + daym + " " + montharray[month] + " " + year + "\n" + h + ":" + m + ":" + s;
				setTimeout("showTime()", 1000);
			}
			showTime();
		</script>
	</head>
	<body onload="showTime();">
		<header>
			<div class="mainHead">
				<ul class="general">
					<li><a href="index.php">Home</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
				<?php
				 if(isset($_SESSION['username'])){
				?>
				<ul class="user">
					<li><a href="logout.php">Logout</a></li>
				</ul>
				<?php
				}else{
				?>
				<ul class="user">
					<li><a href="noticelog.html">Login</a></li>
					<li><a href="notice.html">Sign up</a></li>
				</ul>
				<?php
				}
				?>
			</div>
		</header></br>
		<div id="clockDisplay"></div>
		<p align="center" id="flag" style="font-size:30;margin-top:40px; color:#660000"><b>A Portal to book a slot</b></p>
		<div class="calimg">
		     <img src="pushing.jpg">
		</div>
		<div class="fillUp">
			<a href="slotbook.php" class="btn">Click here to book a slot</a>
			<a href="inst.html" class="btn">Click here to define available slots</a>
		</div>
		<footer>
			<div class="mainFoot">
				<p align="center" style="font-size:12px; color: white; margin-top:-38px">
				   <br>
					Content managed by Jatin Sharma</br>
					Designed & Developed by Jatin</br>
					Updated as on Jun 12, 2020
				</p>
			</div>
		</footer>
	</body>
</html>