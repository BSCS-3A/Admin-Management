<?php 

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';
$db = mysqli_connect('localhost', 'root', '', 'admin_man');
$reminders = mysqli_query($db, "SELECT * FROM student WHERE voting_status = 'not yet voted'"); // pa edit na lang depende kung ano database na gamit

$mail = new PHPMailer(TRUE);
	
 
   while ($row = mysqli_fetch_array($reminders)) { 

     try {

      $mail->setFrom('buceilshighschool@gmail.com', 'BUCEILS');
      $mail->addAddress($row['email']);// pa edit na lang depende kung ano database na gamit
      $mail->Subject = 'BUCEILS ELECTION SCHEDULE';
      $mail->Body = 'Reminders'; //pa edit na lang nung dapat na nakasulat
      
      /* SMTP parameters. */
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = TRUE;
      $mail->SMTPSecure = 'tls';
      $mail->Username = 'buceilshighschool@gmail.com';
      $mail->Password = 'aacbysxikqgbrdfl';
      $mail->Port = 587;
   
         /* Enable SMTP debug output. */
        // $mail->SMTPDebug = 4;
      
      /* Disable some SSL checks. */
      $mail->SMTPOptions = array(
         'ssl' => array(
         'verify_peer' => false,
         'verify_peer_name' => false,
         'allow_self_signed' => true
         )
      );
      
     
     
   }
   catch (Exception $e)
   {
      echo $e->errorMessage();
   }
   catch (\Exception $e)
   {
      echo $e->getMessage();
   }
}
/* Finally send the mail. */
   $mail->send();    

   //For Logs
   $_SESSION['action'] = 'sent Last Reminders. ';
   include 'backFun_adLogs_v0_1.php';

?>
