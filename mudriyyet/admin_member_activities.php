<?php
$rankRequired = 3;
$userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
Session::checkPoint($rankRequired,$userRank);

 $hv = new dbExtract('member_activities');
 extract($hv->vars);


 echo '<form action="?page=scripts/update_db.php&pg=member_activities" method="post">
    <table id="admin_page_edit_container">';

 $input_names = array();
    foreach( $hv->vars as $a=>$b ) {
      array_push($input_names, $a);
    }
 $link_names = array();
  for( $i=0; !empty($input_names[$i]); $i++ ) {
    $b = str_replace('_', ' ', $input_names[$i]);
    $b = str_replace('ma', 'Member activity box', $b);
    $b = ucfirst($b);
   array_push($link_names, $b);
  }

    $first_string = '<tr><td width=250px>';
    $second_string = ':</td><td width=550px>';
    $third_string = '" value="';
    $fourth_string = '"></td></tr>';
    $input_short = '<input type="text" name="';
    $input_long = '<textarea rows="8" cols="50" name="';
    $input_long_third_string = '">';
    $input_long_fourth_string = '</textarea></td></tr>';

    for( $i=0; !empty($link_names[$i]); $i++ ) {
     if ( strpos($link_names[$i], 'text') === FALSE ) {
       echo $first_string . $link_names[$i] . $second_string . $input_short . $input_names[$i] . $third_string . ${$input_names[$i]} . $fourth_string;
     } else echo $first_string . $link_names[$i] . $second_string . $input_long . $input_names[$i] . $input_long_third_string . ${$input_names[$i]} . $input_long_fourth_string;
    }

 echo '</table>
   <p><input type="submit" value="Save updates"></p>
  </form>';
?>