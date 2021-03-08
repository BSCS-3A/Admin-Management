<?php

// Create connection
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'buceils_db');

if(isset($_POST['saveAccount'])){
  $admin_lname = $_POST['admin_lname'];
  $admin_fname = $_POST['admin_fname'];
  $admin_mname = $_POST['admin_mname'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "INSERT INTO admin_table (`admin_lname`, `admin_fname`, `admin_mname`, `username`, `password`) VALUES ('$admin_lname', '$admin_fname', '$admin_mname', '$username', '$password')";
  $query_run = mysqli_query($connection, $query);

  if($query_run){
    echo '<script> alert("Data Saved"); </script>';
    header('Location: ../html/addAdmin.html');
  }
  else{
    echo '<script> alert("Data Not Saved"); </script>';
  }
}

?>