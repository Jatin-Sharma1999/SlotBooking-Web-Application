<?php
$db = mysqli_connect('localhost', 'root','', 'e-visa');
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['submitbt'])) {
  // receive all input values from the form
  $passportType = $_POST['passportType'];
  $nationality = $_POST['nationality'];
  $arrival = $_POST['arrival'];
  $dob =$_POST['dob'];
  $email =$_POST['eMail'];
  $arrivalDate =$_POST['arrivalDate'];
  $service = $_POST['serv'];
  $query = "INSERT INTO application VALUES ('$passportType','$nationality','$arrival','$dob','$email','$arrivalDate','$service')";
  if(mysqli_query($db, $query))
  {
	  echo "records successfully saved";
  header('location: applicantDetails.php');
  }
  else
	  echo "Not successfully saved";
	  echo "Error: " . $query . "<br>" . mysqli_error($db);
  }
  mysqli_close($db);
?>
