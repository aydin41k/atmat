<?php
 $hv = new dbExtract('header');
 extract($hv->vars);

 $input_names = array();
 foreach( $hv->vars as $a=>$b ) {
   $input_names[$a] = $b;
 }
?>
  <form action="scripts/update_db.php?pg=header" method="post" role="form" class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="website_title">Website title</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="website_title" name="website_title" value="<?php echo $input_names['website_title'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="website_logo">Website logo</label>
      <div class="col-sm-6">
        <span><img src="<?php echo $input_names['website_logo']; ?>" class="img-thumbnail"></span>
        <span class="btn btn-info btn-file" id="website_logo" onClick="imgUpload('images/template/atmat_logo.jpg','mudriyyet/admin_header.php');">Change logo</span>
        <span class="help-block"><code class="text-info">Recommended resolution:150x50px; Max size:250KB</code></span>
        <input type="hidden" name="website_logo" value="images/template/atmat_logo.jpg" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="about">About page</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="about" name="top_link_about" value="<?php echo $input_names['top_link_about'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="news">News page</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="news" name="top_link_news" value="<?php echo $input_names['top_link_news'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="activities">Members Activities</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="activities" name="top_link_activities" value="<?php echo $input_names['top_link_activities'] ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="contact">Contact us</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="contact" name="top_link_contact" value="<?php echo $input_names['top_link_contact'] ?>" />
      </div>
    </div>
   <div class="form-group">
    <div class="col-sm-2 col-sm-offset-2">
     <input type="submit" value="Save updates" class="btn btn-info form-control" />
    </div>
   </div>
  </form>