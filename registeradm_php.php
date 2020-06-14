<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'navigus');

// REGISTER USER
if (isset($_POST['submitbtn'])) {
  // receive all input values from the form
  $first = mysqli_real_escape_string($db, $_POST['first_name']);
  $middle = mysqli_real_escape_string($db, $_POST['mid_name']);
  $last = mysqli_real_escape_string($db, $_POST['last_name']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $email = mysqli_real_escape_string($db, $_POST['eMail']);
  $mobile = mysqli_real_escape_string($db, $_POST['mob']);
  $username = mysqli_real_escape_string($db, $_POST['usrNm']);
  $password = mysqli_real_escape_string($db, $_POST['usrpass']);

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM useradm WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO useradm VALUES('$first','$middle','$last','$gender','$dob','$email','$mobile','$username','$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $usernamez;
	$_SESSION['email']= $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: loginadm.php');
  }
  }
?>