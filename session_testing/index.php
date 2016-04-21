<?php
 function activeSession($username) {
   echo 'Session has started with username <strong>'.$username.'</strong>
       <form action=logout.php method="get">
         <input type="hidden" name="logout" value="'.$username.'">
         <input type="submit" value="Logout" />
       </form>';
 }
 session_start();
 if( isset($_SESSION['username']) ) {
   activeSession($_SESSION['username']);
 }
 elseif( isset($_GET['username']) ) {
     $_SESSION['username'] = $_GET['username'];;
     activeSession($_SESSION['username']);
 }
 else {
   echo '
     <form method="get">
       <input type="text" placeholder="Username" name="username" />
       <input type="submit" value="Start sesson" />
     </form>
   ';
 }
?>

