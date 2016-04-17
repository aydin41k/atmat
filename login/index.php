<?php
  if( isset($_GET['sessionLogout']) && isset($_SESSION['username']) && $_GET['sessionLogout'] == $_SESSION['username'] ) {
    Session::endSession();
    Session::reload();
  }
  if( isset($_GET['loggedIn']) ) {
    $adminCP = '';
    if( $_SESSION['rank'] <= 4 ) {
      $adminCP = '<a href="admin.php" class="top_link"><i class="fa fa-exclamation-triangle"></i> Admin Control Panel</a>';
    }
     echo '<span class="news_title">
      <p>
       <a href="admin.php?page=mudriyyet/user_cp.php" class="top_link"><i class="fa fa-cogs"></i> User Control Panel</a><br />
       '.$adminCP.'
      </p>
       <a href="?sessionLogout='.$_SESSION['username'].'" class="top_link"><i class="fa fa-times-circle"></i> <strong>Log out</strong></a>
     </span>';
     return;
  }
  if( !empty($_POST['loginUsername']) ) {
    $user = htmlspecialchars($_POST['loginUsername']);
    $passRaw = htmlspecialchars($_POST['loginPassword']);
    unset($_POST);
    $resultArray = $db_connect->dbQuery("users","nickname = '".$user."'");
    if( $resultArray == NULL ) {
        echo '<script language="javascript">alert("Such user does not exist.")</script>';
        }
    elseif( $resultArray[0]['password'] != md5($passRaw.$resultArray[0]['salt']) ) {
        echo '<script language="javascript">alert("Invalid username-password combination.")</script>';
    }
    else {
      $sessionHandler = new Session;
      $sessionHandler->startSession($resultArray[0]['nickname']);
      Session::reload();
    }
  }
?>
		<div class="container-fluid">
				<form method="post" role="form">
						<div class="form-group">
						  <label for="username">User name</label>
						  <input class="form-control" id="loginUsername" name="loginUsername" placeholder="Username" required />
						</div>
						<div class="form-group">
							 <label for="password">Password</label>
						  <input class="form-control" id="loginPassword" name="loginPassword" type="password" placeholder="Password" required />
						</div>
						<input type="submit" value="Log in" class="form-control" />
		 	 </form>
		 	</div>