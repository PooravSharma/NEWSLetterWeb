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

if (isset($_POST['update'])) {
	$database = new Connection();
    $db = $database->open();
  	$id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $familyName = $_POST['familyName'];
    $email = $_POST['email'];
    $monthly = $_POST['monthly'];
	$breaking = $_POST['breaking'];
	$deleted = $_POST['deleted'];

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
		  <th></th>
		  <th>First Name</th>
		  <th>Family Name</th>
		  <th>E-Mail</th>
		  <th>Monthly Newsletter</th>
       	  <th>Breaking News</th>
          <th></th>
        
	    </thead>
		<tbody>
		  <?php
			  foreach ($db->query($sql) as $row) {
				echo '<tr><form action="" method="POST">';
				echo '<td> <input type="search" hidden=true size=1 id="myid" name="id" value="' . $row['id'] . '"/> </td>';
            	echo '<td> <input type="text" readonly=true size=10 id="myfirstname" name="firstName" value="' . $row['firstName'] . '"/> </td>';
            	echo '<td> <input type="text" readonly=true size=10 id="myfamilyname" name="familyName" value="' . $row['familyName'] . '"/> </td>';
            	echo '<td> <input type="text" readonly=true size=15 id="myemail" name="email" value="' . $row['email'] . '"/> </td>';
            	echo '<td> <input type="text" readonly=true size=1 id="mymonthly" name="monthly" value="' . $row['monthly'] . '"/> </td>';
                echo '<td> <input type="text" readonly=true size=1 id="mybreaking" name="breaking" value="' . $row['breaking'] . '"/> </td>';
                echo '<td><a href="mailto:admin@tafe.com? &subject=Please unsubscribe me">Unsubscribe</a></td>';
            	echo '</tr>';
              
                echo '<tr> <form action="" method="POST">';
				echo '<div class=form-group">';
				echo '<td> <input type="search" hidden=true size=1 id="myid" name="id" value="' . $row['id'] . '"/> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
            	echo '<td> </td>';
                echo '<td> </td>';
            	echo '<td> </td></div>';
                echo '<td><a href="mailto:admin@tafe.com? &subject=Please delete my account">Delete my account</a></td>';	
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