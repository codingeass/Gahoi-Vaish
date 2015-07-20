<?php
require("sessionv.php");
require("connect.php");

$email=trim(urldecode($_SESSION["email"]));
if(isset($_REQUEST['inputFullName'])){
	if($_REQUEST['inputFullName']!="")
	{
		$query="update user set name='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputFullName'])))))."' where email='".$email."' ";
		$result=mysqli_query($mysql,$query);
	}
}


if(isset($_REQUEST['inputBirthday'])){
	if($_REQUEST['inputBirthday']!="")
	{
		$query="update user set `date_of_birth`='".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputBirthday'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}

if(isset($_REQUEST['sex'])){
	if($_REQUEST['sex']!="")
	{
		$sex=mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['sex'])))));
		if($sex=="1")	
			$sex='1';
		else
			$sex='2';
		$query="update user set `sex`=".$sex." where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputCity'])){
	if($_REQUEST['inputCity']!="")
	{
		$query="update user set residence_city='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputCity'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputState'])){
	if($_REQUEST['inputState']!="")
	{
		$query="update user set `residence_state`='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputState'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputAddress'])){
	if($_REQUEST['inputAddress']!="")
	{
		$query="update user set `residence_address`='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputAddress'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputFH'])){
	if(trim($_REQUEST['inputFH'])!="")
	{
		$_REQUEST['inputFH']=mysqli_real_escape_string($mysql,trim(($_REQUEST['inputFH'])));
		$query="update user set `Father_husband`='".$_REQUEST['inputFH']."'  where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}

if(isset($_REQUEST['inputGotra'])){
	if($_REQUEST['inputGotra']!="")
	{
		$query="update user set `gotra`='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputGotra'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputAakana'])){
	if($_REQUEST['inputAakana']!="")
	{
		$query="update user set `aakana`='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputAakana'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputDomicile'])){
	if($_REQUEST['inputDomicile']!="")
	{
		$query="update user set `domicile`='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputDomicile'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputBlood'])){
	if($_REQUEST['inputBlood']!="")
	{
		$query="update user set `bloodGroup`='".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputBlood'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputEducation'])){
	if($_REQUEST['inputEducation']!="")
	{
		$query="update user set `Education`='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputEducation'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputOccupation'])){
	if($_REQUEST['inputOccupation']!="")
	{
		$query="update user set `Occupation`='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputOccupation'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputCompany'])){
	if($_REQUEST['inputCompany']!="")
	{
		$query="update user set `company_name`='".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST['inputCompany'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}

if(isset($_REQUEST['inputPincode'])){
	if($_REQUEST['inputPincode']!="")
	{
		$query="update user set `pincode`=".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputPincode'])))))." where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputMarital'])){
	if($_REQUEST['inputMarital']!="")
	{
		$query="update user set `Marital Status`=".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputMarital'])))))." where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputMobile'])){
	if($_REQUEST['inputMobile']!="")
	{
		$query="update user set `mobile_no`='".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputMobile'])))))."' where email='".$email."'";
		$result=mysqli_query($mysql,$query);
	}
}
if(isset($_REQUEST['inputLandline'])){
	if($_REQUEST['inputLandline']!="")
	{
		$query="update user set `landline_no`='".mysqli_real_escape_string($mysql,trim((urldecode(strip_tags($_REQUEST['inputLandline'])))))."' where email='".$email."'";
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
					$query="update user set image_location='".$file_name_new."' where email='".$email."';";
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
					$query="update user set wall_location='".$file_name_new."' where email='".$_SESSION["email"]."';";
					$result=mysqli_query($mysql,$query);                    					
				}	
			}
		}
	}
}




echo "<script>window.location.assign('profile.php');</script>";

?>