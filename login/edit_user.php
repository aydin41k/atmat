<?php
  include "PDO_db_connect.php";

  if( isset($_POST['id']) ) {
    $postedUserInfo = array(htmlspecialchars($_POST['id']),
                      htmlspecialchars($_POST['name']),
                      htmlspecialchars($_POST['username']),
                      htmlspecialchars($_POST['rank'])
                      );
  }
  else {
    die('Invalid user specified.<br /><a href="?page=login/user_admin.php">Click to go back to User Administration page</a><br />');
  }
  $dbCols = array('id', 'name', 'nickname', 'rank');
  $id = $_POST['id'];
  $query = "id='".$id."'";
  $dbUserInfo = $db_connect->query("users",$query);

  for($i=1; isset($postedUserInfo[$i]); $i++  ) {
    if( $postedUserInfo[$i] != $dbUserInfo[0][$i] ) {
      $condition = "id='".$id."'";
      $db_connect->update("users",$dbCols[$i],$postedUserInfo[$i],$condition);
      echo $dbCols[$i].' for user id <strong><i>'.$id.'</strong></i> was changed to '.$postedUserInfo[$i].'.<br />';
    }
  }
  echo '<a href="?page=login/user_admin.php">Go back to User Administration page.</a><br />';
?>