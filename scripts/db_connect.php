<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "atmat";

  $connect = new mysqli($servername, $username, $password, $db_name);

  if( mysqli_connect_errno() ) {
      die('No connection, because ' . mysqli_connect_errno());
  } 
?>