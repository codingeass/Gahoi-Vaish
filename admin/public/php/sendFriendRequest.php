<?php
	try {
    require_once("connect.php");///? check for this
    session_start();
    if(isset($_REQUEST['id']))
    {
    $result=mysqli_query($mysql,"insert into friend_request values(".$_REQUEST['id'].",".$_SESSION['id'].")");
    }

	} catch (Exception $e) {
	 echo "Try Again Later";	
	}
?>
