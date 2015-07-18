<?php
	try {
    require_once("../php/connect.php");///? check for this
    session_start();
    
    if (isset($_REQUEST['id'])) {
      $id=mysqli_real_escape_string($mysql,trim(urldecode(strip_tags($_REQUEST['id']))));
      $result=mysqli_query($mysql,"SELECT * FROM user WHERE `email`='".strip_tags($_SESSION["email"])."' and privileges=1;");
      if(mysqli_num_rows($result) > 0){
        $query="update verification set `verified`=1 where idverification=".$id."";
        $res=mysqli_query($mysql,$query)
        or die("Already verified");
      }
      else
      {
        echo "You Don't have Privilages"
      }
    }
    else
      echo "Error Occured";

  } catch (Exception $e) {
    echo "Error Occured";
  }
?>