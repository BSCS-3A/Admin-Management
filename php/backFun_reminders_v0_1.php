<?php 

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\composer\vendor\autoload.php';
$db = mysqli_connect('localhost', 'root', '', 'admin_man');
$reminders = mysqli_query($db, "SELECT * FROM student WHERE voting_status = 'not yet voted'");

$mail = new PHPMailer(TRUE);
	
 
   while ($row = mysqli_fetch_array($reminders)) { 

     try {

      $mail->setFrom('buceilshighschool@gmail.com', 'BUCEILS');
      $mail->addAddress($row['email']);
      $mail->Subject = 'BUCEILS ELECTION SCHEDULE';
      $mail->Body = 'Reminders';
      
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


?>