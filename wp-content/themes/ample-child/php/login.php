<?php

	if(isset($_REQUEST["email"])&&isset($_REQUEST["pass"]))
	{
		require("connect.php");
		$query="Select * from useraccount where email ='".urldecode(strip_tags($_REQUEST["email"]))."' and password='".md5(urldecode(strip_tags($_REQUEST["pass"])))."';";
		$result=mysql_query($query);
		$i=0;
		while($res=mysql_fetch_array($result))
		{
			session_start();
			$_SESSION["email"] = urldecode(strip_tags($_REQUEST["email"]));
			$_SESSION["id"]=$res['id'];
			$_SESSION["logti"]=time();			
			setcookie("em","".urldecode(strip_tags($_REQUEST["email"])),false,'/',false,false);
			setcookie("name","".urlencode($res["username"]),false,'/',false,false);
			$i++;
			//print_r($_SESSION);
			echo "login";		
		}
		if($i==0)
		echo "Incorrect Username or Password"; 
	} 
	else
		echo "Error Occurred Try Again Later";
	
?>