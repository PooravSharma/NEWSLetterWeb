<!DOCTYPE html>

<!--
 * Zac Purkiss 
 * P444025
 * 09.08.2022
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

	<?php
		include_once('nav.php');
	?>
	
    <div class="container">
	<form action="searchAccount.php">
      <div class="form-group">
        <input 
          type="search" 
          id="mysearch"
          name="q"
          placeholder="Search"
          />
      <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
      

	<div class="container">
	  <table class="table">
	    <thead>
		  <th>ID</th>
		  <th>First Name</th>
		  <th>Surname</th>
		  <th>E-Mail</th> <!-- if it doesn't work, check this -->
		  <th>Subscribed</th>
	    </thead>
		<tbody>
		  <?php
		    include_once('connection.php');

			$database = new Connection();
    		$db = $database->open();
			try{	
			  $sql = 'SELECT * FROM accounts';
			  foreach ($db->query($sql) as $row) {
				
				echo '<tr> <form action="searchAccount.php">';
					echo '<div class=form-group">';
					echo '<td> ' . $row['id'] . '</td>';
					echo '<td>' . $row['firstName'] . '</td>';
					echo '<td>' . $row['familyName'] . '</td>';
					echo '<td><input type="search" id="myid" name="q" value="' . $row['email'] . '"/> </td>';
					echo '<td>' . $row['subscription'] . '</td>';
					echo '<td> <button type="submit" class="btn btn-default">Delete</button></form> </td>';	
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
    
    <table class="table">
	    <thead>
          <th></th>
		  <th>E-mail</th>
		  <th>Request</th>
	    </thead>
		<tbody>
        <!-- 
 
				Form does not have .php link below
		
		-->
		  <?php
		    include_once('connection.php');

			$database = new Connection();
    		$db = $database->open();
			try{	
			  $sql = 'SELECT * FROM requests';
			  foreach ($db->query($sql) as $row) {
				
				echo '<tr> <form action=".php">';
					echo '<div class=form-group">';
					echo '<td> <input type="search" visible="false" size=1 id="myid" name="q" value="' . $row['id'] . '"/> </td>';
					echo '<td>' . $row['email'] . '</td>';
					echo '<td>' . $row['request'] . '</td>';
					echo '<td> <button type="submit" class="btn btn-default">Delete</button></form> </td>';	
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