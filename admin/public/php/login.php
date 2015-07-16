<?php

try{
if( isset($_REQUEST["pass"]) && isset($_REQUEST["email"]) )
{

		require_once("connect.php");
		$query="Select username,id from userprofile where email='".trim(urldecode(strip_tags($_REQUEST["email"])))."' and password='".md5(md5(urldecode(strip_tags($_REQUEST["pass"]))))."';";
		$result=mysqli_query($mysql,$query)
		or die("Error Occured");
		if(mysqli_num_rows($result) > 0)
		{
			while($res=mysqli_fetch_assoc($result))
			{
				session_start();
				$_SESSION["email"] = strip_tags($_REQUEST["email"]);
				$_SESSION["logti"]=time();
				$_SESSION["user"]=$res['username'];
				$_SESSION["uuid"]=md5($_SESSION["logti"].strip_tags($_REQUEST["pass"]));			
				$_SESSION["id"]=$res['id'];			
				setcookie("em","".strip_tags($_REQUEST["email"]),false,'/',false,false);
				echo "<script>window.location.assign('profile.php');</script>";
				echo "1";
				die();
			}
		}
		echo "0";
	}
}
catch (Exception $e) {
    echo  "<script>alert(".$e->getMessage().");</script>";
}

?>