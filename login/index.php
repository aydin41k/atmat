<?php
include "PDO_db_connect.php";
?>
<?php
  $dieMessage = '<a href="'.$_SERVER['PHP_SELF'].'">Click to go back</a><br />';
  if( !empty($_POST) ) {
    $user = (empty($_POST['username'])) ? die('no username specified<br />'.$dieMessage) : htmlspecialchars($_POST['username']);
    $passRaw = (empty($_POST['password'])) ? die('no password specified<br />'.$dieMessage) : htmlspecialchars($_POST['password']);
    $resultArray = $db_connect->query("users","nickname = '".$user."'");
     if( empty($resultArray) ) { die('No such user.<br />'.$dieMessage); } 
    $pass = md5($passRaw.$resultArray[0]['salt']);
    echo ($pass == $resultArray[0]['password']) ? 'Password correct for user '.$user.'<br />' : 'Invalid username/password combination. <br />';
    die($dieMessage);
  }
?>
		<div class="container">
		 <div class="col-xs-7 col-sm-6 col-md-5 col-lg-4">
				<form method="post" role="form">
						<div class="form-group">
						  <label for="username">User name</label>
						  <input class="form-control" id="username" name="username" placeholder="Enter username"/>
						</div>
						<div class="form-group">
							 <label for="password">Password</label>
						  <input class="form-control" id="password" name="password" type="password" placeholder="Enter password"/>
						</div>
						<input type="submit" value="Log in" class="form-control"/>
		 	 </form>
		 	</div> 
		</div>
</body>
</html>