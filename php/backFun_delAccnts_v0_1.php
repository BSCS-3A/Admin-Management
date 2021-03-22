<?php
//Change file name to delete.php before using
	session_start();

    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'buceils_db');


        if (isset($_POST['yes_delete'])) {

                $admin_id = $_POST['Delete_ID'];
				$query = "DELETE FROM admin_table WHERE admin_id ='$admin_id'";
				$query_run = mysqli_query($connection, $query);
                
                if ($query_run) {
 		//For Logs
		$username = "SELECT username FROM admin_table WHERE admin_id='$admin_id'";
		$_SESSION['action'] = 'deleted Admin Account : ' . $username;
		include 'backFun_actLogs_v0_1.php';
			
                    echo '<script type="text/javascript"> alert("Data Deleted"); </script>';
                    header("Location: ../html/addAdmin.php");
                }
                else{
                    $_SESSION['message'] = 'Record has not been deleted!';
                    $_SESSION['msg_type'] = 'danger';
                    header("Location: ../html/addAdmin.php");
                }        
        }
?>
