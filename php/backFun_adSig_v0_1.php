<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'buceils_db');


session_start();


$signame = $_POST['signame'];
$sigpos = $_POST['sigpos'];

$dup_check= "SELECT * FROM signatory_table WHERE signame='$signame' LIMIT 1";
$dup_query = mysqli_query($connection, $dup_check);
$name = mysqli_fetch_assoc($dup_query);

if ($name['signame'] === $signame) {
    array_push($errors, "Signatory already exists");
    echo "Signatory already exists";
}
else{
$insert = "INSERT INTO signatory_table (`signame`, `sigpos`) VALUES ('$signame', '$sigpos')";
$query = mysqli_query($connection, $insert);

//For Logs
$_SESSION['action'] = 'added Signatory : ' . $_POST['signame'];
include 'backFun_actLogs_v0_1.php';

echo "Signatory Saved Successfully";
}
?>
