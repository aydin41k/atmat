<?php
include "scripts/db_classes.php";
include "scripts/db_connect.php";
include "scripts/variables.php";
include "scripts/session_classes.php";
include "frame/header.php";
?>
   <div id="mid_bar">
     <img src="http://atmat.org.au/v3/images/template/mid_pic.jpg" id="about-page-logo" class="img-responsive" />
   </div>
   <div id="general_frame">
      <div class="news_holder">
       <div class="text-center">
         <h2><strong>Contact us</strong></h2>
       </div>
<?php
  if( isset($_POST['contact_name']) ) {
    if( empty($_POST['contact_message']) ) {
     echo '<span class="help-block"><code class="text-danger">Please do not forget to type in your message before submitting.</code></span>';
    }
    else {
     $name = htmlspecialchars($_POST['contact_name']);
     $email = htmlspecialchars($_POST['contact_email']);
     $phone = (htmlspecialchars($_POST['contact_phone'])) ? htmlspecialchars($_POST['contact_name']) : '';
     $message = 'Name: '.$name."\r\n".'E-mail: '.$email."\r\n".'Phone: '.$phone."\r\n".'Message: '.htmlspecialchars($_POST['contact_message']);
     $headers = 'From: webmaster@atmat.org.au'."\r\n".'Reply-to: '.$email;
       if( mail('aydin4ik@gmail.com','Message from ATMAT Contact Form',$message,$headers) ) {
         echo '<div class="text-center">
           <p>Your message has been submitted. We will be in touch with you shortly.</p>
           </div>';
         return;
       }
       else {
        echo 'Message not submitted. Please try again.';
       }
    }
  }
?>
       <div class="text-center">
       <p>Please fill out the below form to send us your message. Alternatively, you can <a href="http://www.facebook.com/atmat.asgoa/">message us on Facebook</a>.</p>
       </div>
       <div class="container-fluid">
       <div class="row">
	<form class="form-horizontal" role="form" method="post">
	  <div class="form-group">
	    <label for="contact_name" class="control-label col-sm-2">Name</label>
	    <div class="col-sm-10">
            <input type="text" name="contact_name" id="contact_name" class="form-control" placeholder="Your name" required />
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="contact_email" class="control-label col-sm-2">E-mail</label>
	    <div class="col-sm-10">
            <input type="email" name="contact_email" id="contact_email" class="form-control" placeholder="Your e-mail address" required />
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="contact_phone" class="control-label col-sm-2">Phone</label>
	    <div class="col-sm-10">
            <input type="text" name="contact_phone" id="contact_phone" class="form-control" placeholder="Your phone number" />
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="contact_message" class="control-label col-sm-2">Your message</label>
	    <div class="col-sm-10">
            <textarea rows="8" name="contact_message" id="contact_message" class="form-control" placeholder="Message"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-2 col-sm-offset-2">
              <input type="submit" value="Submit" class="btn btn-info form-control" />
	    </div>
	  </div>
	</form>
        </div>
        </div>
      </div>
   </div>
 </div>

<?php
  include "frame/footer.php";
?>