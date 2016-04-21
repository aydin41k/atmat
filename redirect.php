<?php
  $pageRef = htmlspecialchars($_GET['link']);
  switch($pageRef) {
   case 1:
     header('Location:about.php');
     break;
   case 2:
     header('Location:helpyou.php');
     break;
   case 3:
     header('Location:http://www.facebook.com/atmat.asgoa/');
     break;
   default:
     header('Location:index.php');
  }
?>