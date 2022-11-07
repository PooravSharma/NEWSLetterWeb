<?php 
include_once('nav.php');
include_once('connection.php');

// define variables and set to empty values
$emailErr = "";
$email = "";

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

  if ($_SERVER["REQUEST_METHOD"] == "POST")) {
	  
	$database = new Connection();
    $db = $database->open();
	
	$email = $_POST('email');
	
	if (empty($_POST['email'])) {
		$lastNameErr = "Email is required";
	} else {
		$email = test_input($_POST['email']);
		// check that email is correctly formatted
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}

    try {
        $sql = "SELECT * `accounts` WHERE `email` = '$email'";
        $result = $db->query($sql);
		echo "Logged in";
    } catch(PDOException $e) {
        echo "User not found";
    }
    $database->close();
  }	  
?>

<!DOCTYPE html>

<!--
 * James Boyd 
 * 30041547
 * 7/11/2022
-->

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Home</title>
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
<h2>Log In</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" name="login" value="Log In">
</form>
<a href="signup.php">Sign Up</a>
</form>
</body>
</html>