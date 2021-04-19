<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'buceils_db');

session_start();


 $id = (isset($_POST['Delete_ID']) ? $_POST['Delete_ID'] : '');
$delete = "DELETE FROM signatory_table WHERE id ='$id'";
$query = mysqli_query($connection, $delete);

if($query){
echo "Signatory Deleted Successfully";
}
else
echo "Failed to Delete Signatory";
?>
