<?php session_start(); ?>
<?php
  try {
    require_once("../php/connect.php");///? check for this
    $result=mysqli_query($mysql,"SELECT allow FROM marriage where id= ".$_SESSION['id'].";");
    $type=0;
    if(mysqli_num_rows($result) > 0){
        $result_sub=mysqli_query($mysql,"SELECT allow FROM marriage where id= ".$_SESSION['id']." and allow=1;");
        if(mysqli_num_rows($result_sub) > 0)
        {
          $type=1;
        }
    }
  } catch (Exception $e) {
    
  }
?>

<div style="margin-top:50px;font-size:18px;">
  <h2 class=" text-center control-label">Marriage</h2>
  <hr/>
  <form class="form-horizontal" action="" method="post" onsubmit="return false">          
              
            <div class="form-group">
                    <label class="col-sm-6 control-label">Select allow to display your profile in marriage section:</label>
                    <div class="col-sm-6">
                      <label class="radio-inline">
                        <input type="radio"  id="marriage1" name="marriage" value="1" <?php if($type==1) echo "checked" ?> > Allow
                      </label>
                      <label class="radio-inline">
                        <input type="radio" id="marriage2" name="marriage" value="0" <?php if($type==0) echo "checked" ?>> Deny
                      </label>
                    </div>
                    
            </div>
            <div class="form-group text-center">
              <button  class="btn btn-primary" id="Submit_button_profile" style="display:inline-block;" onclick="marriage_status_update()" >Update</button>
            </div>
        </form>

        <div class="row">
          <div class="col-sm-11" id="display_search_result">

          </div>
        </div>
</div>

