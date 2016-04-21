<?php
 $hv = $db_connect->dbQuery('member_activities_vars');
 $vars = array();
 foreach ($hv as $a=>$b) {
  $vars[$a] = $b;
 }

 echo '<div class="big_box">
       <div><span class="other_heading"><center>Activities of Azerbaijani Youth in Australia</center><br /></span></div>
       <div class="row">';

      for( $i=0;$i<count($vars);$i++ ) {
       $var_img = $vars[$i]['img'];
       $var_heading = $vars[$i]['heading'];
       $var_text = $vars[$i]['text'];
       $var_href = $vars[$i]['href'];
       echo '<div class="small_box col-xs-12 col-sm-4" onClick=window.location.assign("'.$var_href.'")><br />
             <img src="' . $var_img . '" class="sm_box_img" />
             <p><span class="small_heading">' . $var_heading . '</span></p>
             <p> <span class="small_text">' . $var_text . '</span></p>
             </div>';
      }

 echo '</div></div>';
?>
