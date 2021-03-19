<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'buceils_db');


session_start();


$signame = $_POST['signame'];
$sigpos = $_POST['sigpos'];
$insert = "INSERT INTO signatory_table (`signame`, `sigpos`) VALUES ('$signame', '$sigpos')";
$query = mysqli_query($connection, $insert);

//For Logs
$_SESSION['action'] = 'added Signatory : ' . $_POST['signame'];
include 'backFun_adLogs_v0_1.php';

echo "Signatory Saved Successfully";

?>
