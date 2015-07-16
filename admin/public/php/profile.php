<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/style.css"/>
<link rel="stylesheet" href="../css/bootstrap-social.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<link rel="icon" type="/image/png" href="" />
<title></title>
</head>
<body>
  
  <div class="jumbotron" id="small_jumbotron">
    
  <div class="container-fluid row">
  <div class="media col-md-8">
    <div class="media-left">
      <a href="#">
        <img class="media-object" src="../img/custom-logo.png" style="max-height:70px;" alt="Gahoi Vaish Samaj">
      </a>
    </div>
    <div class="media-body">
      <h2 class="media-heading" style="inline-block">Gahoi Vaish Samaj</h2>
    </div>
  </div>

<?php
  try{
    require_once("connect.php");
    session_start();
    if(isset($_SESSION["email"])){
    $result=mysqli_query($mysql,"SELECT * FROM userprofile WHERE `email`='".strip_tags($_SESSION["email"])."'");
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
          //print_r($res);
          break;
        }
    }
      else{
     echo "<script>window.location.assign('../views/login.html');</script>";
     die();
      }  
  }else{
     echo "<script>window.location.assign('../views/login.html');</script>";
     die();
      } 
}
 catch(Exception $e)
 {
  echo $e->Message;
  //echo "<script>window.location.assign('../views/login.html');</script>";
 }
  ?>

    <div class="col-md-4">
  <div class="btn-group" role="group" style="float:right;">
      <a type="button" class="btn btn-default" id="img_button" href=""><img class="media-object" src="../img/profile/<?php echo $image; ?>" alt="profile picture" style="height:50px;"></a>
      <div class="btn-group">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span id="message_username"><?php echo ucwords($fullName); ?></span> <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#" onclick="Edit_profile()">Edit Profile</a></li>
        <li><a href="#" onclick="Change_password()">Change Passowrd</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li class="divider"></li>
        <li><a href="#">Policy</a></li>
      </ul>
     </div>
  </div>
  </div>

  </div>
  </div>


  <div class="container-fluid" >

    <div class="row" >

    <div class="col-md-2" style="background-color:white;">
      <br/>
            
      <ul class="nav nav-pills nav-stacked">
      <li class="active" onclick="display_profile_section()">
      <a href="#">
         <span class="glyphicon glyphicon-home"> Profile
      </a>
      </li>

      <li class="active" onclick="Edit_profile()">
      <a href="#">
        <span class="badge pull-left"></span>
          <span class="glyphicon glyphicon-user"></span> Edit Profile
      </a>
      </li>

      <li class="active" onclick="display_search_section()">
      <a href="#">
        <span class="badge pull-left"></span>
        <span class="glyphicon glyphicon-search"></span> Search Profile
      </a>
      </li>


      <li class="active" style="display:none">
      <a href="#">
        <span class="badge pull-right"></span>
          <span class="glyphicon glyphicon-user"></span> Matrimonial Info
      </a>
      </li>
