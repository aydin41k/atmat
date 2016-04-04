
<?php
  $dieMessage = '<a href="?page=login/user_admin.php">Click to go back to user administration page</a><br />';
  if( !empty($_POST) ) {
    $username = (empty($_POST['username'])) ? die('no username specified<br />'.$dieMessage) : htmlspecialchars($_POST['username']);
    $salt = rand(10000, 99999);
    $passwordRaw = (empty($_POST['password'])) ? die('no password specified<br />'.$dieMessage) : htmlspecialchars($_POST['password']);
    $password = md5($passwordRaw.$salt);
    $name = (empty($_POST['name'])) ? die('no name specified<br />'.$dieMessage) : htmlspecialchars($_POST['name']);
    $rank = (empty($_POST['rank'])) ? 5 : htmlspecialchars($_POST['rank']);
    if( $db_connect->insertRow("users",array('nickname','password','name','rank','salt'),array($username,$password,$name,$rank,$salt)) === TRUE ) {
      die('User registered successfully.<br />'.$dieMessage);
    } else { echo 'Something went wrong. Please try again.<br />'; }
  }
?>
	<div class="container-fluid">
		<h3>Create a new user here</h3>
		<form class="form-horizontal" method="post" role="form">
	   <div class="form-group">
	     <label class="control-label col-sm-2" for="username">User name</label>
	     <div class="col-sm-10"><input class="form-control" id="username" name="username" placeholder="User name" /></div>
	   </div>
	   <div class="form-group">
	     <label class="control-label col-sm-2" for="password">Password</label>
	     <div class="col-sm-10"><input class="form-control" type="password" id="password" name="password" placeholder="Password" /></div>
	   </div>
	   <div class="form-group">
	     <label class="control-label col-sm-2" for="password2">Same password again:</label>
	     <div class="col-sm-10"><input class="form-control" type="password" id="password2" name="password2" placeholder="Password again" /></div>
	   </div>
	   <div class="form-group">
	     <label class="control-label col-sm-2" for="name">Name</label>
	     <div class="col-sm-10"><input class="form-control" id="name" name="name" placeholder="Name" /></div>
	   </div>
	   <div class="form-group">
	     <label class="control-label col-sm-2" for="rank">Access level</label>
	     <div class="col-sm-10"><select class="form-control" id="rank" name="rank">
	       <option value="1">General Admin</option>
	       <option value="2">News Editor</option>
	       <option value="3">Frontpage Editor</option>
	       <option value="4">Comments Moderator</option>
	       <option value="5" selected="selected">Subscriber</option>	       	       
	     </select></div>
	   </div>
	   <div class="form-group">
	     <input type="submit" value="Register user" class="col-sm-offset-2" />
	   </div>			
		</form>
	</div>
