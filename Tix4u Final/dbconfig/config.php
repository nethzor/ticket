<?php
	$con = mysqli_connect("localhost","root","") or die("Unable to connect to database");
	mysqli_select_db($con,'projeklogin') or die("Database could not be found");
	
?>