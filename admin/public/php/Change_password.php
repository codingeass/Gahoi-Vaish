
<?php
	try {
    require_once("connect.php");///? check for this
    session_start();
    if(isset($_REQUEST["newPass"])&&isset($_REQUEST["oldPass"])){
    $result=mysqli_query($mysql,"SELECT * FROM user WHERE `email`='".strip_tags($_SESSION["email"])."' and password='".md5(md5(urldecode(strip_tags($_REQUEST["oldPass"]))))."'");
    if(mysqli_num_rows($result) > 0){
        $result=mysqli_query($mysql,"update user set password ='".md5(md5(urldecode(strip_tags($_REQUEST["newPass"]))))."' WHERE `email`='".strip_tags($_SESSION["email"])."'");
        
        echo "Updated Successfully";
    }
      else{
     echo "Invalid Password";
      }  
  }else{
     echo "Try Again Later"; 
 }
	} catch (Exception $e) {
		echo $e->message;
	}
?>

