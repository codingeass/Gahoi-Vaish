<?php
	try {
    require_once("../php/connect.php");
    if (isset($_REQUEST['id'])&&isset($_REQUEST['code'])) {
      $id=mysqli_real_escape_string($mysql,trim(urldecode(strip_tags($_REQUEST['id']))));
      $code=mysqli_real_escape_string($mysql,trim(urldecode(strip_tags($_REQUEST['code']))));
      $result=mysqli_query($mysql,"SELECT * FROM verification WHERE `idverification`='".$id."' and verification_code='".$code."';");
      if(mysqli_num_rows($result) > 0){
        $id=0;
        while ($res=mysqli_fetch_assoc($result)) {
          if($res['verified']==1)
          {
            $result_sub=mysqli_query($mysql,"DELETE FROM verification WHERE idverification=".$id."");   
          }
          break;
        }
          }
          catch(Exception $en)
          { 
            echo "Not verified Yet";
          }

      }
      else
      {
        echo "Error occurred"
      }
    }
    else
      echo "Error occurred";

  } catch (Exception $e) {
    echo "Error occurred";
  }
?>