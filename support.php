<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Mind | Contact Support</title>
        
        <link rel="stylesheet" type="text/css" href="assets/css/view.css" media="all">
        <link rel="stylesheet" href="assets/css/Animate.css">
    </head>
    <body id="main_body">
        <?php
		if(isset($_POST['email'])) {
		 
			// EDIT THE 2 LINES BELOW AS REQUIRED
			$email_to = "raymond.mortu@gmail.com";
			$email_subject = "Your email subject line";
		 
			function died($error) {
				// your error code can go here
				echo "We are very sorry, but there were error(s) found with the form you submitted. ";
				echo "These errors appear below.<br /><br />";
				echo $error."<br /><br />";
				echo "Please go back and fix these errors.<br /><br />";
				die();
			}
		 
		 
			// validation expected data exists
			if(!isset($_POST['element_1_1']) ||
				!isset($_POST['element_1_2']) ||
				!isset($_POST['element_3']) ||
				!isset($_POST['element_2_1']) ||
				!isset($_POST['element_4'])) {
				died('We are sorry, but there appears to be a problem with the form you submitted.');       
			}
		 
			 
		 
			$first_name = $_POST['element_1_1']; // required
			$last_name = $_POST['element_1_2']; // required
			$email_from = $_POST['element_3']; // required
			$telephone = $_POST['element_2_1']; // not required
			$comments = $_POST['element_4']; // required
		 
			$error_message = "";
			$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		 
		  if(!preg_match($email_exp,$email_from)) {
			$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
		  }
		 
			$string_exp = "/^[A-Za-z .'-]+$/";
		 
		  if(!preg_match($string_exp,$first_name)) {
			$error_message .= 'The First Name you entered does not appear to be valid.<br />';
		  }
		 
		  if(!preg_match($string_exp,$last_name)) {
			$error_message .= 'The Last Name you entered does not appear to be valid.<br />';
		  }
		 
		  if(strlen($comments) < 2) {
			$error_message .= 'The Comments you entered do not appear to be valid.<br />';
		  }
		 
		  if(strlen($error_message) > 0) {
			died($error_message);
		  }
		 
			$email_message = "Form details below.\n\n";
		 
			 
			function clean_string($string) {
			  $bad = array("content-type","bcc:","to:","cc:","href");
			  return str_replace($bad,"",$string);
			}
		 
			 
		 
			$email_message .= "First Name: ".clean_string($first_name)."\n";
			$email_message .= "Last Name: ".clean_string($last_name)."\n";
			$email_message .= "Email: ".clean_string($email_from)."\n";
			$email_message .= "Telephone: ".clean_string($telephone)."\n";
			$email_message .= "Comments: ".clean_string($comments)."\n";
		 
		// create email headers
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);  
		?>
        
        <img id="top" src="assets/img/top.png" alt="">
	<div id="form_container">
	
		<h1><a>Contact Support</a></h1>
		<form id="form_3213" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Contact Support</h2>
			<a href="index.php"><p class="animated infinite pulse">X</p></a>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Name </label>
		<span>
			<input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="8" value=""/>
			<label>First</label>
		</span>
		<span>
			<input id="element_1_2" name= "element_1_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Last</label>
		</span> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Phone </label>
		<span>
			<input id="element_2_1" name="element_2_1" class="element text" size="3" maxlength="3" value="" type="text"> -
			<label for="element_2_1">(###)</label>
		</span>
		<span>
			<input id="element_2_2" name="element_2_2" class="element text" size="3" maxlength="3" value="" type="text"> -
			<label for="element_2_2">###</label>
		</span>
		<span>
	 		<input id="element_2_3" name="element_2_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_2_3">####</label>
		</span>
		 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Email </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">How may we help you </label>
		<div>
			<textarea id="element_4" name="element_4" class="element textarea medium"></textarea> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="3213" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
		<div id="footer">
			
		</div>
	</div>
	<img id="bottom" src="assets/img/bottom.png" alt="">



	<script type="text/javascript" src="assests/js/view.js"></script> 
    </body>
</html>
<?php

}
?>