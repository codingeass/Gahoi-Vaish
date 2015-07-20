<?php
	try {
    require_once("connect.php");
    if(isset($_REQUEST["code"])&&isset($_REQUEST["email"])&&isset($_REQUEST["pass"])){
     $email= mysqli_real_escape_string($mysql,strip_tags(urldecode($_REQUEST["email"])));
     $code=mysqli_real_escape_string($mysql,strip_tags(urldecode($_REQUEST["code"])));
    $result=mysqli_query($mysql,"SELECT * FROM password_recovery WHERE `email`='".$email."' and code='".$code."'");
    if(mysqli_num_rows($result) > 0){
        $result=mysqli_query($mysql,"update user set password ='".md5(md5(urldecode($_REQUEST["pass"])))."' WHERE `email`='".$email."'");
        
        $result=mysqli_query($mysql,"DELETE FROM password_recovery WHERE `email`='".$email."' and code='".$code."'");

        echo "Updated Successfully";
    }
      else{
     echo "Invalid Code";
      }  
  }else{
     echo "Try Again Later"; 
 }
	} catch (Exception $e) {
		echo $e->message;
	}
?>

