<?php

// Create connection
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'buceils_db');

//For Logs
session_start();

if(isset($_POST['saveAccount']) && isset($_FILES['my_image'])){
  
  $admin_lname = $_POST['admin_lname'];
  $admin_fname = $_POST['admin_fname'];
  $admin_mname = $_POST['admin_mname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $conpassword = $_POST['conpassword'];

  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  if ($error === 0){
    if ($img_size > 125000){
      $em = "Sorry, your file is too large.";
      header("Location: ../html/addAdmin.php?error=$em");
    }else{
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png");

      if(in_array($img_ex_lc, $allowed_exs)){
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = '../uploads/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        //insert into database
        $query = "INSERT INTO admin_table (`admin_lname`, `admin_fname`, `admin_mname`, `username`, `password`, `photo`) 
          VALUES('$admin_lname', '$admin_fname', '$admin_mname', '$username', '$password', '$new_img_name')";
				mysqli_query($connection, $query);
	      
	      			//For Logs
				$_SESSION['action'] = 'created Admin Account : ' . $_POST['username'];
				include 'backFun_actLogs_v0_1.php';
	      			
				header("Location: ../html/addAdmin.php");
      }else{
        $em = "You can't upload files of this type";
        header("Location: ../html/addAdmin.php?error=$em");
      }
    }
  }else{
    $em - "unknown error occured!";
    header("Location: ../html/addAdmin.php?error=$em");
  }
/*
  $query = "INSERT INTO admin_table (`admin_lname`, `admin_fname`, `admin_mname`, `username`, `password`) VALUES ('$admin_lname', '$admin_fname', '$admin_mname', '$username', '$password')";
  $query_run = mysqli_query($connection, $query);

  if($query_run){
    echo '<script> alert("Data Saved"); </script>';
    header('Location: ../html/addAdmin.php');
    //For Logs
    $_SESSION['action'] = 'Added an Account for ' . $_POST['username'];
    include 'backFun_adLogs.php';
  }
  else{
    echo '<script> alert("Data Not Saved"); </script>';
  }
*/
}

/*
if(isset($_POST['saveAccount'])){
  $id = $_POST['admin_id'];

  $query = "UPDATE INTO `admin_table` SET admin_lname='$_POST[admin_lname]',admin_fname='$_POST[admin_fname]',admin_mname='$_POST[admin_mname]',username='$_POST[username]',password='$_POST[password]') where id='$_POST[admin_id]'";
  $query_run = mysqli_query($connection, $query);

  if($query_run){
    echo '<script type="text/javascript"> alert("Data Updated"); </script>';
    header('Location: ../html/addAdmin.php');
  }
  else{
    echo '<script type="text/javascript"> alert("Data Not Updated"); </script>';
  }
}


if(isset($_GET['admin_id']) && is_numeric($_GET['admin_id'])){
    
  $userid = $_GET['admin_id'];
  $get_user = mysqli_query($conn,"SELECT * FROM `admin_table` WHERE id='$userid'");
  
  if(mysqli_num_rows($get_user) === 1){
      
      $row = mysqli_fetch_assoc($get_user);

  }
}

if(isset($_POST['updateData'])){

  $admin_lname = $_POST['admin_lname'];
  $admin_fname = $_POST['admin_fname'];
  $admin_mname = $_POST['admin_mname'];
  $username = $_POST['username'];
  $password = $_POST['password'];

      $user_id = $_GET['admin_id'];
      // UPDATE USER DATA               
      $update_query = mysqli_query($connection,"UPDATE `admin_table` SET admin_lname='$admin_lname', admin_fname='$admin_fname', admin_mname='$admin_mname', username='$username', password='$password' WHERE id=$user_id");

      //CHECK DATA UPDATED OR NOT
      if($update_query){
          echo "<script>
          alert('Data Updated');
          window.location.href = '../html/addAdmin.php';
          </script>";
          exit;
      }else{
          echo "<h3>Oops something wrong!</h3>";
      }

  

}
*/
?>
