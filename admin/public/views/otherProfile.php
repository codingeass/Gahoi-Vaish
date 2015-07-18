<?php
	try {
    require_once("../php/connect.php");///? check for this
    session_start();
    if(isset($_REQUEST["email"])){
    $result=mysqli_query($mysql,"SELECT * FROM user WHERE `email`='".strip_tags($_REQUEST["email"])."'");
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

  <?php
  } catch (Exception $e) {
    
  }
  ?>