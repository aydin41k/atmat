<?php
$rankRequired = 3;
$userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
Session::checkPoint($rankRequired,$userRank);

 if( !is_numeric($_POST['id']) ) {
   die('Don\'t play with my URL\'s, use the buttons and links on screen.');
 }

 $postedValues = ['id' => htmlspecialchars($_POST['id']),
                  'img' => htmlspecialchars($_POST['img']),
                  'heading' => htmlspecialchars($_POST['heading']),
                  'href' => htmlspecialchars($_POST['href']),
                  'text' => htmlspecialchars($_POST['text'])
                  ];

 $key = array_keys($postedValues);

 for( $i=2; $i < count($postedValues); $i++ ) {
   $colName = $key[$i];
   $condition = 'id = '.$postedValues['id'];
   $db_connect->matchDb('member_activities_vars',$colName,$postedValues[$colName],$condition);
 }

 echo '<br />Click to return to <a href="?page=mudriyyet/admin_member_activities.php">Member activities administration page</a>.<br />';
?>