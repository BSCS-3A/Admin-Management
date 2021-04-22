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
    $id= "SELECT * FROM signatory_table WHERE id = '$_POST['update_id']' ";
    $_SESSION['action'] = 'updated Signatory : ' . $id ;
    include 'backFun_adLogs_v0_1.php';


}
else
echo "Failed to Update Signatory";
