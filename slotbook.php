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
	<title>Applicant Details</title>
	<head>
		<link rel="stylesheet" type="text/css" href="applicantDetailstyle.css">
		<script>			
			function disableTag(){
				document.getElementById("secondIssuePassport").disabled = true;
				document.getElementById("newName").disabled = true;
			}
			
			function chkApplicantValiation(){ /* Validating form for Applicant details. */
				var dates = document.getElementById("dates").value;				
				dates = new Date(dates);
				var currDate = new Date();
			
			    if(!Date.parse(dates)){
					alert("Please enter your");
				}
				else if((dates <= currDate)){
					alert("Invalid date of slot");
					document.getElementById("dates").value = "";
				}
				else{

				}
			}	
		</script>
	</head>
	<body onload="disableTag()">
		<header>
			<div id="navBar">
				<a href="index.php">
					<img src="home.png" alt="home_page" width="25px" height="25px" style="margin-left:8px; margin-top:8px">
				</a>
				<h2 style="margin-left:41%; margin-top: -28px">Book a Slot</h2>
			</div>
		</header>
		<?php
			include('slotbook1.php');
		?>
		<div id="detailsform">
			<h4 style="color:red">Book a slot</h4>
			<form name="applicantDetailsForm" action="" method="POST">
				<table id="applicantForm" cellpadding=2>
					<tr>
						<td id="label">Date to fix the slot<sup style="color:red">*   </sup></td>
						<td><input type="date" name="dates" id="dates"></td>
					</tr>
					<tr align="center">
						<td colspan="2">
							</br><input type="submit" name="submitbtn" value="Continue" class="continue" onclick="chkAddressDetails()">
						</td>
					</tr>
				</table>
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
if (isset($_POST['submitbtn'])) {
  $date=$_POST['dates'];
  $_SESSION["date"] = "date";
  echo"<table id='applicantForm'>";
$sql = "SELECT * FROM avaislot WHERE date='$date'";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){
		echo"<div style='color:white;' id='ins'><p>Please select only one username checkbox under which you want to book slot. Its mandatory</p></div>";
		while($row = mysqli_fetch_assoc($result)){
        $username=$row['username'];
		$date=$row['Date'];
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
		echo"<tr><th><input type='checkbox' name='username' value='$username'><label for='t8'><strong>$username</strong></label></th></tr>";
		echo"<td><input type='text' style='visibility:hidden;' name='date' value=$date readonly></td></tr>";
		if($eight=='Y')
			echo"<tr><td><input class='dis' type='checkbox' name='eight' value='Y'><label for='t8'>8am - 9am</label></td>";
		if($nine=='Y')
			echo"<td><input class='dis' type='checkbox' name='nine' value='Y'><label for='t9'>9am - 10am</label></td>";
		if($ten=='Y')
			echo"<td><input class='dis' type='checkbox' name='ten' value='Y'><label for='t10'>10am - 11am</label></td>";
		if($eleven=='Y')
			echo"<td><input class='dis' type='checkbox' name='eleven' value='Y'><label for='t11'>11am - 12pm</label></td>";
		if($twelve=='Y')
			echo"</tr><tr><td><input class='dis' type='checkbox' name='twelve' value='Y'><label for='t12'>12pm - 01pm</label></td>";
		if($one=='Y')
			echo"<td><input class='dis' type='checkbox' name='one' value='Y'><label for='t1'>01pm - 02pm</label></td>";
		if($two=='Y')
			echo"<td><input class='dis' type='checkbox' name='two' value='Y'><label for='t2'>02pm - 03pm</label></td>";
		if($three=='Y')
			echo"<td><input class='dis' type='checkbox' name='three' value='Y'><label for='t3'>03pm - 04pm</label></td>";
		if($four=='Y')
			echo"</tr><tr><td><input class='dis' type='checkbox' name='four' value='Y'><label for='t4'>04pm - 05pm</label></td>";
		if($five=='Y')
			echo"<td><input class='dis' type='checkbox' name='five' value='Y'><label for='t5'>05pm - 06pm</label></td>";
		if($six=='Y')
			echo"<td><input class='dis' type='checkbox' name='six' value='Y'><label for='t6'>06pm - 07pm</label></td>";
		if($seven=='Y')
			echo"<td><input class='dis' type='checkbox' name='seven' value='Y'><label for='t7'>07pm - 08pm</label></td>";
		echo"</tr>";
        } 
		echo"<tr><td><input type='submit' name='submitslot' id='bookslot' value='OK Book Slots'></td></tr></table>";
	}
	 else{
        echo"<script>alert('No slots available for this date. Please choose another date.');</script></table>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
}
?>
			</form>
		</div>
	</body>
</html>
