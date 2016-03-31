<?php
 $hv = new dbExtract('header');
 extract($hv->vars);
?>

<!DOCTYPE html>

<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link type="text/css" rel="stylesheet" href="css/stylesheet.css" />
      <title>
        <?php echo $website_title; ?>
     </title>
</head>
<body>
  <div id="top_bar">
    <div id="top_container" class="navbar">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="glyphicon glyphicon-chevron-down"></span>
              </button>
              <?php
                echo '<img src="' . $website_logo . '" id="logo" class="img-responsive" />';
              ?>
             </div>
            <div class="collapse navbar-collapse" id="myNavbar">
           <ul class="nav navbar-nav navbar-right">
            <?php
             $top_links = array("Home" => $top_link_home,
                          "About ATMAT" => $top_link_about,
                          "Latest News" => $top_link_news,
                          "Activities" => $top_link_activities,
                          "Contact us" => $top_link_contact);
             foreach( $top_links as $x=>$link ) {
              echo '<li class="topLinks"><a href="' . $link . '" class="top_link">' . $x . '</a></li>';
             }
            ?>
           </ul>
            </div>
    </div>
  </div>