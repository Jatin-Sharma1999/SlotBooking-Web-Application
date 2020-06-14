<?php
session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'navigus');
if (isset($_POST['submitbt'])) {
  $username = mysqli_real_escape_string($db, $_POST['usr_name']);
  $password = mysqli_real_escape_string($db, $_POST['usr_pass']);
  if (count($errors) == 0) {
  	$query = "SELECT * FROM useradm WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: adminhome.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>