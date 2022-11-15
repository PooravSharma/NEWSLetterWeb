<?php 
include_once('nav.php');
include_once('connection.php');

  if (isset($_POST['signup'])) {
	  
	$database = new Connection();
    $db = $database->open();
  
    // ucwords() converts the first character of each word to uppercase
	$firstName = ucwords($_POST['firstName']);
    $familyName = ucwords($_POST['familyName']);
    $email = $_POST['email'];
    $monthly = $_POST['monthly'];
    $breaking = $_POST['breaking'];

    try {
        $sql = "INSERT INTO `accounts`(`firstName`, `familyName`, `email`, `monthly`, `breaking`) VALUES ('$firstName','$familyName','$email', '$monthly', '$breaking')";
        $result = $db->query($sql);
		echo "New user account created";
    } catch(PDOException $e) {
        echo "'ruh roh' - scooby doo";
    }
    $database->close(); 
  }
?>

<!DOCTYPE html>

<!--
 * James Boyd 
 * 30041547
 * 15/11/2022
-->

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="index_files/style.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
.error {color: #FF0000;}
</style>
<body>
<h2>Sign Up</h2>
<div class=container>
<form method="post" action="">
  First Name: <input type="text" name="firstName" required pattern="[a-zA-Z]{1,15}" title="Names should only contain letters">
  <br><br>
  Family Name: <input type="text" name="familyName" required pattern="[a-zA-Z]{1,15}" title="Names should only contain letters">
  <br><br>
  E-mail: <input type="email" name="email" required>
  <!-- Alternate version that requires "email@something.domain" -->
  <!-- E-mail: <input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> -->
  <br>
  <h3>Subscriptions:</h3>
  Monthly Newsletter:
  <input type="radio" name="monthly" value=1 required>Yes
  <input type="radio" name="monthly" value=0 required>No
  <br>
  Breaking News:
  <input type="radio" name="breaking" value=1 required>Yes
  <input type="radio" name="breaking" value=0 required>No
  <br><br>
  <input type="submit" name="signup" value="Sign Up">
</form>
</div>
</body>
</html>