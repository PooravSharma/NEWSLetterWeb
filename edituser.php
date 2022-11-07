<!--
 * James Boyd 
 * 30041547
-->

<?php 
include_once('nav.php');
include_once('connection.php');

$database = new Connection();
$db = $database->open();

if (isset($_POST['update'])) {
	$database = new Connection();
    $db = $database->open();
  	$id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $monthly = $_POST['monthly'];
	$breaking = $_POST['breaking'];

    try {
        $sql = 'UPDATE accounts 
				SET firstName=\''.$firstName.'\', familyName=\''.$familyName.'\', email=\''.$email.'\', monthly=\''.$monthly.'\', breaking=\''.$breaking.'\'  
				WHERE id=\''.$id.'\'';
        $result = $db->query($sql);
		echo "'Update successful'";
    } catch(PDOException $e) {
        echo "'ruh roh' - scooby doo";
    }
    $database->close(); 
}
else if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	  
	try{
		$sql = 'DELETE FROM accounts WHERE id=\''.$id.'\'';
		$result = $db->query($sql);
		echo "'Delete successful'";
	} catch(PDOException $e){
		echo "'ruh roh' - scooby doo";
	}
	$database->close();
}
?>

<!DOCTYPE html>
 
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Edit User</title>
	<link rel="stylesheet" type="text/css" href="index_files/style.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
<table class="table">
<thead>
<th>ID</th>
<th>First Name</th>
<th>Family Name</th>
<th>Email</th>
<th>Monthly Newsletter</th>
<th>Breaking News</th>
</thead>
		<tbody>
		  <?php
			  foreach ($db->query($sql) as $row) {
				echo '<tr><form action="" method="POST">';
				echo '<td> <input type="search" readonly=true size=1 id="myid" name="id" value="' . $row['id'] . '"/> </td>';
            	echo '<td> <input type="text" size=10 id="myfirstname" name="firstName" value="' . $row['firstName'] . '"/> </td>';
            	echo '<td> <input type="text" size=10 id="myfamilyname" name="familyName" value="' . $row['familyName'] . '"/> </td>';
            	echo '<td> <input type="text" size=10 id="myemail" name="email" value="' . $row['email'] . '"/> </td>';
            	echo '<td> <input type="text" size=15 id="mymonthly" name="monthly" value="' . $row['monthly'] . '"/> </td>';
            	echo '<td> <input type="text" size=10 id="mybreaking" name="breaking" value="' . $row['breaking'] . '"/> </td>';	
				echo '<td> <input type="submit" size=10 name="update" value="Update"></form></td>';
            	echo '</tr>';
				
				echo '<tr> <form action="" method="POST">';
				echo '<div class=form-group">';
				echo '<td> <input type="search" hidden=true size=1 id="myid" name="id" value="' . $row['id'] . '"/> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td></div>';
				echo '<td> <input type="submit" size=10 name="delete" value="Delete"></form></td>';			
            	echo '</tr>';
			  }
			}
			catch(PDOException $e){
			  echo "'ruh roh' - scooby doo";
			}

			$database->close();
		  ?>
		</tbody>
	  </table>
	</div>
</body>
</html>