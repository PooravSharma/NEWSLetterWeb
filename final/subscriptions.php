<!DOCTYPE html>

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
	
	
<h2>My Account</h2>	
	
	<div class="container">
    
    	<?php
            include_once('connection.php');

            $database = new Connection();
            $db = $database->open();
            $query = $_GET['q'];
            try{	
                $sql = 'SELECT * FROM accounts WHERE email=\''.$query.'\'';
				foreach ($db->query($sql) as $row) {
					if (count($row) == 0)
					{
						echo 'User not found';
						echo '<a href="login.php">Back to Log In</a>';
					}
					else
					{
						echo '<table class="table">';
						echo '<thead>';
						echo '<th>First Name</th>';
						echo '<th>Family Name</th>';
						echo '<th>E-Mail</th>';
						echo '<th>Monthly Newsletter</th>';
						echo '<th>Breaking News</th>';
						echo '<th></th>';			
						echo '</thead>';
						
						echo '<tbody>';						
						echo '<tr>';
						echo '<td>' . $row['firstName'] . '</td>';            		
						echo '<td>' . $row['familyName'] . '</td>';
						echo '<td>' . $row['email'] . '</td>';
						if ($row['monthly'] == 1)
						{
							echo '<td>Subscribed <a href="mailto: admin@tafe.com?subject=Please unsubscribe me&body=Please unsubscribe me from the Monthly Newsletter">  (Unsubscribe)</a></td>';
						}
						else
						{
							echo '<td>Unsubscribed <a href="mailto: admin@tafe.com?subject=Please subscribe me&body=Please subscribe me to the Monthly Newsletter">  (Subscribe)</a></td>';
						}
						if ($row['breaking'] == 1)
						{
							echo '<td>Subscribed <a href="mailto: admin@tafe.com?subject=Please unsubscribe me&body=Please unsubscribe me from the Breaking News Newsletter">  (Unsubscribe)</a></td>';
						}
						else
						{
							echo '<td>Unsubscribed <a href="mailto: admin@tafe.com?subject=Please subscribe me&body=Please subscribe me to the Breaking News Newsletter">  (Subscribe)</a></td>';
						}
                    	echo '<td><a href="mailto: admin@tafe.com?subject=Please delete my account&body=Please delete my account">  (Delete Account)</a></td>';
						echo '</tr>';
						echo '</tbody>';
						echo '</table>';
						
						echo '<a href="login.php">Log Out</a>';
					}
			    }
			}
			catch(PDOException $e){
				echo "'ruh roh' - scooby doo";
			}

			$database->close();
		  ?>
	</div>
</body>
</html>