<div class="container">
 <?php
    if( isset($_GET['ref']) ) {
     $ref = $_GET['ref'];
    }
    if( isset($_GET['img']) ) {
      $currentImg = htmlspecialchars($_GET['img']);
      $imgSize = (isset($_GET['size'])) ? htmlspecialchars($_GET['size']) : 256000;
   } else { die('Image submitted for changing is not defined. Please contact the website administrator.'); }
    if( isset($_POST['submit']) ) {
     $img = $_FILES['uploadedImg'];
     $extensions = array('jpg', 'jpeg', 'png');
     $thisExtension = end(explode(".", $img['name']));
       if( $img['type'] == "image/png" ||
           $img['type'] == "image/jpg" ||
           $img['type'] == "image/jpeg" &&
           $img['size'] < $imgSize &&
           in_array($thisExtension, $extensions) ) {
         move_uploaded_file($img['tmp_name'], $currentImg);
         echo '<div class="text-success">Picture altered successfully!</div>';
        }
       else {
         die('<span class="text-danger">Error occured.</span><br /><a href="admin.php">Click to go back</a> and try again.<br />');
         }
   }
?>
  <form enctype="multipart/form-data" method="post">
        <span><img src="<?php echo $currentImg; ?>" class="img-thumbnail"></span>
        <p>
          <span class="help-block"><code class="text-info">Recommended resolution:768x290px<br /> Max size:250KB<br />File type: JPG/JPEG/PNG</code></span>
          <span class="btn btn-info btn-file" ><input type="file" name="uploadedImg" id="uploadedImg">Browse for a new picture</span>
          <input type="submit" value="Upload" name="submit" class="btn btn-info" />
          <input type="button" class="btn btn-warning" value="Back to Admin Page" onClick="goBack('<?php echo $ref; ?>');" />
        </p>
  </form>
</div>
</body>
</html>