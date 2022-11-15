<?php 
include_once('nav.php');
include_once('connection.php');

$email = $password = "";


  if (isset($_POST['login'])) {
	  
	$database = new Connection();
    $db = $database->open();
	
	$email = $_POST['email'];

    try {
        $sql = "SELECT * `accounts` WHERE `email` = '$email'";
        $result = $db->query($sql);
		echo "Logged in";
    } catch(PDOException $e) {
        echo "User not found";
    }
    $database->close();
  }	  
  
  else if (isset($_POST['admin'])) {
	  
	$database = new Connection();
    $db = $database->open();
	
	$password = $_POST['password'];
	
	if ($password == "admin")
	{
		header("Location: admin.php", true, 301);
		exit();
	}
	else 
	{
		echo "Admin password incorrect";
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

<div class="container">
	<form action="subscriptions.php">
      <div class="form-group">
        <input 
          type="email" 
          id="mylogin"
          name="q"
          placeholder="Email Address"
		  required
          />
      <button type="submit" name="login" class="btn btn-default">Submit</button>
      </form>
    </div>
<a href="signup.php">Sign Up</a>
</form>
</div>
<br>

<div class="container">
	<form action="" method="POST">
      <div class="form-group">
        <input 
          type="text" 
          id="myadmin"
          name="password"
          placeholder="Admin Password"
		  required
          />
      <button type="submit" name="admin" class="btn btn-default">Admin</button>
      </form>
    </div>
</form>
</div>
</body>
</html>