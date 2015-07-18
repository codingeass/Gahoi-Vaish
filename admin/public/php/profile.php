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
    $result=mysqli_query($mysql,"SELECT * FROM user WHERE `email`='".strip_tags($_SESSION["email"])."'");
    if(mysqli_num_rows($result) > 0){
        while($res=mysqli_fetch_assoc($result))
        {
          $id=$res['id'];
          $name=$res['name'];
          $image=$res['image_location'];
          $wall=$res['wall_location'];
          $mobile=$res['mobile_no'];
          if($res['sex']=='1')
          {
            $gender="male";
          }
          else
            if($res['sex']=='2')
            $gender="female";
          else
            $gender="";

          $email=$res['email'];
          if($res['Marital Status']=='1')
          {
            $marital="Married";
          }
          else
            if($res['Marital Status']=='2')
            $marital="Unmarried";
          else
            if($res['Marital Status']=='3')
            $marital="Widow";
          else
            if($res['Marital Status']=='4')
            $marital="Divorce";
          else
            if($res['Marital Status']=='5')
            $marital="Widower";
          else
            if($res['Marital Status']=='0')
            $marital="";
          else  
            $marital="";

          $date_of_birth=$res['date_of_birth'];
          $fatherHus=$res['Father_husband'];
          $domicile=$res['domicile'];
          $address=$res['residence_address'];
          $city=$res['residence_city'];
          $state=$res['residence_state'];
          $pincode=$res['pincode'];
          $landline=$res['landline_no'];
          $bloodGroup=$res['bloodGroup'];
          $education=$res['Education'];
          $occupation=$res['Occupation'];
          $gotra=$res['gotra'];
          $aakana=$res['aakana'];
          $company=$res['company_name'];
          $privileges=$res['privileges'];
          //print_r($res);
          break;
        }
    }
      else{
     echo "<script>window.location.assign('../../index.html');</script>";
     die();
      }  
  }else{
     echo "<script>window.location.assign('../../index.html');</script>";
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
        <span id="message_username"><?php echo ucwords($name); ?></span> <span class="caret"></span>
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

      <li class="active" onclick="display_allow_user_section()">
      <a href="#">
        <span class="badge pull-left"></span>
        <span class="glyphicon glyphicon-edit"></span> Allow Users
      </a>
      </li>

      <li class="active" onclick="display_allow_user_section()">
      <a href="#">
        <span class="badge pull-left"></span>
        <span class="glyphicon glyphicon-trash"></span> Delete Users
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
        <h2 style="display:inline-block;padding-top:2%;"><?php echo ucwords($name); ?></h2>
      </div>


    </div>
    <br/>
    <br/>
    <div class="row" id="profile">

      <div class="col-md-8" id="display_profile_section" style="font-size:18px;display:inline-block;" id="profile_view_text">
        <dl class="dl-horizontal">
          <dt>Name :</dt>
          <dd><?php echo ucwords($name); ?></dd>
          <dt>Email :</dt>
          <dd><?php echo $email; ?></dd>
          <dt>Sex :</dt>
          <dd><?php echo ucwords($gender); ?></dd>
          <dt>Date of Birth :</dt>
          <dd><?php echo $date_of_birth; ?></dd>
          <dt>Lives :</dt>
          <dd><?php echo ucwords($address) . ', '. ucwords($city) . ', '.ucwords($state).'- '.ucwords($pincode); ?></dd>
          <dt>Mobile No. :</dt>
          <dd><?php echo $mobile; ?></dd>
          <dt>Marital Status :</dt>
          <dd><?php echo $marital; ?></dd>
          <dt>Father/Husband :</dt>
          <dd><?php echo $fatherHus; ?></dd>
          <dt>Domicile :</dt>
          <dd><?php echo $domicile; ?></dd>
          <dt>Landline No. :</dt>
          <dd><?php echo $landline; ?></dd>
          <dt>bloodGroup :</dt>
          <dd><?php echo $bloodGroup; ?></dd>
          <dt>Education :</dt>
          <dd><?php echo $education; ?></dd>
          <dt>Occupation :</dt>
          <dd><?php echo $occupation; ?></dd>
          <dt>Gotra :</dt>
          <dd><?php echo $gotra; ?></dd>
          <dt>Aakana :</dt>
          <dd><?php echo $aakana; ?></dd>
          <dt>Company :</dt>
          <dd><?php echo $company; ?></dd>
          
          
        </dl>
      </div>

      <div class="col-md-8" id="edit_profile_section" style="display:none;">
        <form class="form-horizontal" name="updateProfile" action="updateprofile.php" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
                  <h3><div class="text-center" id="Login_header_text">Update Info</div></h3>
               </div>
               <hr/>
                  
                  <div class="form-group">
                      <label for="inputFullName" class="col-sm-3 control-label">Full Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputFullName" name="inputFullName" placeholder="Full Name" value="<?php echo ($name); ?>">
                      </div>
                    </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Sex</label>
                    <div class="col-sm-9">
                      <label class="radio-inline">
                        <input type="radio"  id="sex1" name="sex" value="1" <?php if($gender=='male') echo "checked" ?> > Male
                      </label>
                      <label class="radio-inline">
                        <input type="radio" id="sex2" name="sex" value="2" <?php if($gender=='female') echo "checked" ?>> Female
                      </label>
                    </div>
                    </div>
                  <div class="form-group">
                      <label for="inputBirthday" class="col-sm-3 control-label">Date of Birth</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="inputBirthday" id="inputBirthday" value="<?php echo ($date_of_birth); ?>">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="inputFH" class="col-sm-3 control-label">Father/Husband</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputFH" name="inputFH" placeholder="Full Name" value="<?php echo ($fatherHus); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputGotra" class="col-sm-3 control-label">Gotra</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputGotra" name="inputGotra" placeholder="eg. Gagal" value="<?php echo ($gotra); ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputAakana" class="col-sm-3 control-label">Aakana</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputAakana" name="inputAakana" placeholder="eg. Nogariya" value="<?php echo ($aakana); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputDomicile" class="col-sm-3 control-label">Domicile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputDomicile" name="inputDomicile" placeholder="Lucknow" value="<?php echo ($domicile); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputBlood" class="col-sm-3 control-label">Blood Group</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputBlood" name="inputBlood" placeholder="B+" value="<?php echo ($bloodGroup); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEducation" class="col-sm-3 control-label">Education</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEducation" name="inputEducation" placeholder="Full Name" value="<?php echo ($education); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputOccupation" class="col-sm-3 control-label">Occupation</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputOccupation" name="inputOccupation" placeholder="Occupation" value="<?php echo ($occupation); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputCompany" class="col-sm-3 control-label">Company Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputCompany" name="inputCompany" placeholder="Company" value="<?php echo ($company); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputAddress" class="col-sm-3 control-label">Residency Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="address" value="<?php echo ($address); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputCity" class="col-sm-3 control-label">City</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="City" value="<?php echo ($city); ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputState" class="col-sm-3 control-label">State</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputState" name="inputState" placeholder="Uttar Pradesh" value="<?php echo ($state); ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputPincode" class="col-sm-3 control-label">Pincode</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="inputPincode" name="inputPincode" placeholder="226010" value="<?php echo ($pincode); ?>">
                      </div>
                    </div>
                   





                  <div class="form-group">
                      <label for="inputMarital" class="col-sm-3 control-label">Marital Status</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="inputMarital" name="inputMarital">
                          <?php 
                            if(!isset($marital) || $martial=="")
                            {
                                echo "<option value='0'>--Select Marital Status--</option>";
                                echo "<option value='1'>Married</option><option value='2'>Unmarried</option><option value='3'>Widow</option><option value='4'>Divorce</option><option value='5'>Widower</option>";
                            }
                            else
                            if($marital=="Married")
                            {
                                echo "<option value='0'>--Select Marital Status--</option>";
                                echo "<option value='1' selected>Married</option><option value='2'>Unmarried</option><option value='3'>Widow</option><option value='4'>Divorce</option><option value='5'>Widower</option>";  
                            }
                            else
                            if($marital=="Unmarried")
                            {
                                echo "<option value='0'>--Select Marital Status--</option>";
                                echo "<option value='1'>Married</option><option value='2' selected>Unmarried</option><option value='3'>Widow</option><option value='4'>Divorce</option><option value='5'>Widower</option>";

                            }
                            else
                            if($marital=="Widow")
                            {
                                echo "<option value='0'>--Select Marital Status--</option>";
                                echo "<option value='1'>Married</option><option value='2'>Unmarried</option><option value='3' selected>Widow</option><option value='4'>Divorce</option><option value='5'>Widower</option>";
                              
                            }
                            else
                            if($marital=="Divorce")
                            {
                                echo "<option value='0'>--Select Marital Status--</option>";
                                echo "<option value='1'>Married</option><option value='2'>Unmarried</option><option value='3'>Widow</option><option selected value='4'>Divorce</option><option value='5'>Widower</option>";
                              
                            }
                            else
                            if($marital=="Widower")
                            {
                                echo "<option value='0'>--Select Marital Status--</option>";
                                echo "<option value='1'>Married</option><option value='2'>Unmarried</option><option value='3'>Widow</option><option value='4'>Divorce</option><option value='5' selected>Widower</option>";
                              
                            }
                           ?>
                        </select>
                     </div>
                    </div>              
                  
                  <div class="form-group">
                      <label for="inputMobile" class="col-sm-3 control-label">Mobile No.</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="inputMobile" name="inputMobile" placeholder="9898989898" value="<?php echo ($mobile); ?>">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label for="inputLandline" class="col-sm-3 control-label">Landline No.</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="inputLandline" name="inputLandline" placeholder="9898989898" value="<?php echo ($landline); ?>">
                      </div>
                  </div>
                  

                  <div class="form-group">
                    <label for="inputProfileImage" class="col-sm-3 control-label">Profile Image</label>
                    <div class="col-sm-9">
                      <input type="file" id="inputProfileImage" name="inputProfileImage">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputWallImage" class="col-sm-3 control-label">Wall Image</label>
                    <div class="col-sm-9">
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
                <label for="inputOldPassword" class="col-sm-4 control-label">Old Password</label>
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