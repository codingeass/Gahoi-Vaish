<?php
	try {
    require_once("connect.php");///? check for this
    session_start();
    if(isset($_REQUEST["search_val"])){
    $result=mysqli_query($mysql,"SELECT `email`,`image_location`,`Full Name`,city,state,country FROM userprofile WHERE `username` like '%".trim(strtolower(strip_tags(urldecode($_REQUEST["search_val"]))))."%' Or `Full Name` like '%".trim(strtolower(strip_tags(urldecode($_REQUEST["search_val"]))))."%'");
    echo '<?xml version="1.0" encoding="utf-8" standalone="no"?>
<!DOCTYPE searchProfile [
<!ELEMENT search_result (profile , email , image , name , address)>
<!ELEMENT profile (email , image , name , address)>
<!ELEMENT email (#PCDATA)>
<!ELEMENT image (#PCDATA)>
<!ELEMENT name (#PCDATA)>
<!ELEMENT address (#PCDATA)>
]>
';
    echo "<search_result>";
    if(mysqli_num_rows($result) > 0){
        while($res=mysqli_fetch_assoc($result))
        {
        	echo "<profile>";
        	echo "<email>".$res['email']."</email>";
      		echo "<image>".$res['image_location']."</image>";
      		echo "<name>".$res['Full Name']."</name>";
      		echo "<address>".ucfirst($res['city'])." ".ucfirst($res['state'])." ".ucfirst($res['country'])."</address>";
        	echo "</profile>";
        }
    }
      else{
     echo "";
      }  
      echo "</search_result>";
  }else{
     echo "Invalid Value"; 
 }
	} catch (Exception $e) {
		
	}
?>
