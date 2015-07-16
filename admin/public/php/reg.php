<?php
try{
if( isset($_REQUEST["name"]) && isset($_REQUEST["email"]) && isset($_REQUEST["pass"]) && isset($_REQUEST["username"])) {
	require_once("connect.php");
	$query="Select * from userprofile where email='".trim(urldecode(strip_tags($_REQUEST["email"])))."';";
	$result=mysqli_query($mysql,$query);
	while($res=mysqli_fetch_assoc($result))
		exit ('Email is already registered');

	$query="Insert into userprofile (`Full Name`,email,password,username)values('".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST["name"])))))."','".mysqli_real_escape_string($mysql,trim(urldecode(strip_tags($_REQUEST["email"]))))."','".md5(md5(urldecode(strip_tags($_REQUEST["pass"]))))."','".mysqli_real_escape_string($mysql,urldecode(strip_tags($_REQUEST["username"])))."');";
	$result=mysqli_query($mysql,$query)
             or die("Invalid Entry");
    echo "Registered Successfully";
	
	/* Session start*/
		session_start();
		$_SESSION["email"] = strip_tags($_REQUEST["email"]);
		$_SESSION["logti"]=time();
		$_SESSION["user"]=$res['username'];
		$_SESSION["uuid"]=md5($_SESSION["logti"].strip_tags($_REQUEST["pass"]));			
		$_SESSION["id"]=$res['id'];			
		setcookie("em","".strip_tags($_REQUEST["email"]),false,'/',false,false);
	/* Session end*/

	$message="<img src='http://www.theviralfever.com/wp-content/uploads/2013/07/custom-logo.png'>Thank you ".$_SESSION["user"]."for registering on theViralFever and welcome to <em>Indias Premium youth entertainment network </em> <br/>";
	require ("phpmailer\PHPMailerAutoload.php");

	$mail = new PHPMailer;
	 
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'amandeeptheviper1@gmail.com';                   // SMTP username
	$mail->Password = 'kxwrdfptzsocxrfz';               // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
	$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
	$mail->setFrom('amandeeptheviper1@gmail.com', 'TvF');     //Set who the message is to be sent from
	//$mail->addReplyTo('amandeeptheviper@gmail.com', 'First Last');  //Set an alternative reply-to address
	$mail->addAddress(strip_tags($_REQUEST["email"]), $_SESSION["user"]);
	//$mail->addAddress("amandeeptheviper@gmail.com", "Amandeep Gupta");   // Add a recipient      
	$mail->addCC('');
	$mail->addBCC('');
	$mail->WordWrap = 400;                                 // Set word wrap to 50 characters
	//`$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
	//$mail->addAttachment('20725.jpg', 'new.jpg'); // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	 
	$mail->Subject = "Welcome to TVF";
	$mail->Body    = $message;
	$message="Thankyou ".$_SESSION["user"]."for registering in theViralFever and welcome to <em>Indias Premium youth entertainment network </em> <br/>";
	$mail->AltBody = $message;
	 
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	 
	if(!$mail->send()) {
	  // echo 'Message could not be sent.';
	  //echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}
//echo "<script>window.location.assign('profile.php');</script>";
}
else
echo "Invalid Entry";
}
catch (Exception $e) {
    echo  "<script>alert(".$e->getMessage().");</script>";
}
?>