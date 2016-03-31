<?php
  include "PDO_db_connect.php";
  if( isset($_GET['id']) ) {
    $id = htmlspecialchars($_GET['id']);
  } else { die('Cannot find the news to delete. <br /><a href="?page=user_admin.php">Click here</a> go back.<br />');  }
  if( isset($_GET['confirmed']) ) {
   $db_connect->
  }

  $query = 'id='.$id;
  $dbUserInfo = $db_connect->query("users",$query);

  echo '
    <div class="text-center">
    <span class="text-warning bg-warning"><h3>Are you sure you want to delete user '.$dbUserInfo[0]['name'].'?</h3></span>
    <p><a href="?page=login/delete.php&confirmed"><button type="button" class="btn btn-danger">Yes, delete it straight away</button></a></p>';
    <p><a href="?page=login/user_admin.php"><button type="button" class="btn btn-success">No, it was a mistake, take me back.</button></a></p>';
';

</div>