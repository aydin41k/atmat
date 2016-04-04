<?php
$rankRequired = 2;
$userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
Session::checkPoint($rankRequired,$userRank);
?>

<div class="container-fluid">
<h3>News</h3>
<?php
		$readNews = new echoNews;
		$readNews->dbNewsExtract('news','all');
		$readNews->dbNewsExtract('cats','all');
		$outputNews = $readNews->newsHolder;
		$outputCats = $readNews->cats;
		echo '
		  <table class="table table-striped table-bordered table-hover table-condensed">
		   <thead>
                    <tr>
		      <th width="50px">&nbsp;</td>
		      <th width="300px"><strong>Title</strong></th>
		      <th width="200px"><strong>Author</strong></th>
		      <th width="150px"><strong>Posted on</strong></th>
		      <th width="150px"><strong>Category</strong></th>
		      <th width="70px">&nbsp;</th>
		      <th width="80px">&nbsp;</th>
		    </tr>
                   </thead><tbody>';
		for( $i=0; isset($outputNews[$i]['id']); $i++ ) {
		    $no = $i+1;
                      if( $outputNews[$i]['cat'] < 9999 ) {
                        $cat = $outputCats[$outputNews[$i]['cat']]['cat_name'];   //cats[$news[$i]['cat']]['cat_name']
                      } else { $cat = 'No category'; }
		    echo '<tr>
		      <td width="50px">'.$no.'</td>
		      <td width="300px"><a href="../news.php?id='.$outputNews[$i]['id'].'" class="newsname">'.$outputNews[$i]['news_title'].'</a></td>
		      <td width="200px">'.$outputNews[$i]['news_author'].'</td>
		      <td width="150px">'.date("d M Y", strtotime($outputNews[$i]['news_date'])).'</td>
		      <td width="150px">'.$cat.'</td>
		      <td width="70px" class="text-center"><a href="?page=news/news_admin.php&edit='.$i.'"><button type="button" class="btn btn-warning">Edit</button></a></td>
		      <td width="80px" class="text-center"><a href="?page=news/news_write.php&delete='.$i.'"><button type="button" class="btn btn-danger">Delete</button></a></td>
		    </tr>';
		}
		echo '
				    <tr>
		      <td width="50px">&nbsp;</td>
		      <td width="300px"><a href="?page=news/news_add.php"><button type="button" class="btn btn-success">+Add News</button></a></td>
		      <td width="200px">&nbsp;</td>
		      <td width="150px">&nbsp;</td>
		      <td width="150px">&nbsp;</td>
		      <td width="70px">&nbsp;</td>
		      <td width="80px">&nbsp;</td>
		    </tr>
		    </tbody>
		    </table>
    </table></div>';

if( isset($_GET['edit']) ) {
$newsNum = $_GET['edit'];
echo '
<div class="container-fluid">
<div class="col-sm-10 col-sm-offset-2">
 <h3>Editing news id #<strong><u>'.$outputNews[$newsNum]['id'].'</u></strong></h3>
</div>
<form class="form-horizontal" role="form" action="?page=news/news_write.php&edit='.$newsNum.'" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_title">News title:</label>
    <div class="col-sm-10"><input type="text" name="news_title" class="form-control" value="'.$outputNews[$newsNum]['news_title'].'" /></div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="cat">News category:</label>
    <div class="col-sm-10">
      <select name="cat" class="form-control">
        <option value="9999"><i>No category</i></option>';
           for( $i=0; isset($outputCats[$i]); $i++ ) {
             if( isset($outputNews[$newsNum]['cat']) && $i == $outputNews[$newsNum]['cat'] ) {
                $selected = 'selected="selected"';
             } else { $selected = ''; }
               echo '<option value="'.$i.'" '.$selected.'>'.$outputCats[$i]['cat_name'].'</option>';
             }
      echo '</select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_author">News author:</label>
    <div class="col-sm-10"><input type="text" name="news_author" class="form-control" value="'.$outputNews[$newsNum]['news_author'].'" /></div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_date">News date:</label>
    <div class="col-sm-10"><input type="text" name="news_date" class="form-control" value="'.$outputNews[$newsNum]['news_date'].'" /></div>
    <div class="col-sm-10 col-sm-offset-2"><span class="help-block"><code class="text-info">(yyyy-mm-dd)</code></span></div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_pic">News picture:</label>
    <div class="col-sm-8"><input type="text" name="news_pic" class="form-control" value="'.$outputNews[$newsNum]['news_pic'].'" /></div>
    <div class="col-sm-10 col-sm-offset-2"><span class="help-block"><code class="text-info">Paste image URL here</code></span></div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="news_text">News text:</label>
     <div class="col-sm-10">
      <textarea name="news_text" rows=10 class="form-control">'.$outputNews[$newsNum]['news_text'].'</textarea>
     </div>
  </div>
  <div class="col-sm-10 col-sm-offset-2">
    <button type="submit" class="btn btn-default">Save changes</button>
    <a href="?page=news/news_admin.php"><button type="button" class="btn btn-default">Cancel</button></a>
  </div>
</form>
</div>'
;
}

?>
</div>