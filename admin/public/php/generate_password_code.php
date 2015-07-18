<?php
	try {
    require_once("connect.php");
    if(isset($_REQUEST["email"])){
    $result=mysqli_query($mysql,"SELECT * FROM user WHERE `email`='".urldecode(strip_tags($_REQUEST["email"]))."' ;");
    if(mysqli_num_rows($result) > 0){
        $confirm_code=md5(uniqid(rand()));
        $result=mysqli_query($mysql,"insert into password_recovery (email,code) values('".urldecode(strip_tags($_REQUEST["email"]))."','".$confirm_code."')");        
        
        try
        {
            $message="Click on the below URL to recover your password :<br/> <a href= 'http://localhost/wordpress-4.2.2/wordpress/admin/public/php/forgotpass.php?email=".urldecode($_REQUEST["email"])."&code=".urldecode($confirm_code)."'>http://localhost/wordpress-4.2.2/wordpress/admin/public/php/forgotpass.php?email=".urldecode($_REQUEST["email"])."&code=".urldecode($confirm_code)."</a>";
          
            require 'PHPMailerAutoload.php';
 
            $mail = new PHPMailer;
             
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'kiritoamandeep2@gmail.com';                   // SMTP username
            $mail->Password = 'lgexdavcdkgzseta';               // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
            $mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
            $mail->setFrom('kiritoamandeep2@gmail.com', 'Gahoi Vaish Samaj');     //Set who the message is to be sent from
            //$mail->addReplyTo('amandeeptheviper@gmail.com', 'First Last');  //Set an alternative reply-to address
            $mail->addAddress($_REQUEST["em"], $_REQUEST["na"]);  // Add a recipient
            $mail->addAddress('');               // Name is optional
            $mail->addCC('');
            $mail->addBCC('');
            $mail->WordWrap = 400;                                 // Set word wrap to 50 characters
            //`$mail->addAttachment('/usr/labnol/file.doc');         // Add attachments
            //$mail->addAttachment('20725.jpg', 'new.jpg'); // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
             
            $mail->Subject = 'Password Recovery : Gahoi Vaish Samaj';
            $mail->Body    = $message;
            $mail->AltBody = $message;
             
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
             
            if(!$mail->send()) {
               //echo 'Message could not be sent.';
              // echo 'Mailer Error: ' . $mail->ErrorInfo;
               exit;
            }

          }
          catch(Exception $en)
          { 
            echo "Mailing Problem";
          }

    }
      else{
     echo "Invalid Email";
      }  
  }else{
     echo "Try Again Later"; 
 }
	} catch (Exception $e) {
		echo $e->message;
	}
?>
