<?php
  $servername = "localhost";
  $username = "atmat-adm";
  $password = "AtmatAydin2";
  $db_name = "atmat";

  $connect = new mysqli($servername, $username, $password, $db_name);

  if( $connect->connect_errno ) {
      echo 'No DB connection, error code: ' . $connect->connect_errno;
  } ;
  // new OOP connection
  $db_connect = new DB;
  $db_connect->connect('127.0.0.1','atmat','atmat-adm','AtmatAydin2');
?>