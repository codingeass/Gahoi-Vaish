<?php
	try {
    require_once("connect.php");///? check for this
    session_start();
    if(isset($_REQUEST['id']))
    {
    $result=mysqli_query($mysql,"insert into friends values(".$_SESSION['id'].",".$_REQUEST['id'].")");
    $result=mysqli_query($mysql,"insert into friends values(".$_REQUEST['id'].",".$_SESSION['id'].")");
    $result=mysqli_query($mysql,"delete from `friend_request` where `id`=".$_SESSION['id']." and `friendID`=".$_REQUEST['id']."");
    }

	} catch (Exception $e) {
	 echo "Try Again Later";	
	}
?>
