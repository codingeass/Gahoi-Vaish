<?php
	try {
    require_once("../php/connect.php");///? check for this
    session_start();
    if(isset($_REQUEST["email"])){
    $result=mysqli_query($mysql,"SELECT * FROM userprofile WHERE `email`='".strip_tags($_REQUEST["email"])."'");
    if(mysqli_num_rows($result) > 0){
        while($res=mysqli_fetch_assoc($result))
        {
          $id=$res['id'];
          $image=$res['image_location'];
          $wall=$res['wall_location'];
          $username=$res['username'];
          if($res['gender']=='1')
          {
            $gender="male";
          }
          else
            if($res['gender']=='2')
            $gender="female";
          else
            $gender="";

          $email=$res['email'];
          $about_me=$res['About Me'];
          $date_of_birth=$res['date_of_birth'];
          $city=$res['city'];
          if(empty($image))
          echo "Hello World";
          $country=$res['country'];
          $state=$res['state'];
          $website=$res['website'];
          $facebook=$res['facebook_username'];
          $twitter=$res['twitter_username'];
          $fullName=$res['Full Name'];
          break;
        }
    }
      else{
     echo "Error Occured";
      }  
  }else{
     echo "Invalid Email";
     die(); 
 }
	?>
    
        <div class="row" id="wall_display_section" style="background-image:url('../img/wall/<?php echo $wall; ?>');">
      <div class="col-md-12" style="font-size:18px;display:inline-block;">
        <br/>
        <br/>
        <br/>
        <img src="../img/profile/<?php echo $image; ?>" alt="Profile Image" style="height:150px;" class="img-thumbnail">
        &nbsp;&nbsp;&nbsp;
        <h2 style="display:inline-block;padding-top:2%;">@<?php echo $username; ?> 
        <?php 
          if($_SESSION["email"]!=$_REQUEST["email"])
          {

            $result=mysqli_query($mysql,"SELECT * FROM friends WHERE `id`=".$_SESSION["id"]." and `friendID`=".$id.";");
             if(mysqli_num_rows($result) > 0){
        ?> 
          <button  class="btn btn-primary" style="display:inline-block;" onclick="UnfriendRequest(<?php echo $id; ?>,'<?php echo $email; ?>')" >Unfriend</button>
          <?php 
            }
            else
            {
                $result=mysqli_query($mysql,"SELECT * FROM friend_request WHERE `id`=".$id." and `friendID`=".$_SESSION["id"].";");
             if(mysqli_num_rows($result) > 0){
             ?>
             <button  class="btn btn-primary" style="display:inline-block;" onclick="deleteFriendRequest(<?php echo $id; ?>,'<?php echo $email; ?>')" >Cancel Request</button>
             <?php
              }
              else
              {
                $result=mysqli_query($mysql,"SELECT * FROM friend_request WHERE `id`=".$_SESSION["id"]." and `friendID`=".$id.";");
               if(mysqli_num_rows($result) > 0){
             ?>
             <button  class="btn btn-primary" style="display:inline-block;" onclick="AcceptRequest(<?php echo $id; ?>,'<?php echo $email; ?>')" >Accept Request</button>
             <?php 
              }
              else
              {
             ?> 
             <button  class="btn btn-primary" style="display:inline-block;" onclick="sendFriendRequest(<?php echo $id; ?>,'<?php echo $email; ?>')" >Send Friend Request</button>
            <?php
            }
          }
        }
      }
          ?>
        </h2>
      </div>
    </div>
    <br/>
    <br/>

    <div class="row">

      <div class="col-md-8" id="display_profile_section" style="font-size:18px;display:inline-block;" id="profile_view_text">
        <dl class="dl-horizontal">
          <dt>Username :</dt>
          <dd><?php echo $username; ?> &nbsp;&nbsp; </dd>
          <dt>Name :</dt>
          <dd><?php echo ucwords($fullName); ?></dd>
          <dt>Email :</dt>
          <dd><?php echo $email; ?></dd>
          <dt>Sex :</dt>
          <dd><?php echo ucwords($gender); ?></dd>
          <dt>Date of Birth :</dt>
          <dd><?php echo $date_of_birth; ?></dd>
          <dt>Lives :</dt>
          <dd><?php echo ucwords($city) . ', '.ucwords($state).', '.ucwords($country); ?></dd>
          <dt>About Me :</dt>
          <dd>
            <?php echo ($about_me); ?>
          </dd>
          
        </dl>
      </div>
     </div>

  <?php
  } catch (Exception $e) {
    
  }
  ?>