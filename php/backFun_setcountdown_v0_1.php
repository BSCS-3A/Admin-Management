<?php
session_start();
include('../html/front_electionConfig_v0_2.php');

$db = mysqli_connect('localhost', 'root', '', 'adminman');

function function_alert($msg) { 
      
    // Display the alert box  
    echo "<script>alert('$msg');</script>"; 
} 

//set timeframe
   if (isset($_POST['savesched'])) {

      $date=$_POST['date'];
      $dateEnd=$_POST['dateEnd'];
      $tstart= $_POST['tstart'];
      $tends= $_POST['tends'];

      if(($date == "") || ($tstart == "") || ($dateEnd == "") || ($tends == "")){
         
         function_alert("there is an empty field");
      }else{

      
            //SET TIMEFRAME
      $vtevent = "INSERT INTO vote_event (`start_date`,`end_date`) 
      VALUES('$date $tstart', '$dateEnd $tends')";
    mysqli_query($db, $vtevent);
    function_alert("saved");
      } 

   }else{
      function_alert("failed"); 
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

 }else{
    function_alert("updating 



   ?>
