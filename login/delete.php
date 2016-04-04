<?php
$rankRequired = 1;
$userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
Session::checkPoint($rankRequired,$userRank);

  if( isset($_POST['deleteId']) ) {
    $id = htmlspecialchars($_POST['deleteId']);
    $query = "id='".$id."'";
    $db_connect->removeRow("users",$query);
  }
  else {
    die('Cannot find the user to delete. <br /><a href="?page=user_admin.php">Click here</a> go back.<br />');
  }
?>
  <script language="javascript">
    window.location.href='admin.php?page=login/user_admin.php';
  </script>

