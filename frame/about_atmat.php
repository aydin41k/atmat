<?php
 $hv = new dbExtract('about_atmat');
 extract($hv->vars);
?>

<div id="mid_bar">
  <div id="description" class="text-center">
          <br />
          <span class="heading">
          <?php echo $website_title; ?>
          </span>
          <span class="body_text"><p>
          <?php echo $website_description; ?>
          </p></span>

  </div>
<?php
   echo '<img src="' . $mid_pic . '" id="mid_pic_img" class="img-responsive" />';
?>
</div>
<div class="big_box">
  <div class="row">
     <?php
      for( $i=1; $i<=3; $i++ ) {
         $var_heading = ${'sm_box' . $i . '_heading'};
         $var_img = ${'sm_box' . $i . '_img'};
         $var_text = ${'sm_box' . $i . '_text'};
         echo '<div class="small_box col-xs-12 col-sm-4"><br />
            <img src="' . $var_img . '" class="sm_box_img" />
            <p> <span class="small_heading">' . $var_heading . '</span></p>
            <p> <span class="small_text">' . $var_text . '</span> </p>
            </div>';
      }
     ?>
  </div>
 <center><img src="images/template/hr.jpg" id="hr" class="align-center" /></center>
</div>