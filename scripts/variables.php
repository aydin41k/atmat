<?php
class dbExtract {
 public $vars = array();
 public function __construct($page) {
   global $connect;
   $query = 'SELECT * FROM '.$page.'_vars';
   foreach( $connect->query($query) as $arr ) {
   $this->vars[$arr['element']] = $arr['value'];
   }
 }
}

class echoNews {
  public $newsHolder = array();
  public $cats = array();

  public function dbNewsExtract($table, $query) {
    global $connect;
    switch ($table) {
     case "news":
      if( $query == 'all' ) {
       $query = "SELECT * FROM news ORDER BY news_date DESC";
      }
      foreach( $connect->query($query) as $arr ) {
      array_push($this->newsHolder, $arr);
      }
      break;
     case "cats":
      $query = "SELECT * FROM cats ORDER BY id ASC";
      foreach( $connect->query($query) as $arr ) {
      array_push($this->cats, $arr);
      }
      break;
     default:
      echo 'Invalid parameters specified for the class.';
      return;
    }
 }

 public function readNews($set, $criteria, $startNewsCount) {
  $query = '';
  $cont = '';
  $month = '';
  switch ($set) {
   case "cat":
    $query = 'SELECT * FROM news WHERE cat=\''.$criteria.'\' ORDER BY news_date DESC';
    $cont = 'yes';
    break;
   case "arch":
    $month = date("m",$criteria);
    $query = 'SELECT * FROM news WHERE MONTH(news_date)=\''.$month.'\' ORDER BY news_date DESC';
    $cont = 'yes';
    break;
   case "all":
    $query = 'all';
    $cont = 'yes';
    break;
   case "one":
    $query = 'SELECT * FROM news WHERE id=\''.$criteria.'\''; //$criteria being the news ID
    break;
   default:
     echo 'Invalid parameters specified for the class.';
     return;
  }
  $this->printNews($query,$cont,$month,$startNewsCount);
 }
 
 private function embedYoutube($haystack) {
      $i=0;
      while(strpos($haystack,'[youtube]',$i) !== FALSE ) { 
       $pos = strpos($haystack,'[youtube]',$i);
       $startYoutubeLink = $pos+9;
       $endYoutubeLink = strpos($haystack,'[/youtube]');
         if( $endYoutubeLink === FALSE ) {
           return 'Do not forget to include youtube closing tag of [/youtube]';
         }
         else {
           $youtubeLinkLength = $endYoutubeLink - $startYoutubeLink;
           $youtubeLink = substr($haystack,$startYoutubeLink,$youtubeLinkLength);
           $youtubeLink = str_replace('watch?v=','embed/',$youtubeLink);
           $posEnd = $endYoutubeLink + 10;
									$haystack = substr($haystack,0,$pos).
           '<center><iframe width="480" height="270" src="'.$youtubeLink.'" frameborder="0" allowfullscreen></iframe></center>'.
           substr($haystack,$posEnd);
           $i = $posEnd;
         }
						}
						return $haystack;
      }
 public function printNews($query, $cont, $month, $startNewsCount) {
		 $this->dbNewsExtract('news',$query);
		 $news = $this->newsHolder;
		 $this->dbNewsExtract('cats',1);
		           if( !isset($news[0]) ) {
		           echo '<div class="container-fluid text-center"><p><h3>No news found</h3></p><p><a href="news.php"><h4>Click here</a> to go back.</h4></p></div>';
		           $hideAndSeek = 'pagerHolder hideAndSeek';
		           } else { $hideAndSeek = 'pagerHolder'; }
		           $newsCountInc = 4;
		           $lastNewsNum = $startNewsCount + $newsCountInc;
		           $newsCount = count($news);
		           for( $i=$startNewsCount; isset($news[$i]) && $i<$lastNewsNum; $i++ ) {
		             $continue = '';
		             if( !empty($cont) ) {
		               $textLength = strpos($news[$i]['news_text'], '[more]');
			       if( isset($textLength) && !empty($textLength) && $textLength>0 ) {
			         if( $textLength < strlen($news[$i]['news_text']) ) {
			  	         $newsTextTrimmed = substr($news[$i]['news_text'], 0, $textLength);
				         $continueLink = 'Continue reading';
		  	         } else {
					 $newsTextTrimmed = $news[$i]['news_text'];
				  	 $continueLink = 'Open news';
			           }
			       } else {
			          $newsTextTrimmed = $news[$i]['news_text'];
			          $continueLink = 'Open news';
			         }
			       $continue = '<span><p><a href="news.php?id='.$news[$i]['id'].'" class="continue_reading">'.$continueLink.' &#8594;</a></p></span>';
			     } else { $newsTextTrimmed = str_replace('[more]', '', $news[$i]['news_text']); }
			     if( $news[$i]['cat'] < 9999 ) {
		                $postedIn = ', posted in '.$this->cats[$news[$i]['cat']]['cat_name'];
		               } else { $postedIn = ', posted without a category.'; }
			     $newsTextTrimmed = $this->embedYoutube($newsTextTrimmed);
			     $newsTextTrimmed = str_replace("\n",'<br />',$newsTextTrimmed);
			     echo '<div class="news_holder">
			       <span class="news_title">'.$news[$i]['news_title'].'</span><br />
			       <span class="news_author">by '.$news[$i]['news_author'].$postedIn.'</span><br />
			       <span class="news_date">'.date("d M Y",strtotime($news[$i]['news_date'])).'</span>
			        <p>
			         <a href="'.$news[$i]['news_pic'].'"><img class="news_pic img-thumbnail" src="'.$news[$i]['news_pic'].'" /></a>
			         <span class="news_body">'.$newsTextTrimmed.'</span>
			        </p><div class="clearfix"></div>'.
			        $continue
			       .'</div>
		               ';
			    }
		            if( !empty($cont) ) {
		              $olderNewsCount = ($lastNewsNum >= $newsCount) ? $newsCount-$newsCountInc : $lastNewsNum;
		              $newerNewsCount = ($startNewsCount-$newsCountInc-1 < 0) ? 0 : $startNewsCount-$newsCountInc-1;
		              $olderClass = ($lastNewsNum >= $newsCount) ? 'next disabled hideAndSeek' : 'next';
		              $newerClass = ($startNewsCount == 0) ? 'previous disabled hideAndSeek' : 'previous';
		              echo '
		                    <div class="'.$hideAndSeek.'">
		                    <ul class="pager">
		                      <div class="'.$newerClass.'"><li class="'.$newerClass.'"><a href="news.php?contNews='.$newerNewsCount.'">Newer news</a></li></div>
		                      <div class="'.$olderClass.'"><li class="'.$olderClass.'"><a href="news.php?contNews='.$olderNewsCount.'">Older news</a></li></div>
		                    </ul>
		                    </div>
		                    ';
		            } 
 }

}
?>
