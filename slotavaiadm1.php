<?php
$db = mysqli_connect('localhost', 'root','', 'navigus');
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (isset($_POST['submitbtn'])) {
  $date=$_POST['slotdate'];
  $username=$_POST['username'];
  $eight=$_POST['eight'];
  $nine=$_POST['nine'];
  $ten=$_POST['ten'];
  $eleven=$_POST['eleven'];
  $twelve=$_POST['twelve'];
  $one=$_POST['one'];
  $two=$_POST['two'];
  $three=$_POST['three'];
  $four=$_POST['four'];
  $five=$_POST['five'];
  $six=$_POST['six'];
  $seven=$_POST['seven'];
  if($eight=="")
	  $eight='N';
  $query = "INSERT INTO avaislot  VALUES ('$username','$date','$eight','$nine','$ten','$eleven','$twelve','$one','$two','$three','$four','$five','$six','$seven')";
  if(mysqli_query($db, $query))
  {
	  echo "<script>alert('ThankYou, Your slots are defined successfuly');</script>";
	  echo header('LOCATION:Statusadm.php');
  }
  else
  {
	  echo "Not successfully saved";
	  echo "Error: " . $query . "<br>" . mysqli_error($db);
  }
}
  mysqli_close($db);
?>