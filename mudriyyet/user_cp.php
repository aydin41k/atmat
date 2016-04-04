<?php
 $username = $_SESSION['username'];
 $query = "nickname = '".$username."'";
 $userDbInfo = $db_connect->dbQuery("users",$query);
 $id = $userDbInfo[0]['id'];
 $name = $userDbInfo[0]['name'];
 $rankNum = $userDbInfo[0]['rank'];
 $rankQuery = "rank = '".$rankNum."'";
 if( $db_connect->dbQuery("user_ranks",$rankQuery) == TRUE ) {
   $rankDbInfo = $db_connect->dbQuery("user_ranks",$rankQuery);
   $rank = $rankDbInfo[0]['title'];
 }
 else {
   echo "Error connecting to the database.<br />";
   return;
 }
echo '
    <h4> Hi, '.strtok($name, " ").'! Here you can edit your account settings.</h4>
    <form class="form-horizontal" method="post" role="form" action="?page=login/edit_user.php">
       <input type="hidden" name="id" value="'.$id.'" />
       <div class="form-group">
         <label class="control-label col-sm-2" for="username">User name</label>
         <div class="col-sm-10"><input class="form-control" id="username" name="username" placeholder="User name" value="'.$username.'" /></div>
       </div>
       <div class="form-group">
         <label class="control-label col-sm-2" for="name">Name</label>
         <div class="col-sm-10"><input class="form-control" id="name" name="name" placeholder="Name" value="'.$name.'" /></div>
       </div>
       <div class="form-group">
        <label class="control-label col-sm-2" for="rank">Access level</label>
        <div class="col-sm-10">
          <select class="form-control" id="rank" name="rank" readonly>
             <option value='.$rankNum.'>'.$rank.'</option>
          </select>
          <span class="help-block"><code class="text-info">You cannot edit your own rank. This is done through the Admin Control Panel.</code></span>
        </div>
       </div>
       <div class="col-sm-10 col-sm-offset-2">
         <div class="form-group">
            <input type="button" class="btn btn-default" value="Change Password" onClick="goBack(\'login/reset_password.php&self\');" />
            <input type="submit" value="Edit user" name="submit" class="btn btn-info" />
            <input type="button" class="btn btn-warning" value="Cancel" onClick="goBack(\'login/user_admin.php\');" />
         </div>
       </div>
    </form>
  ';
?>