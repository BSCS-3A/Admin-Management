<?php
	//Note set actions for every functionality i.e from every functionality file
	//$_SESSION['action'] = 'Added an Account' or 'Updated an Account' or 'Set and Sent Reminder' or 'Sent last Reminder' or 'Set Signatories' or 'Set Election Time and Date'

	// Create connection
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection, 'buceils_db');

	$activity_description = $_SESSION['action'];
	date_default_timezone_set("Asia/Manila");
	$activity_date = date("Y.m.d");
	$activity_time = time();

	$admin_id = $_SESSION["admin_id"]; // removes backslashes
	$admin_id = mysqli_real_escape_string($conn, $admin_id); //escapes special characters in a string
	$query = "INSERT INTO table_name (admin_id, activity_description, activity_date, activity_time)
			  values ('$admin_id', '$activity_description', '$activity_date', 'activity_time')";

?>