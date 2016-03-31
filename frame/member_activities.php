<?php
 $hv = new dbExtract('member_activities');
 extract($hv->vars);

 echo '<div class="big_box">
       <div><span class="other_heading"><center>Activities of Azerbaijani Youth in Australia</center><br /></span></div>
       <div class="row">';

      for( $i=1;$i<=3;$i++ ) {
       $var_img = ${'ma' . $i . '_img'};
       $var_heading = ${'ma' . $i . '_heading'};
       $var_text = ${'ma' . $i . '_text'};
       echo '<div class="small_box col-xs-12 col-sm-4"><br />
             <img src="' . $var_img . '" class="sm_box_img" />
             <p><span class="small_heading">' . $var_heading . '</span></p>
             <p> <span class="small_text">' . $var_text . '</span></p>
             </div>';
      }

 echo '</div></div>';
?>
