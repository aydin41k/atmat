<?php
$rankRequired = 5;
$userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
Session::checkPoint($rankRequired,$userRank);

  if( isset($_POST['id']) && $_POST['id'] == $_SESSION['id'] ||  $_SESSION['rank'] <= 1 ) {
    $postedUserInfo = array(htmlspecialchars($_POST['id']),
                      htmlspecialchars($_POST['name']),
                      htmlspecialchars($_POST['username']),
                      htmlspecialchars($_POST['rank'])
                      );
  }
  else {
    die('Invalid user specified or you are not authorised to perform this action.<br /><a href="?page=login/user_admin.php">Click to go back to User Administration page</a><br />');
  }
  $dbCols = array('id', 'name', 'nickname', 'rank');
  $id = $_POST['id'];
  $query = "id='".$id."'";
  $dbUserInfo = $db_connect->dbQuery("users",$query);

  for($i=1; isset($postedUserInfo[$i]); $i++  ) {
    if( $postedUserInfo[$i] != $dbUserInfo[0][$i] ) {
      $condition = "id='".$id."'";
      $db_connect->update("users",$dbCols[$i],$postedUserInfo[$i],$condition);
      echo $dbCols[$i].' for user id <strong><i>'.$id.'</strong></i> was changed to '.$postedUserInfo[$i].'.<br />';
    }
  }
  $adminReturn = '<a href="?page=login/user_admin.php">Go back to User Administration page.</a><br />';
  $userReturn = '<a href="?page=mudriyyet/user_cp.php">Go back to Account Settings page.</a><br />';
  if( $userRank === 1 ) {
    echo $adminReturn;
  } else { echo $userReturn; }
?>