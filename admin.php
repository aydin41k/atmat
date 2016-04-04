<?php
include "scripts/db_classes.php";
include "scripts/db_connect.php";
include "scripts/variables.php";
include "scripts/session_classes.php";
include "frame/header.php";

$rankRequired = 5;
$userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
Session::checkPoint($rankRequired,$userRank);
?>

<!DOCTYPE html>

<html>
 <head>
      <script language="javascript">
        function imgUpload($a,$b) {
         window.location.href='?page=mudriyyet/img_upload.php&img='+$a+'&ref='+$b;
        }
       function goBack($a) {
        window.location.href='?page='+$a;
       }
      </script>
      <link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
   <title>Admin Panel</title>
 </head>

 <body>
 <?php
      function adminSidebar($category,$accessLevel) {
        $userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : NULL;
        if( empty($userRank) ) {
          die('Error with authentication. Please log in.');
        }
        elseif( $userRank <= $accessLevel ) {
          echo $category;
        }
        else return;
     }
 ?>
 <span class="text-center"><h1>Welcome to the Control Panel!</h1></span>
 <div class="container-fluid frame">
   <div class="row">
     <div class="col-sm-3">
      <?php
       $account_settings = '
           <div class="panel panel-default">
             <div class="panel-heading">
                <strong><h4>My Account</h4></strong>
             </div>
             <div class="panel-body">
               <p><a href="?page=mudriyyet/user_cp.php">Settings</a></p>
             </div>
           </div>
           ';
       $frontpage_admin = '
           <div class="panel panel-default">
             <div class="panel-heading">
               <strong><h4>General Admin</h4></strong>
             </div>
             <div class="panel-body">
               <p><a href="?page=mudriyyet/admin_header.php">Header</a></p>
               <p><a href="?page=mudriyyet/admin_about_atmat.php">About ATMAT</a></p>
               <p><a href="?page=mudriyyet/admin_member_activities.php">Members&#39; Activities</a></p>
               <p><a href="?page=mudriyyet/admin_footer.php">Footer</a></p>
             </div>
          </div>
          ';
      $user_admin = '
          <div class="panel panel-default">
            <div class="panel-heading">
              <strong><h4>Users</h4></strong>
            </div>
            <div class="panel-body">
              <p><a href="?page=login/user_admin.php">Manage users</a></p>
              <p><a href="?page=login/register.php">Register a user</a></p>
            </div>
          </div>
          ';
      $news_admin = '
          <div class="panel panel-default">
            <div class="panel-heading">
              <strong><h4>News</h4></strong>
            </div>
            <div class="panel-body">
              <p><a href="?page=news/news_admin.php">Manage news</a></p>
              <p><a href="?page=news/news_add.php">Add news</a></p>
            </div>
         </div>
         ';
    adminSidebar($account_settings,5);
    adminSidebar($frontpage_admin,3);
    adminSidebar($user_admin,1);
    adminSidebar($news_admin,2);
   ?>
     </div>
     <div class="col-sm-9">
       <?php
         if( isset($_GET['page']) ) {
           $page = $_GET['page'];
           include $page;
         } else {
           include 'mudriyyet/admin_header.php';
         }
       ?>
     </div>
   </div>
 </div>
 </body>
</html>