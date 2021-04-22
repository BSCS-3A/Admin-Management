<?php
//Change file name to edit.php before using
session_start();

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'buceils_db');

if (isset($_POST['updateData'])) {

    $admin_lname = $_POST['admin_lname'];
    $admin_fname = $_POST['admin_fname'];
    $admin_mname = $_POST['admin_mname'];
    $username = $_POST['username'];
    $admin_position = $_POST['admin_position'];
    $comelec_position = $_POST['comelec_position'];
    $password = $_POST['password'];

    $user_id = $_POST['update_id'];
    // UPDATE USER DATA               
    $query = "UPDATE `admin_table` SET admin_lname='$admin_lname', admin_fname='$admin_fname', admin_mname='$admin_mname', username='$username', 
                admin_position='$admin_position', comelec_position='$comelec_position' , password='$password' 
                WHERE admin_id='$user_id' ";
    $query_run = mysqli_query($connection, $query);
    //CHECK DATA UPDATED OR NOT
    if ($query_run) {
       //For Logs
       $_SESSION['action'] = 'updated Admin Account : ' . $_POST['username'];
       include 'backFun_adLogs_v0_1.php';
        
        header("Refresh: 0; ../html/addAdmin.php");
        echo "<script>
          alert('Data Updated');
          </script>";
        die;
    } else {
        echo "<h3>Oops something wrong!</h3>";
    }
}
