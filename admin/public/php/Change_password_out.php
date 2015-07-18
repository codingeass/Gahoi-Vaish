<?php
	try {
    require_once("connect.php");
    if(isset($_REQUEST["code"])&&isset($_REQUEST["email"])&&isset($_REQUEST["pass"])){

    $result=mysqli_query($mysql,"SELECT * FROM password_recovery WHERE `email`='".urldecode(strip_tags($_REQUEST["email"]))."' and code='".strip_tags(urldecode($_REQUEST["code"]))."'");
    if(mysqli_num_rows($result) > 0){
        $result=mysqli_query($mysql,"update user set password ='".md5(md5(urldecode(($_REQUEST["pass"]))))."' WHERE `email`='".strip_tags(urldecode($_REQUEST["email"]))."'");
        
        $result=mysqli_query($mysql,"DELETE FROM password_recovery WHERE `email`='".urldecode(strip_tags($_REQUEST["email"]))."' and code='".strip_tags(urldecode($_REQUEST["code"]))."'");

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

