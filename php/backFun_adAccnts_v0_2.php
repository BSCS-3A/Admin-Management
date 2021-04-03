<?php
session_start();

// initializing variables
$errors = array();

// Create connection
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'buceils_db');

if (isset($_POST['saveAccount']) && isset($_FILES['my_image']) ) {

  $admin_lname = $_POST['admin_lname'];
  $admin_fname = $_POST['admin_fname'];
  $admin_mname = $_POST['admin_mname'];
  $username = $_POST['username'];
  $admin_position = $_POST['admin_position'];
  $comelec_position = $_POST['comelec_position'];
  $password = $_POST['password'];
  $conpassword = $_POST['conpassword'];

  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  $user_check_query = "SELECT * FROM admin_table WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
      echo "user already exists";
  }

  if (count($errors) == 0) {
    if ($img_size > 125000) {
      $em = "Sorry, your file is too large.";
      header("Location: ../html/addAdmin.php?error=$em");
    } else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png");

      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = '../uploads/' . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        //insert into database
        $query = "INSERT INTO admin_table (`admin_lname`, `admin_fname`, `admin_mname`, `username`, `admin_position`, `comelec_position`, `password`, `photo`) 
          VALUES('$admin_lname', '$admin_fname', '$admin_mname', '$username', '$admin_position', '$comelec_position', '$password', '$new_img_name')";
        mysqli_query($connection, $query);

        //For Logs
				$_SESSION['action'] = 'created Admin Account : ' . $_POST['username'];
				include 'backFun_actLogs_v0_1.php';
        
        header("Location: ../html/addAdmin.php");
      } else {
        $em = "You can't upload files of this type";
        header("Location: ../html/addAdmin.php?error=$em");
      }
    }
  } else {
    $em - "unknown error occured!";
    header("Location: ../html/addAdmin.php?error=$em");
  }
}
?>
