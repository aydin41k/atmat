  <div id="mid_bar">
   <div class="jumbotron text-center" id="news_page_header">
      <h2><strong>LATEST NEWS</strong></h2>
      <p>Stay up-to-date with our past and planned events</p>
   </div>
   <div id="general_frame">
        <div class="row">
         <div class="col-sm-3 col-xs-12">
           <div class="panel panel-default text-center">
            <div class="panel-heading">News Topics</div>
            <div class="panel-body text-left">
              <p><a href="news.php">All news</a></p>
              <?php
                $infoFromDb = new echoNews;
                $infoFromDb->dbNewsExtract('cats',1);
                $cats = $infoFromDb->cats;
                for( $i=0; isset($cats[$i]); $i++ ) {
                  echo '<p><a href="news.php?cat='.$i.'">'.$cats[$i]['cat_name'].'</a></p>';
                }
              ?>
            </div>
         </div>
         <div class="panel panel-default text-center">
           <div class="panel-heading">News Archive</div>
           <div class="panel-body text-left">
              <?php
                $infoFromDb->dbNewsExtract('news','SELECT DATE_FORMAT(news_date, \'%M %Y\') AS news_month FROM news GROUP BY news_month ORDER BY news_date DESC');
                $dates = $infoFromDb->newsHolder;
                for( $i=0; isset($dates[$i]); $i++ ) {
                  echo '<p><a href="news.php?arch='.strtotime($dates[$i]['news_month']).'">'.$dates[$i]['news_month'].'</a></p>';
                }
                $infoFromDb->newsHolder = array();
              ?>
           </div>
        </div>
       </div>
       <div class="col-sm-9 col-xs-12">
         <div class="panel panel-default noborder">
<?php

if( isset($_GET['id']) ) {
  $pg = htmlspecialchars($_GET['id']);
  $infoFromDb->readNews('one',$pg,0);
}
elseif( isset($_GET['cat']) ) {
  $pg = htmlspecialchars($_GET['cat']);
  $infoFromDb->readNews('cat',$pg,0);
}
elseif( isset($_GET['arch']) ) {
 $pg = htmlspecialchars($_GET['arch']);
 $infoFromDb->readNews('arch',$pg,0);
}
elseif( isset($_GET['contNews']) ) {
 $pg = htmlspecialchars($_GET['contNews']);
 $infoFromDb->readNews('all',1,$pg);
}
else {
 $infoFromDb->readNews('all',1,0);
}
?>
           </div>
         </div>
      </div>
    </div>
  </div>
</body>
</html>