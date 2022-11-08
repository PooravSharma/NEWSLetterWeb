<?php
echo '<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ACME Arts</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
	  <li class="active"><a href="signup.php">Sign Up</a></li>
	  <li class="active"><a href="login.php">Log-In</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">My Account
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
		  <li><a href="subscriptions.php">Subscriptions</a></li>
        </ul>      
      </li>	  
	  <li class="active"><a href="admin.php">Admin</a></li>  
    </ul>
  </div>
</nav>';
?>