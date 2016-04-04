<?php
  $rankRequired = 3;
  $userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
  Session::checkPoint($rankRequired,$userRank);

 $hv = new dbExtract('about_atmat');
 extract($hv->vars);
 $link_names = array();
 foreach( $hv->vars as $a=>$b ) {
   $link_names[$a] = $b;
 }
?>
  <form entype="multipart/form-data" action="scripts/update_db.php?pg=about_atmat" method="post" role="form" class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="website_description">Website description</label>
      <div class="col-sm-6">
        <textarea class="form-control" rows="5" id="website_description" name="website_description"><?php echo $link_names['website_description'] ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="mid_picture">Large picture in the middle</label>
      <div class="col-sm-6">
        <span><img src="<?php echo $link_names['mid_pic']; ?>" class="img-thumbnail"></span>
        <span class="btn btn-info btn-file" id="mid_picture" onClick="imgUpload('images/template/mid_pic.jpg');">Change the picture</span>
        <span class="help-block"><code class="text-info">Recommended resolution:800x302px; Max size:250KB</code></span>
        <input type="hidden" name="mid_pic" value="images/template/mid_pic.jpg" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="sm_box1_img">Box 1</label>
      <div class="col-sm-6">
        <span><img src="<?php echo $link_names['sm_box1_img']; ?>" class="img-thumbnail"></span>
        <span class="btn btn-info btn-file" id="sm_box1_img" onClick="imgUpload('<?php echo 'images/template/small_box1_img.jpg' ?>');">Change the picture</span>
        <span class="help-block"><code class="text-info">Recommended resolution:200x100px; Max size:250KB</code></span>
        <input type="hidden" name="sm_box1_img" value="images/template/small_box1_img.jpg" />
        <input type="text" class="form-control" id="sm_box1_heading" name="sm_box1_heading" value="<?php echo $link_names['sm_box1_heading'] ?>" />
        <textarea class="form-control" rows="5" id="sm_box1_text" name="sm_box1_text"><?php echo $link_names['sm_box1_text'] ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="sm_box2_img">Box 2</label>
      <div class="col-sm-6">
        <span><img src="<?php echo $link_names['sm_box2_img']; ?>" class="img-thumbnail"></span>
        <span class="btn btn-info btn-file" id="sm_box2_img" onClick="imgUpload('<?php echo 'images/template/small_box2_img.jpg'; ?>');">Change the picture</span>
        <span class="help-block"><code class="text-info">Recommended resolution:200x100px; Max size:250KB</code></span>
        <input type="hidden" name="sm_box2_img" value="images/template/small_box2_img.jpg" />
        <input type="text" class="form-control" id="sm_box2_heading" name="sm_box2_heading" value="<?php echo $link_names['sm_box2_heading'] ?>" />
        <textarea class="form-control" rows="5" id="sm_box2_text" name="sm_box2_text"><?php echo $link_names['sm_box2_text'] ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="sm_box3_img">Box 3</label>
      <div class="col-sm-6">
        <span><img src="<?php echo $link_names['sm_box3_img']; ?>" class="img-thumbnail"></span>
        <span class="btn btn-info btn-file" id="sm_box3_img" onClick="imgUpload('<?php echo 'images/template/small_box3_img.jpg'; ?>');">Change the picture</span>
        <span class="help-block"><code class="text-info">Recommended resolution:200x100px; Max size:250KB</code></span>
        <input type="hidden" name="sm_box3_img" value="images/template/small_box3_img.jpg" />
        <input type="text" class="form-control" id="sm_box3_heading" name="sm_box3_heading" value="<?php echo $link_names['sm_box3_heading'] ?>" />
        <textarea class="form-control" rows="5" id="sm_box3_text" name="sm_box3_text"><?php echo $link_names['sm_box3_text'] ?></textarea>
      </div>
    </div>
    <div class="col-sm-2 col-sm-offset-2">
     <input type="submit" value="Save updates" class="btn btn-info form-control" />
    </div>
  </form>