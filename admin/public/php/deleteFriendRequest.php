<?php
	try {
    require_once("connect.php");///? check for this
    session_start();
    if(isset($_REQUEST['id']))
    {
    $result=mysqli_query($mysql,"delete from `friend_request` where `id`=".$_REQUEST['id']." and `friendID`=".$_SESSION['id']."");
    }

	} catch (Exception $e) {
	 echo "Try Again Later";	
	}
?>
