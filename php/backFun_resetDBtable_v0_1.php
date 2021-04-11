<?php 


$db = mysqli_connect('localhost', 'root', '', 'adminman');

$truncate = mysqli_query($db, "TRUNCATE TABLE vote_event");

?>