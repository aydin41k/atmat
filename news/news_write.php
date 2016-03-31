<div class="container-fluid">
<div class="jumbobox text-center">
<?php
$readNews = new echoNews;
$readNews->dbNewsExtract('news','all');
$readNews->dbNewsExtract('cats','all');
$outputNews = $readNews->newsHolder;

function goBack($a) {
  if( $a > 0 ) {
    echo '<a href="?page=news/news_admin.php">Going back to News Admin Panel in '.$a.' seconds.</a>';
    header('Refresh:'.$a.';url=?page=news/news_admin.php');
  }
  else {
    return;
  }
}
$goBack = 10;
if( isset($_GET['edit']) ) {
		$newsNum = htmlspecialchars($_GET['edit']);
		$newsNumb = $newsNum+1;

		$vars = array('id', 'news_title', 'news_author', 'news_date', 'news_pic', 'news_text', 'cat');
	 $noChange = '<h3>Nothing changed.</h3><br />';
		for( $i=1; $i<count($vars); $i++ ) {
      if( $_POST[$vars[$i]] != $outputNews[$newsNum][$vars[$i]] ) {
						 $noChange = '';
						 global $connect;
						 $_POST[$vars[$i]] = str_replace("'", "\'", $_POST[$vars[$i]]);
                                                 $query = "UPDATE news SET ".$vars[$i]."='".htmlspecialchars($_POST[$vars[$i]])."' WHERE id='".$outputNews[$newsNum]['id']."'";
						 if( $connect->query($query) === TRUE ) {
						   echo '<h3><strong>'.$vars[$i].'</strong> changed in the DB.</h3><br />';
						 } else { '<h3>'.$vars[$i].' change was unsuccessful.</h3><br />'; }
		   }
		}
  echo $noChange;
}


if(  isset($_GET['new']) ) {
  $postedData = array(htmlspecialchars($_POST['news_title']), htmlspecialchars($_POST['news_pic']), htmlspecialchars($_POST['news_text']),
                      htmlspecialchars($_POST['news_author']), htmlspecialchars($_POST['news_date']), htmlspecialchars($_POST['cat']));
  for( $i=0; $i<count($postedData); $i++ ) {
    if( empty($postedData[$i]) ) {
      echo '<h2><span class="bg-warning">Please fill in all the fields before submitting.</span></h2><br />';
      die();
    }
  }
  global $connect;
  $postedData[0] = str_replace("'", "\'", $postedData[0]);
  $postedData[2] = str_replace("'", "\'", $postedData[2]);
  $query = "INSERT INTO news(id, news_title, news_pic, news_text, news_author, news_date, cat) VALUES ('',
                                                                                                        '".$postedData[0]."',
	 												'".$postedData[1]."',
	 												'".$postedData[2]."',
	 												'".$postedData[3]."',
	 												'".$postedData[4]."',
                                                                                                        '".$postedData[5]."')
 ";
 if( $connect->query($query) === TRUE ) {
   echo '<h3><span class="text-success">New news item <strong>'.$postedData[0].'</strong> added!</h3></span><br />';
 } else { echo '<span class="text-danger"><h2>WARNING</h2><br /><h3>Recording new news item was unsuccessful.</h3></span><br />'; }
}

if( isset($_GET['delete'])) {
  $pg = $_GET['delete'];
  echo '<span class="text-danger bg-danger"><h3>Are you sure you want to delete <strong>'.$outputNews[$pg]['news_title'].'</strong>?</h3></span>';
  echo '<p><a href="?page=news/news_write.php&delete_confirmed='.$pg.'"><button type="button" class="btn btn-danger">Yes, delete it straight away</button></a></p>';
  echo '<p><a href="?page=news/news_admin.php"><button type="button" class="btn btn-success">No, it was a mistake, take me back.</button></a></p>';

  $goBack = 0;
}
if( isset($_GET['delete_confirmed']) ) {
  $pgConf = $_GET['delete_confirmed'];
  $query = "DELETE FROM news WHERE id='".$outputNews[$pgConf]['id']."'";
  global $connect;
  if ( $connect->query($query) === TRUE ) {
      header('Refresh:0;url=?page=news/news_admin.php');
  } else { echo '<h3><span class="bg-danger">Not deleted, something must have gone wrong.</h3></span><br />'; }
  $goBack = 0;
}
goBack($goBack);
?>
</div>
</div>
  </body>
</html>
