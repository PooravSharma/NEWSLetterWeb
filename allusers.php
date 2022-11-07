<!DOCTYPE html>

<!--
 * Zac Purkiss 
 * P444025
 * 09.08.2022
-->
 
<html>
<title> All Users </title>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">	
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
		   include_once('connection.php');

            $database = new Connection();
            $db = $database->open();    
			try{	
			  $sql = 'SELECT * FROM accounts';
			  foreach ($db->query($sql) as $row) {				
				echo '<tr> <form action="edituser.php">';
            		echo '<td>' . $row['id'] . '</td>';            		
            		echo '<td>' . $row['firstName'] . '</td>';
					echo '<td>' . $row['lastName'] . '</td>';
            		echo '<td>' . $row['email'] . '</td>';            		
					echo '<td>' . $row['monthly'] . '</td>';
					echo '<td>' . $row['breaking'] . '</td>';
					echo '<td> <button type="submit" class="btn btn-default">Edit</button></form> </td>';	
            	echo '</tr>';

			  }
			}
			catch(PDOException $e){
			  echo "'ruh roh' - scooby doo";
			}
			
		?>		
	</tbody>
     </table>
		  <?php

			$database->close();

			  ?>
			<!-- 
			<tr> 
				<form action="createUser.php">';
					<div class=form-group">
						<td> <button type="submit" class="btn btn-default">Create New</button></form> </td>
					</div>
            </tr>
			-->
	</div>
</body>
</html>
