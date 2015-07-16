<?php
	try {
    require_once("connect.php");///? check for this
    session_start();
    {
    $result=mysqli_query($mysql,"SELECT `email`,`image_location`,`Full Name`,city,state,country FROM userprofile WHERE `id` in (select friendID from friends where id=".$_SESSION["id"].") ");
    echo '<?xml version="1.0" encoding="utf-8" standalone="no"?>
<!DOCTYPE friendList [
<!ELEMENT friendList (profile , email , image , name , address)>
<!ELEMENT profile (email , image , name , address)>
<!ELEMENT email (#PCDATA)>
<!ELEMENT image (#PCDATA)>
<!ELEMENT name (#PCDATA)>
<!ELEMENT address (#PCDATA)>
]>
';
    echo "<friendList>";
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
      echo "</friendList>";
  }

	} catch (Exception $e) {
		
	}
?>
