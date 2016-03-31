<?php
  include "PDO_db_connect.php";
  $dbUserInfo = $db_connect->query("users");
  $id = htmlspecialchars($_GET['id']);
  if( isset($_GET['password']) ) {
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
      if( $password != $password2 ) {
       die('Password did not match. <a href="?page=login/reset_password.php&id='.$id.'">Please try again.</a>');
      } else {
          echo '<span class="bg-success"><h3>Password successfully changed!</span><br /><a href="?page=login/user_admin.php">Click here</a> go go back.';
          $salt = rand(10000,99999);
          $password = md5($password.$salt);
          $db_connect->update("users", "password", $password, "id = '".$id."'");
          $db_connect->update("users", "salt", $salt, "id = '".$id."'");
      }
  }
?>
<h2>Reset password for user <?php echo $dbUserInfo[0]['name'] ?></h2>
 <form class="form-horizontal" method="post" role="form" action="?page=login/reset_password.php&id=<?php echo $id; ?>&password=ok">
     <div class="form-group">
       <label class="control-label col-sm-2" for="username">New Password</label>
       <div class="col-sm-10"><input type="password" class="form-control" id="password" name="password" placeholder="Password" /></div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2" for="username">Confirm New Password</label>
       <div class="col-sm-10"><input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" /></div>
     </div>
     <div class="col-sm-10 col-sm-offset-2">
       <div class="form-group">
          <input type="submit" value="Change Password" name="submit" class="btn btn-info" />
       </div>
     </div>
 </form>
