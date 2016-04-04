<?php
class Session {
  public function startSession($username) {
    global $db_connect;
    $user = $db_connect->dbQuery("users","nickname = '$username'");
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $user[0]['id'];
    $_SESSION['rank'] = $user[0]['rank'];
  }

  public static function endSession() {
    echo 'Ending the session';
    session_unset();
    session_destroy();
    }
  public static function reload() {
    echo "<script language=\"javascript\">
    var pathname = window.location.pathname.split('?');
    location = pathname[0];
    </script>";
  }
  public static function checkPoint($rankRequired,$userRank) {
   if( $userRank > $rankRequired ) {
     global $db_connect;
     $top_link_home = $db_connect->dbQuery("header_vars","element = 'top_link_home'");
     die('Sorry, you don\'t have permission to access this page. <a href="'.$top_link_home[0]['value'].'">Click here</a> to go back to the home page.<br />');
   }
  }
}
?>
