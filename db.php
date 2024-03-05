<?php
if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1') {
    //localhost data for database
  $Lservername="localhost";
  $Lusername="root";
  $Lpassword="";
  $Ldb="Database";
} else {
    // online server data
  $Lservername="Host";
  $Lusername="Username";
  $Lpassword="Password";
  $Ldb="Database";
}


$conn= new mysqli($Lservername, $Lusername, $Lpassword, $Ldb);
    if(!$conn){
        die("Error on the Connection" . $conn->connect_error); 
    }
?>
