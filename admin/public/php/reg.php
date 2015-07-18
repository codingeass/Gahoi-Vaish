<?php
try{
if( isset($_REQUEST["name"]) && isset($_REQUEST["email"]) && isset($_REQUEST["pass"]) && isset($_REQUEST["mobile"])) {
	require_once("connect.php");
	$query="Select * from user where email='".trim(urldecode(strip_tags($_REQUEST["email"])))."';";
	$result=mysqli_query($mysql,$query);
    if(mysqli_num_rows($result) > 0)
    {
        exit ('Email is already registered');
    }
	$query="Insert into user (name,email,password,mobile_no) values('".mysqli_real_escape_string($mysql,trim(strtolower(urldecode(strip_tags($_REQUEST["name"])))))."','".mysqli_real_escape_string($mysql,trim(urldecode(strip_tags($_REQUEST["email"]))))."','".md5(md5(urldecode(($_REQUEST["pass"]))))."',".mysqli_real_escape_string($mysql,urldecode(strip_tags($_REQUEST["mobile"]))).");";
	$result=mysqli_query($mysql,$query)
             or die(mysqli_error($mysql));
    $query="Select id from user where email='".trim(urldecode(strip_tags($_REQUEST["email"])))."';";
    $result=mysqli_query($mysql,$query)
             or die("Invalid Entry");
    while ($res=mysqli_fetch_assoc($result)) {
    	$sub_query="Insert into verification (idverification,verification_code) values(".$res['id'].",'".md5(uniqid(rand()))."');";         	
    	$res_query=mysqli_query($mysql,$sub_query)
             or die(mysqli_error($mysql));
             break;
    }
    echo "1";
}
else
echo "Invalid Entry";
}
catch (Exception $e) {
    echo  "<script>alert(".$e->getMessage().");</script>";
}
?>