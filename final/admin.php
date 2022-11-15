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
	<form action="edituser.php">
      <div class="form-group">
        <input 
          type="search" 
          id="mysearch"
          name="q"
          placeholder="Search"
          />
      <button type="submit" class="btn btn-default">Submit</button>
      </form>
    <form action="" method="POST">
      <div class="form-group">
      <button type="submit" name="all" class="btn btn-default">All Users</button>
      </form>
    <form action="" method="POST">
      <div class="form-group">
      <button type="submit" name="monthly" class="btn btn-default">Monthly Newsletter Subscribers</button>
      </form>
    <form action="" method="POST">
      <div class="form-group">
      <button type="submit" name="breaking" class="btn btn-default">Breaking News Subscribers</button>
      </form>
    </div>
	<div class="container">	
	 <table class="table">
	    <thead>
		  <th></th>
		  <th>First Name</th>
		  <th>Family Name</th>
		  <th>Email</th>
		  <th>Monthly Newsletter</th>	
		  <th>Breaking News</th>	
       	  <th>Deleted</th>	
	    </thead>
		<tbody>
		  <?php
		   include_once('connection.php');

            $database = new Connection();
            $db = $database->open();    
        	$sql = "";
        
            if (isset($_POST['monthly']))
            {
                $sql = 'SELECT * FROM accounts WHERE monthly=1';
            }
            else if (isset($_POST['breaking']))
            {
                $sql = 'SELECT * FROM accounts WHERE breaking=1';
            }
            else
            {
                $sql = 'SELECT * FROM accounts';
            }
			try{            
			  foreach ($db->query($sql) as $row) {				
				echo '<tr> <form action="edituser.php">';
            		echo '<td></td>';
              		echo '<div class=form-group">';
            		echo '<td>' . $row['firstName'] . '</td>';
					echo '<td>' . $row['familyName'] . '</td>';
            		echo '<td> <input type="text" readonly=true size=20 id="myemail" name="q" value="' . $row['email'] . '"</td>';            		
					if ($row['monthly'] == 1)
					{
						echo '<td>Yes</td>';
					}
					else
					{
						echo '<td>No</td>';
					}
					if ($row['breaking'] == 1)
					{
						echo '<td>Yes</td>';
					}
					else
					{
						echo '<td>No</td>';
					}
					if ($row['deleted'] == 1)
					{
						echo '<td>Yes</td>';
					}
					else
					{
						echo '<td>No</td>';
					}
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
