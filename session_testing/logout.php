<?php
 $goBack = '<a href="index.php">Click to go back to login</a><br />';
 session_start();
 if( isset($_SESSION['username']) == isset($_GET['logout']) ) {
    session_unset();
    session_destroy();
    echo 'Session ended.<br />'.$goBack;
 }
 else {
  echo 'No user to log out.<br />'.$goBack;
 }
?>