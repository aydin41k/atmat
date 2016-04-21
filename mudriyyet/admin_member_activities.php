<?php
$rankRequired = 3;
$userRank = (isset($_SESSION['rank'])) ? $_SESSION['rank'] : 9999;
Session::checkPoint($rankRequired,$userRank);

 $hv = $db_connect->dbQuery('member_activities_vars');
 $vars = array();
 foreach ($hv as $a=>$b) {
  $vars[$a] = $b;
 }
?>
     <table class="table table-striped table-bordered table-hover">
 						 <thead>
 						  <tr>
 						   <th width=50px>#</th>
 						   <th width=250px>Link title</th>
 						   <th width=100px>Edit</th>
 						   <th width=100px>Delete</th>
 						  </tr>
 						 </thead>
 						 <tbody>
<?php						 
 	for($i=0; $i<count($vars); $i++ )
 	{	 $no = $i+1;
 	  echo '				 
 						  <tr>
 						   <td>'.$no.'</td>
 						   <td>'.$vars[$i]['heading'].'</td>
 						   <td><a href="?page=mudriyyet/admin_member_activities.php&edit='.$i.'"><button class="btn btn-warning">Edit</button></a></td>
 						   <td><a href="?page=mudriyyet/admin_member_activities.php&delete='.$i.'"><button class="btn btn-danger">Delete</button></a></td>
 						  </tr>
       ';
 }
?> 
 						  <tr>
 						   <td>&nbsp;</td>
 						   <td><a href="#"><button class="btn btn-success">+Add a Link</button></a></td>
 						   <td>&nbsp;</td>
 						   <td>&nbsp;</td>
 						  </tr>
  						 </tbody>  
 						</table>
 						
<?php
 if( isset($_GET['edit']) ) {
   $id = htmlspecialchars($_GET['edit']);
   echo '
							<form class="form-horizontal" role="form" action="?page=scripts/edit_link_boxes.php" method="post">
								<input type="hidden" name="id" value="'.$vars[$id]['id'].'" />
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="img">Link avatar</label>
					      <div class="col-sm-6">
					        <span><img src="'.$vars[$id]['img'].'" class="img-thumbnail"></span>
					        <span class="btn btn-info btn-file" id="img" onClick="imgUpload(\'images/member_activities/ma'.$id.'_img.jpg\',\'mudriyyet/admin_member_activities.php\');">Change logo</span>
					        <span class="help-block"><code class="text-info">Enforced resolution:200x100px; Max size:250KB</code></span>
					        <input type="hidden" name="img" value="images/member_activities/ma'.$id.'_img.jpg" />
					      </div>
					    </div>
							 
							  <div class="form-group">
							    <label for="heading" class="control-label col-sm-2">Heading</label>
							    <div class="col-sm-10">
							      <input type="text" name="heading" id="heading" class="form-control" value="'.$vars[$id]['heading'].'" />
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="href" class="control-label col-sm-2">URL</label>
							    <div class="col-sm-10">
							      <input type="text" name="href" id="href" class="form-control" value="'.$vars[$id]['href'].'" />
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="text" class="control-label col-sm-2">Short description</label>
							     <div class="col-sm-10">
  							      <textarea name="text" id="text" rows=5 class="form-control">'.$vars[$id]['text'].'</textarea>
							     </div>
							  </div>
							  <div class="form-group">
							    <div class="col-sm-offset-2">
							      <input type="submit" value="Edit" class="btn btn-warning" />
							    </div>
							  </div>
							</form>   
        ';
 }

?>