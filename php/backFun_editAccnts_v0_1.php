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
    $password = $_POST['password'];

    $user_id = $_POST['update_id'];
    // UPDATE USER DATA               
    $query = "UPDATE `admin_table` SET admin_lname='$admin_lname', admin_fname='$admin_fname', admin_mname='$admin_mname', username='$username', password='$password' 
            WHERE admin_id='$user_id' ";
    $query_run = mysqli_query($connection, $query);
    //CHECK DATA UPDATED OR NOT
    if ($query_run) {
         //For Logs
        $_SESSION['action'] = 'updated Admin Account : ' . $user_id;
        include 'backFun_actLogs_v0_1.php';
        
        echo "<script>
          alert('Data Updated');
          window.location.href = '../html/addAdmin.php';
          </script>";
        exit;
    } else {
        echo "<h3>Oops something wrong!</h3>";
    }
}
