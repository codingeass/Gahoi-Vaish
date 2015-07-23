<?php session_start(); ?>
<?php

try{
if( isset($_REQUEST["pass"]) && isset($_REQUEST["email"]) )
{	
		require_once("connect.php");
		$email=mysqli_real_escape_string($mysql,trim(urldecode(strip_tags($_REQUEST["email"]))));
		$query="Select id from user where email='".$email."' and password='".md5(md5(urldecode($_REQUEST["pass"])))."';";
		$result=mysqli_query($mysql,$query)
		or die("Error Occured");
		if(mysqli_num_rows($result) > 0)
		{
			while($res=mysqli_fetch_assoc($result))
			{
				$sub_query="Select idverification,verified from verification where idverification=".$res['id'].";";
				$sub_result=mysqli_query($mysql,$sub_query)
				or die(mysqli_error($mysql));
				if(mysqli_num_rows($sub_result) > 0)
				{
					while($sub_res=mysqli_fetch_assoc($sub_result))
					{
						if($sub_res["verified"]==0)
							echo "4";//4 means not verified by the admin
						else
							echo "3";//means to be verified from the user
						die();
					}
				}
				$_SESSION["email"] = $email;
				$_SESSION["logti"]=time();
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