<?php session_start(); ?>
<?php
  try {
    require_once("../php/connect.php");///? check for this
    if(isset($_REQUEST['allow']))
    $result=mysqli_query($mysql,"SELECT allow FROM marriage where id= ".$_SESSION['id'].";");
    $type=0;
    if(mysqli_num_rows($result) > 0){
      $result_sub=mysqli_query($mysql,"update marriage set allow = ".mysqli_real_escape_string($mysql,strip_tags($_REQUEST['allow']))." where id=".$_SESSION['id'].";");  
    }
    else{
      $result_sub=mysqli_query($mysql,"insert into marriage (id,allow) values(".$_SESSION['id'].", ".mysqli_real_escape_string($mysql,strip_tags($_REQUEST['allow'])).");");
    }
    echo "Updated Successfully";
  } catch (Exception $e) {
    echo "error occurred";  
  }
?>