<?php
  try {
    require_once("connect.php");///? check for this
    session_start();
    {
    $result=mysqli_query($mysql,"SELECT `email`,`image_location`,name,residence_city,residence_state FROM user natural join marriage where allow=1 ");
    echo '<?xml version="1.0" encoding="utf-8" standalone="no"?>
<!DOCTYPE searchProfile [
<!ELEMENT search_result (profile , email , image , name , address)>
<!ELEMENT profile (email , image , name , address)>
<!ELEMENT email (#PCDATA)>
<!ELEMENT image (#PCDATA)>
<!ELEMENT name (#PCDATA)>
<!ELEMENT address (#PCDATA)>]>
';
    echo "<search_result>";
    if(mysqli_num_rows($result) > 0){
        while($res=mysqli_fetch_assoc($result))
        {
          echo "<profile>";
          echo "<email>".$res['email']."</email>";
          echo "<image>".$res['image_location']."</image>";
          echo "<name>".$res['name']."</name>";
          echo "<address>".ucfirst($res['residence_city'])." ".ucfirst($res['residence_state'])."</address>";
          echo "</profile>";
        }
    }
      else{
     echo "";
      }  
      echo "</search_result>";
  }
  } catch (Exception $e) {
    
  }
?>
