<?php
session_start();
include('../html/front_electionConfig_v0_2.php');

$db = mysqli_connect('localhost', 'root', '', 'adminman');

function function_alert($msg) { 
      
    // Display the alert box  
    echo "<script>alert('$msg');</script>"; 
} 

   //edit timeframe
if (isset($_POST['editsched'])) {
      
     $truncate = mysqli_query($db, "TRUNCATE TABLE vote_event"); 

    $date=$_POST['date'];
    $dateEnd=$_POST['dateEnd'];
    $tstart= $_POST['tstart'];
    $tends= $_POST['tends'];

    
    //updating the table
     $vtevent = "INSERT INTO vote_event (`start_date`,`end_date`) 
      VALUES('$date $tstart', '$dateEnd $tends')";
      mysqli_query($db, $vtevent);
  function_alert("updating successful"); 

 }

   ?>
