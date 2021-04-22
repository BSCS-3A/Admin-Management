<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'buceils_db');

session_start();



$id = (isset($_POST['update_id']) ? $_POST['update_id'] : '');
$signame = $_POST['signame'];
$sigpos = $_POST['sigpos'];
$update = "UPDATE signatory_table SET signame ='$signame', sigpos='$sigpos' WHERE id ='$id' ";
$query = mysqli_query($connection, $update);

if($query){
echo "Signatory Updated Successfully";
    //For Logs
    $_SESSION['action'] = 'updated Signatory : ' . $_POST['signame'] ;
    include 'backFun_actLogs_v0_1.php';


}
else
echo "Failed to Update Signatory";
