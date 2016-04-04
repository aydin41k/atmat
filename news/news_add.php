<?php
$rankRequired = 5;
$userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
Session::checkPoint($rankRequired,$userRank);

  $readNews = new echoNews;
  $readNews->dbNewsExtract('cats','all');
  $outputCats = $readNews->cats;
?>

<div class="container-fluid">
<form class="form-horizontal" role="form" action="?page=news/news_write.php&new" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_title">News title:</label>
    <div class="col-sm-10"><input type="text" name="news_title" class="form-control" placeholder="Title" /></div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cat">News category:</label>
    <div class="col-sm-10">
      <select name="cat" class="form-control">
        <option value="9999"><i>No category</i></option>
        <?php
           for( $i=0; isset($outputCats[$i]); $i++ ) {
             if( isset($outputNews[$newsNum]['cat']) && $i == $outputNews[$newsNum]['cat'] ) {
             }
               echo '<option value="'.$i.'">'.$outputCats[$i]['cat_name'].'</option>';
             }
        ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_author">News author:</label>
    <div class="col-sm-10"><input type="text" name="news_author" class="form-control" placeholder="Author" /></div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_date">News date:</label>
    <div class="col-sm-10"><input type="text" name="news_date" class="form-control" placeholder="<?php echo date("Y-m-d", time()); ?>" /></div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_pic">News picture:</label>
    <div class="col-sm-10"><input type="text" name="news_pic" class="form-control" placeholder="News picture URL" /></div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_text">News text:</label>
     <div class="col-sm-10">
      <textarea name="news_text" rows=10 class="form-control" placeholder="News text"></textarea>
     </div>
  </div>
  <div class="col-sm-10 col-sm-offset-2">
    <button type="submit" class="btn btn-default">Save changes</button>
    <a href="?page=news/news_admin.php"><button type="button" class="btn btn-default">Cancel</button></a>
  </div>
</form>
</div>