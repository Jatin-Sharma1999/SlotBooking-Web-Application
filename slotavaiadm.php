<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: loginadm.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: loginadm.php");
  }
?>
<html>
	<title>Applicant Details</title>
	<head>
		<link rel="stylesheet" type="text/css" href="applicantDetailstyle.css">
		<script>			
			function chkSubmit(){
				var d=document.getElementById("slotdate").value;
				document.getElementById("date").innerHTML = d;
			}	
		</script>
	</head>
	<body>
		<header>
			<div id="navBar">
				<a href="adminhome.php">
					<img src="home.png" alt="home_page" width="25px" height="25px" style="margin-left:8px; margin-top:8px">
				</a>
				<h2 style="margin-left:41%; margin-top: -28px">Define available Slot</h2>
			</div>
		</header>
		<?php
			include('slotavaiadm1.php');
		?>
		<div id="detailsform">
			<h4 style="color:red">Define a slot</h4>
			<form name="applicantDetailsForm" action="" method="POST">
				<table id="applicantForm" cellpadding=2>
					<tr>
						<td id="label">Date to fix the slot<sup style="color:red">*   </sup></td>
						<td><input type="date" name="slotdate" id="slotdate"></td>
					</tr>
					<tr>
						<td id="label">Username<sup style="color:red">*   </sup></td>
						<td><input type="text" name="username" id="usrname"></td>
					</tr>
					<tr align="center">
					     <td colspan="3">
						    <br><h3 id="hed">The slots on:<p id="date"></p></h3><br>
						 </td>
					</tr>
				</table>
				<table id="slots" style="border-spacing:20px;">
				<tr style="height:20px">
				<td colspan="3"><input type="checkbox" name="eight" value="Y">
                <label for="t8">8am - 9am</label>
				</td>
				<td><input type="checkbox" name="nine" value="Y">
                <label for="t9">9am - 10am</label>
				</td>
				<td><input type="checkbox" name="ten" value="Y">
                <label for="t10">10am - 11am</label>
				</td>
				</tr>
				<tr>
				<td colspan="3"><input type="checkbox" name="eleven" value="Y">
                <label for="t8">11am - 12pm</label>
				</td>
				<td><input type="checkbox" name="twelve" value="Y">
                <label for="t9">12pm - 01pm</label>
				</td>
				<td><input type="checkbox" name="one" value="Y">
                <label for="t10">01pm - 02pm</label>
				</td>
				</tr>
				<tr>
				<td colspan="3"><input type="checkbox" name="two" value="Y">
                <label for="t8">02pm - 03pm</label>
				</td>
				<td><input type="checkbox" name="three" value="Y">
                <label for="t9">03pm - 04pm</label>
				</td>
				<td><input type="checkbox" name="four" value="Y">
                <label for="t10">04pm - 05pm</label>
				</td>
				</tr>
				<tr>
				<td colspan="3"><input type="checkbox" name="five" value="Y">
                <label for="t8">05pm - 06pm</label>
				</td>
				<td><input type="checkbox" name="six" value="Y">
                <label for="t9">06pm - 07pm</label>
				</td>
				<td><input type="checkbox" name="seven" value="Y">
                <label for="t10">07pm - 08pm</label>
				</td>
				</tr>
				</table>
				<input id="submitslot" type="submit" name="submitbtn" value="OK Define Slots Available">
			</form>
		</div>
	</body>
</html>
