<?php
include "scripts/db_classes.php";
include "scripts/db_connect.php";
include "scripts/variables.php";
include "scripts/session_classes.php";

include "frame/header.php" 
?>
 <div id="mid_bar">
  <div class="jumbotron text-center">
      <p>This page is being constructed as you are reading this line. Please, check back later.</p>
   </div>
 </div>
   <div class="text-center">
   <div class="teker"><i class="fa fa-cog fa-spin fa-5x text-primary"></i></div>
   <div class="teker"><i class="fa fa-cog fa-spin fa-5x"></i></div>
   <div class="teker"><i class="fa fa-cog fa-spin fa-5x text-danger"></i></div>
   <br />
   <div class="teker"><i class="fa fa-cog fa-spin fa-5x text-warning"></i></div>
   <div class="teker"><i class="fa fa-cog fa-spin fa-5x text-success"></i></div>
   </div>
<?php include "../rps/index.php" ?>
<?php include "frame/footer.php" ?>