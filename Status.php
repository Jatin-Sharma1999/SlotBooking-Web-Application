<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<html>
	<title>Status</title>
	<head>
		<meta http-equiv="refresh" content="900;applicantPortal.html">
		<link rel="stylesheet" type="text/css" href="Status.css">
		<script>
			function chkValidation(){
				$val=document.getElementById("username").value;
				if($val==" ")
					alert("please fill username");
			}
		</script>
	</head>
	<body>
		<header>
			<div id="navBar">
				<a href="index.php">
					<img src="home.png" alt="home_page" width="25px" height="25px" style="margin-left:8px; margin-top:8px">
				</a>
				<h2 style="margin-left:44.5%; margin-top: -28px">Status of the slots</h2>
				<a href="appointment.php" style="margin-left:1200px;margin-bottom:1200px"><p style="font-size:30px">Integrate Google Page</p></a>
				</div>
		</header>
		<div id="visaform1">
			<form name="eVisaFrm" action="" method="POST">
				<table id=form1 align="center" cellpadding="5">
					<tr>
						<td>
							Username: <sup style="color:red">*</sup>
						</td>
						<td>
							<input type="text" name="username" id="username">
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							</br><input type="submit" value="Find the slots" name="submitbt" class="continue" onclick="chkValidation()">
						</td>
					</tr>
					<?php
// initializing variables
$username = "";
$date= "";
$eight="";
$nine="";
$ten="";
$eleven="";
$twelve="";
$one="";
$two="";
$three="";
$four="";
$five="";
$six="";
$saven="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'navigus');
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['submitbt'])) {
  $username=$_POST['username'];
$sql = "SELECT * FROM bookslot WHERE username='$username'";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
        $username=$row['username'];
		$date=$row['date'];
		$eight=$row['8am'];
		$nine=$row['9am'];
		$ten=$row['10am'];
		$eleven=$row['11am'];
		$twelve=$row['12pm'];
		$one=$row['1pm'];
		$two=$row['2pm'];
		$three=$row['3pm'];
		$four=$row['4pm'];
		$five=$row['5pm'];
		$six=$row['6pm'];
		$seven=$row['7pm'];
		echo"<tr><td>username: $username</td><td>date: $date</td><tr>";
		echo"<tr><td>Slots are:</td></tr>";
		if($eight=='Y')
			echo"<td>8am - 9am</td>";
		if($nine=='Y')
			echo"<td>9am - 10am</td>";
		if($ten=='Y')
			echo"<td>10am - 11am</td>";
		if($eleven=='Y')
			echo"<td>11am - 12pm</td>";
		if($twelve=='Y')
			echo"</tr><tr><td>12pm - 01pm</td>";
		if($one=='Y')
			echo"<td>01pm - 02pm</td>";
		if($two=='Y')
			echo"<td>02pm - 03pm</td>";
		if($three=='Y')
			echo"<td>03pm - 04pm</td>";
		if($four=='Y')
			echo"</tr><tr><td>04pm - 05pm</td>";
		if($five=='Y')
			echo"<td>05pm - 06pm</td>";
		if($six=='Y')
			echo"<td>06pm - 07pm</td>";
		if($seven=='Y')
			echo"<td>07pm - 08pm</td>";
		echo"</tr>";
        } 
	}
	 else{
        echo"<script>alert('No slots available for this username.');</script></table>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
}
?>
				</table>
			</form>
		</div>
	</body>
</html>