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
    echo '<script language="javascript">location.reload();</script>';
  }
}
?>