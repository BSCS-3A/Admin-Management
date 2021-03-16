<?php
	//Note set actions for every functionality i.e from every functionality file add and update the code below this line
	//$_SESSION['action'] = 'Added an Account' or 'Updated an Account' or 'Set and Sent Reminder' or 'Sent last Reminder' or 'Set Signatories' or 'Set Election Time and Date'

	// Create connection
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection, 'buceils_db');

	$activity_description = $_SESSION['action'];
	unset($_SESSION["action"]);

	$username = stripslashes($_SESSION["username"]); // removes backslashes
	unset($_SESSION["username"]);

	$admin_id =  mysqli_real_escape_string($connection, $username); //escapes special characters in a string
	$query = "INSERT INTO activity_log (username, activity_description)
			  values ('$username', '$activity_description')";

	mysqli_query($connection, $query);
?>
