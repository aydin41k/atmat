<?php
  require "scripts/db_connect.php";
  require "scripts/variables.php";
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
 <?php include "frame/header.php";  ?>
 <span class="text-center"><h1>Welcome to the Admin Panel of ATMAT website!</h1></span>
 <div class="container-fluid frame">
   <div class="row">
     <div class="col-sm-3">
       <div class="panel panel-default">
         <div class="panel-heading">
           <strong><h4>General Admin</h4></strong>
         </div>
         <div class="panel-body">
           <p><a href="?page=mudriyyet/admin_header.php">Header</a></p>
           <p><a href="?page=mudriyyet/admin_about_atmat.php">About ATMAT</a></p>
           <p><a href="?page=mudriyyet/admin_member_activities.php">Members' Activities</a></p>
           <p><a href="?page=mudriyyet/admin_footer.php">Footer</a></p>
         </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong><h4>Users</h4></strong>
        </div>
        <div class="panel-body">
          <p><a href="?page=login/user_admin.php">Manage users</a></p>
          <p><a href="?page=login/register.php">Register a user</a></p>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong><h4>News</h4></strong>
        </div>
        <div class="panel-body">
          <p><a href="?page=news/news_admin.php">Manage news</a></p>
          <p><a href="?page=news/news_add.php">Add news</a></p>
        </div>
     </div>

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