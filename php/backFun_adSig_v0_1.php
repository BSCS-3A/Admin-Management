<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'buceils_db');


session_start();


$signame = $_POST['signame'];
$sigpos = $_POST['sigpos'];
$insert = "INSERT INTO signatory_table (`signame`, `sigpos`) VALUES ('$signame', '$sigpos')";
$query = mysqli_query($connection, $insert);

echo "Signatory Saved Successfully";

?>
