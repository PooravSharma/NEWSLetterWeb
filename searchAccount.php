<!--
 * James Boyd 
 * 30041547
 * 18/10/2022
-->

<?php 
include_once('nav.php');
include_once('connection.php');

$database = new Connection();
$db = $database->open();

if (isset($_POST['delete'])) {
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

<!--
 * James Boyd 
 * 30041547
 * 18/10/2022
-->
 
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="index_files/style.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
    
    	<?php
            include_once('connection.php');

            $database = new Connection();
            $db = $database->open();
            $query = $_GET['q'];
            try{	
              $sql = 'SELECT * FROM accounts WHERE email=\''.$query.'\'';
              foreach ($db->query($sql) as $row) {
                
            }
        ?>
	  <table class="table">
	    <thead>
		  <th>ID</th>
		  <th>First Name</th>
		  <th>Surname</th>
		  <th>E-Mail</th>
		  <th>Subscription</th>
        
	    </thead>
		<tbody>
		  <?php
			  foreach ($db->query($sql) as $row) {
				echo '<tr><form action="" method="POST">';
				echo '<td> <input type="search" readonly=true size=1 id="myid" name="id" value="' . $row['id'] . '"/> </td>';
            	echo '<td> <input type="text" readonly=true size=22 id="mytitle" name="title" value="' . $row['firstName'] . '"/> </td>';
            	echo '<td> <input type="text" readonly=true size=1 id="myyear" name="year" value="' . $row['familyName'] . '"/> </td>';
            	echo '<td> <input type="text" readonly=true size=10 id="mymedia" name="media" value="' . $row['email'] . '"/> </td>';
            	echo '<td> <input type="text" readonly=true size=15 id="myartist" name="artist" value="' . $row['subscription'] . '"/> </td>';
				echo '<td> <input type="submit" size=10 name="delete" value="Delete"></form></td>';
            	echo '</tr>';
				
				echo '<tr> <form action="" method="POST">';
				echo '<div class=form-group">';
				echo '<td> <input type="search" hidden=true size=1 id="myid" name="id" value="' . $row['id'] . '"/> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td></div>';	
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