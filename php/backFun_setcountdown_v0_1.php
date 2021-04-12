<?php
session_start();
include('../html/front_electionConfig_v0_2.php');

$db = mysqli_connect('localhost', 'root', '', 'adminman');

function function_alert($msg) { 
      
    // Display the alert box  
    echo "<script>alert('$msg');</script>"; 
} 

$count = 0;
$res = mysqli_query($db, "SELECT * FROM vote_event");
while ($row = mysqli_fetch_array($res)) { 
$count += 1;
}

//set timeframe
if($count == 1){
   if (isset($_POST['savesched'])) {

      $date=$_POST['date'];
      $dateEnd=$_POST['dateEnd'];
      $tstart= $_POST['tstart'];
      $tends= $_POST['tends'];

  
            //SET TIMEFRAME
      $vtevent = "INSERT INTO vote_event (`start_date`,`end_date`) 
      VALUES('$date $tstart', '$dateEnd $tends')";
      mysqli_query($db, $vtevent);
      function_alert("saved");
      
       }
   }else{
      function_alert("Timeframe is already set");
   }
      


   //edit timeframe
if (isset($_POST['editsched'])) {

    $date=$_POST['date'];
    $dateEnd=$_POST['dateEnd'];
    $tstart= $_POST['tstart'];
    $tends= $_POST['tends'];

    
    //updating the table
    $edit =  "UPDATE `vote_event` SET start_date='$date $tstart', end_date='$dateEnd $tends ' WHERE vote_event_id = 1";
  mysqli_query($db, $edit);
  function_alert("updating successful"); 

 }

   ?>
