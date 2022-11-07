<?php 
include_once('nav.php');
include_once('connection.php');

// define variables and set to empty values
$firstNameErr = $familyNameErr = $emailErr = $subscriptionErr = "";
$firstName = $familyName = $email = $monthly = $breaking = "";

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

  if ($_SERVER["REQUEST_METHOD"] == "POST")) {
	  
	$database = new Connection();
    $db = $database->open();
	
	if (empty($_POST['firstName'])) {
		$firstNameErr = "First Name is required";
	} else {
		$firstName = test_input($_POST['firstName']);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
			$firstNameErr = "Only letters and white space allowed";
		}
	}
	
	if (empty($_POST['lastName'])) {
		$lastNameErr = "Last Name is required";
	} else {
		$lastName = test_input($_POST['lastName']);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
			$lastNameErr = "Only letters and white space allowed";
		}
	}
	
	if (empty($_POST['email'])) {
		$lastNameErr = "Email is required";
	} else {
		$email = test_input($_POST['email']);
		// check that email is correctly formatted
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}
	
	if (empty($_POST['monthly'])) {
		$subscriptionErr = "Choice required";
	} else {
		$monthly = test_input($_POST['monthly']);
	}
	  
	if (empty($_POST['breaking'])) {
		$subscriptionErr = "Choice required";
	} else {
		$monthly = test_input($_POST['breaking']);
	}	

    try {
        $sql = "INSERT INTO `accounts`(`firstName`, `familyName`, `email`, `monthly`, `breaking`) VALUES ('$firstName','$lastName','$email', '$monthly', '$breaking')";
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
 * 1/11/2022
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
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  First Name: <input type="text" name="firstName">
  <span class="error">* <?php echo $firstNameErr;?></span>
  <br><br>
  Family Name: <input type="text" name="familyName">
  <span class="error">* <?php echo $familyNameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Subscriptions:
  <br>
  Monthly Newsletter:
  <input type="radio" name="newsletter" value="true">Yes
  <input type="radio" name="newsletter" value="false">No
  <span class="error">* <?php echo $subscriptionErr;?></span>
  <br>
  Breaking News:
  <input type="radio" name="breaking" value="true">Yes
  <input type="radio" name="breaking" value="false">No
  <span class="error">* <?php echo $subscriptionErr;?></span>
  <br><br>
  <input type="submit" name="signup" value="Sign Up">
</form>
</body>
</html>