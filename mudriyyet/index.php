<?php
$rankRequired = 3;
$userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
Session::checkPoint($rankRequired,$userRank);

$class_header = $class_about_atmat = $class_member_activities = $class_footer = 'tab-pane fade';
$li_header = $li_about_atmat = $li_member_activities = $li_footer = '';
if( isset($_GET['pg']) ) {
 $pg = htmlspecialchars($_GET['pg']);
 ${'class_'.$pg} = 'tab-pane fade in active';
 ${'li_'.$pg} = 'active';
} else { 
  $class_header = 'tab-pane fade in active';
  $li_header = 'active';
  }
?>
    <ul class="nav nav-tabs">
      <li class="<?php echo $li_header; ?>"><a data-toggle="tab" href="#header">Header</a></li>
      <li class="<?php echo $li_about_atmat; ?>"><a data-toggle="tab" href="#about_atmat">About ATMAT</a></li>
      <li class="<?php echo $li_member_activities; ?>"><a data-toggle="tab" href="#member_activities">Member Activities</a></li>
      <li class="<?php echo $li_footer; ?>"><a data-toggle="tab" href="#footer">Footer</a></li>
    </ul>

    <div class="tab-content  jumbotron admin_page">
      <div id="header" class="<?php echo $class_header; ?>">
        <?php include "mudriyyet/admin_header.php"; ?>
      </div>
      <div id="about_atmat" class="<?php echo $class_about_atmat; ?>">
        <?php include "mudriyyet/admin_about_atmat.php"; ?>
      </div>
      <div id="member_activities" class="<?php echo $class_member_activities; ?>">
        <?php include "mudriyyet/admin_member_activities.php"; ?>
      </div>
      <div id="footer" class="<?php echo $class_footer; ?>">
        <?php include "mudriyyet/admin_footer.php"; ?>
      </div>
    </div>