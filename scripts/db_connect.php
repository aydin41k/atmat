<?php
// old functional connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "atmat";

  $connect = new mysqli($servername, $username, $password, $db_name);

  if( mysqli_connect_errno() ) {
      die('No connection, because ' . mysqli_connect_errno());
  }
// new OOP connection
  $db_connect = new DB;
  $db_connect->connect('127.0.0.1','atmat','root','');
?>