<?php
require("sessionv.php");
require("connect.php");

if(isset($_REQUEST['inputFullName'])){
	if($_REQUEST['inputFullName']!="")
	{
		$query="update userprofile set `Full Name`='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputFullName'])))))."' where email='".trim(urldecode($_SESSION["email"]))."' ";
		$result=mysqli_query($mysql,$query);
	}
}

if(isset($_REQUEST['inputUsername'])){
	if($_REQUEST['inputUsername']!="")
	{
		$query="Select username from userprofile where username='".mysqli_real_escape_string($mysql,trim(urldecode(strip_tags($_REQUEST['inputUsername']))))."';";
		$result=mysqli_query($mysql,$query);
		if(mysqli_num_rows($result) == 0)
		{		
			$query="update userprofile set `username`='".mysqli_real_escape_string($mysql,trim(urldecode(strip_tags($_REQUEST['inputUsername']))))."' where email='".trim(urldecode($_SESSION["email"]))."'";
			$result=mysqli_query($mysql,$query);	
		}
	}
}

if(isset($_REQUEST['inputBirthday'])){
	if($_REQUEST['inputBirthday']!="")
	{
		$query="update userprofile set `date_of_birth`='".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputBirthday'])))))."' where email='".trim(urldecode($_SESSION["email"]))."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputSex'])){
	if($_REQUEST['inputSex']!="")
	{
		$sex=mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputSex'])))));
		if($sex=="1")	
			$sex='1';
		else
			$sex='2';
		$query="update userprofile set `gender`='".$sex."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputCity'])){
	if($_REQUEST['inputCity']!="")
	{
		$query="update userprofile set city='".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputCity'])))))."' where email='".trim(urldecode($_SESSION["email"]))."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputState'])){
	if($_REQUEST['inputState']!="")
	{
		$query="update userprofile set `state`='".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputState'])))))."' where email='".trim(urldecode($_SESSION["email"]))."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputCountry'])){
	if($_REQUEST['inputCountry']!="")
	{
		$query="update userprofile set `country`='".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputCountry'])))))."' where email='".trim(urldecode($_SESSION["email"]))."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputAboutMe'])){
	if(trim($_REQUEST['inputAboutMe'])!="")
	{
		$_REQUEST['inputAboutMe']=mysqli_real_escape_string($mysql,trim(($_REQUEST['inputAboutMe'])));
		$query="update userprofile set `About Me`='".$_REQUEST['inputAboutMe']."'  where email='".trim(urldecode($_SESSION["email"]))."'";
		$result=mysqli_query($mysql,$query);
	}
}


if(isset($_FILES['inputProfileImage'])){
	$file=$_FILES['inputProfileImage'];

	$file_name=$file['name'];
	$file_tmp=$file['tmp_name'];
	$file_size=$file['size'];
	$file_error=$file['error'];

	$file_ext=explode('.',$file_name);
	$file_ext=strtolower(end($file_ext));

	$allowed=array('jpg','jpeg','png');

	if(in_array($file_ext, $allowed)){
		if($file_error==0){
			if($file_size>=0){
				$file_name_new=$_SESSION["email"].'.'.$file_ext;
				$file_destination='../img/profile/'.$file_name_new;
				if(move_uploaded_file($file_tmp, $file_destination))
				{
					$query="update userprofile set image_location='".$file_name_new."' where email='".trim(urldecode($_SESSION["email"]))."';";
					$result=mysqli_query($mysql,$query);					
				}	
			}
		}
	}
}

if(isset($_FILES['inputWallImage'])){
	$file=$_FILES['inputWallImage'];

	$file_name=$file['name'];
	$file_tmp=$file['tmp_name'];
	$file_size=$file['size'];
	$file_error=$file['error'];

	$file_ext=explode('.',$file_name);
	$file_ext=strtolower(end($file_ext));

	$allowed=array('jpg','jpeg','png');

	if(in_array($file_ext, $allowed)){
		if($file_error==0){
			if($file_size>=0){
				$file_name_new=$_SESSION["email"].'1.'.$file_ext;
				$file_destination='../img/wall/'.$file_name_new;
				if(move_uploaded_file($file_tmp, $file_destination))
				{
					$query="update userprofile set wall_location='".$file_name_new."' where email='".$_SESSION["email"]."';";
					$result=mysqli_query($mysql,$query);                    					
				}	
			}
		}
	}
}




echo "<script>window.location.assign('profile.php');</script>";

?>