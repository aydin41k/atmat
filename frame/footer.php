<?php
 $hv = new dbExtract('footer');
 extract($hv->vars);
 echo '
 <div class="navbar navbar-inverse navbar-fixed-bottom" id="bottom_bar">
    <a href="http://www.facebook.com/atmat.asgoa/"><img src="images/template/fb.png" class="social-icon"/></a>
    <a href="http://www.youtube.com/watch?v=7lw60u-WXlQ"><img src="images/template/yt.png" class="social-icon" /></a>
    <p><hr id="hr">
    <span class="body_text">&copy; ' . $organisation_name . '. All rights reserved. ' . date("Y") . '</span></p>
</div>';
?>

</body>
</html>