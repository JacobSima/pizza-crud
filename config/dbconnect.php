<?php 
 //MySQli or PDO
  // connect to DB using MySQli
  $conn = mysqli_connect('localhost','root','jnjdeploy@1','ninja');

  // check the connection
  if(!$conn){
    echo 'Connection error: ' .mysqli_connect_error();
  }


?>