</ul>
    </div>

    <div class="col-md-10" style="background-color:white;">
    
    <div class="row">
      <div class="col-md-12" id="view_display" style="display:none;">

      </div>
    </div>

    <div class="row" id="wall_display_section" style="background-image:url('../img/wall/<?php echo $wall; ?>');">
      <div class="col-md-12" style="font-size:18px;display:inline-block;">
        <br/>
        <br/>
        <br/>
        <img src="../img/profile/<?php echo $image; ?>" alt="Profile Image" style="height:150px;" class="img-thumbnail">
        &nbsp;&nbsp;&nbsp;
        <h2 style="display:inline-block;padding-top:2%;">@<?php echo $username; ?></h2>
      </div>


    </div>
    <br/>
    <br/>
    <div class="row" id="profile">

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

      <div class="col-md-8" id="edit_profile_section" style="display:none;">
        <form class="form-horizontal" name="updateProfile" action="updateprofile.php" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
                <label for="inputFullName" class="col-sm-2 control-label">Full Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputFullName" name="inputFullName" placeholder="Full Name" value="<?php echo ucwords($fullName); ?>" >
                </div>
              </div>

            <div class="form-group">
                <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Username" value=<?php echo $username; ?>>
                </div>
              </div>
            
            <div class="form-group">
                <label for="inputBirthday" class="col-sm-2 control-label">Date of Birth</label>
                <div class="col-sm-10">
                  <input type="date" name="inputBirthday" id="inputBirthday" value="<?php echo ($date_of_birth); ?>" ><br>
                </div>
              </div>
            
            <div class="form-group">
                <label for="inputSex" class="col-sm-2 control-label">Sex</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                  <input type="radio" name="inputSex" id="inputSex1" value="1" <?php if($gender=='male') echo "checked" ?> > Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="inputSex" id="inputSex2" value="2" <?php if($gender=='female') echo "checked" ?> > Female
                </label>
                </div>
              </div>

            <div class="form-group">
                <label for="inputCity" class="col-sm-2 control-label">City</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="city" value="<?php echo ucwords($city); ?>" >
                </div>
              </div>

              <div class="form-group">
                <label for="inputState" class="col-sm-2 control-label">State</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputState" name="inputState" placeholder="State" value="<?php echo ucwords($state);?>" >
                </div>
              </div>

              <div class="form-group">
                <label for="inputCountry" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputCountry" name="inputCountry" placeholder="Country" value="<?php echo ucwords($country);?>" >
                </div>
              </div>


            <div class="form-group">
                <label for="inputAboutMe" class="col-sm-2 control-label">About Me</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="inputAboutMe" rows="5" name="inputAboutMe"><?php echo ($about_me);?></textarea>
                </div>
              </div>
            
           <div class="form-group">
                <label for="inputProfileImage" class="col-sm-2 control-label">Profile Image</label>
                <div class="col-sm-10">
                  <input type="file" id="inputProfileImage" name="inputProfileImage">
                </div>
              </div>

              <div class="form-group">
                <label for="inputWallImage" class="col-sm-2 control-label">Wall Image</label>
                <div class="col-sm-10">
                  <input type="file" id="inputWallImage" name="inputWallImage">
                </div>
              </div>

            <div class="form-group text-center">
              <div class="">
                <button  class="btn btn-primary" id="back_button_profile" style="display:inline-block;" onclick="back_button_profile()">Back</button>
                <button  type="submit" class="btn btn-primary" id="Submit_button_profile" style="display:inline-block;">Update Changes</button>

              </div>
            </div>

            <div class="form-group text-center" id="error_message" style="font-size:18px;color:red;">

            </div>

        </form>

      </div>


      <div class="col-md-8" id="change_password_section" style="display:none;">
        
        <form class="form-horizontal" action="" method="post" onsubmit="return false">           
            <div class="form-group">
                <label for="inputOldPassword" class="col-sm-4 control-label">Confirm Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputOldPassword" name="inputOldPassoword" placeholder="***********">
                </div>
              </div>

            <div class="form-group">
                <label for="inputNewPassword" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputNewPassword" name="inputNewPassword" placeholder="***********">
                </div>
              </div>
            
            <div class="form-group">
                <label for="inputCNewPassword" class="col-sm-4 control-label">Confirm Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="inputCNewPassword" id="inputCNewPassword" placeholder="***********" >
                </div>
              </div>
            
            <div class="form-group text-center">
              <div class="">
                <button  class="btn btn-primary" id="back_button_profile" style="display:inline-block;" onclick="back_button_profile1()">Back</button>
                <button  class="btn btn-primary" id="Submit_button_profile" style="display:inline-block;" onclick="change_password_up()" >Update Password</button>
              </div>
            </div>

            <div class="form-group text-center" id="error_message_p" style="font-size:18px;color:red;">

            </div>

        </form>

      </div>

    </div>

    </div>
    </div>

  </div>
<div class="container-fluid" style="padding-bottom:0px;position:fixed;bottom:0px;">
    <div class="panel panel-footer" style="margin-bottom:0px;">@Copyright theviralfever</div>
  </div>

  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
</body>


</html>