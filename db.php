 <?php
  session_start();
  require('dbinfo.php');
  $conn = mysqli_connect($dbHost, $dbUsername, $dbUserPassword); 
  mysqli_select_db($conn, $dbName);
 ?>