<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'buceils_db');

$sigfname = (isset($_POST['signatory_fname']) ? $_POST['signatory_fname'] : '');
$siglname = (isset($_POST['signatory_lname']) ? $_POST['signatory_lname'] : '');
$sigpos = (isset($_POST['signatory_position']) ? $_POST['signatory_position'] : '');
$file = file_get_contents('../php/sig_array.json');
$decode = json_decode($file, true);

$fname_query = "SELECT * FROM admin_table WHERE admin_fname = '$sigfname'";
$lname_query = "SELECT * FROM admin_table WHERE admin_lname = '$siglname'";
$position_query = "SELECT * FROM admin_table WHERE comelec_position = '$sigpos'";

$fname_query_run = mysqli_query($connection, $fname_query);
$lname_query_run = mysqli_query($connection, $lname_query);
$position_query_run = mysqli_query($connection, $position_query);

if(mysqli_num_rows($fname_query_run) >0){
  if(mysqli_num_rows($lname_query_run) >0){
    if(mysqli_num_rows($position_query_run) >0){

      $sql = "SELECT * FROM admin_table WHERE admin_lname ='$siglname'";
      $result = mysqli_query($connection,$sql);
      if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        $source = $row['admin_id'];
        $id = explode(",",$decode);
        $id = array_filter($id);
        $key = array_search($source, $id);
        unset($id[$key]);
        $string = implode (", ", $id);
        $encodedString = json_encode($string);
        file_put_contents('sig_array.json',($encodedString));
        echo"<script language='javascript'>
        alert('Signatory Deleted');
        </script>
        ";

        }
      }
    }
  }
}

?>
