<?php

 include "db_connect.php";
 include "variables.php";
 $pg = htmlspecialchars($_GET['pg'], ENT_QUOTES);
 $hv = new dbExtract($pg);
 extract($hv->vars);

  ob_start();

  $amend = 'No change was made.<br />';

  $input_names = array();
  foreach( $hv->vars as $a=>$b ) {
    array_push($input_names, $a);
  }

  for( $i=0; !empty($input_names[$i]); $i++ ) {
   $var = $input_names[$i];
   if( isset($_POST[$var]) && $_POST[$var] != ${$var} ) {
    $amend = '';
    global $connect;
    $new = htmlspecialchars($_POST[$var], ENT_QUOTES);
    $query = 'UPDATE ' . $pg . '_vars SET value=\'' . $new . '\' WHERE element=\'' . $var . '\'';
    if( $connect->query($query) === TRUE ) {
     echo $var.' was changed to ' . $new . '.<br />';
    } else echo 'Error changing '.$var.' in the database';
   }
  }
  $adminka = '../admin.php';
  header('Refresh:5;url='.$adminka.'?pg='.$pg);
  ob_end_flush();
  echo $amend.'<br />You should be redirected in 5 seconds. If nothing happens, click to return to <a href="../admin.php?pg='.$pg.'">Admin Panel</a>.<br />';
?>