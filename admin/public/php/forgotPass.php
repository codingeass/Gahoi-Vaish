<html>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" href="../css/style.css"/>
<link rel="stylesheet" href="../css/bootstrap-social.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<link rel="icon" type="/image/ico" href="../img/favicon.ico" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Gahoi Vaish Samaj</title>
</head>
<body>
  
  <div class="jumbotron" id="small_jumbotron">
    
  <div class="container row">
  <div class="media col-md-10">
    <div class="media-left">
      <a href="../../../">
        <img class="media-object" src="../img/custom-logo.png" style="max-height:70px;" alt="Gahoi Vaish Samaj">
      </a>
    </div>
    <div class="media-body">
      <h2 class="media-heading">Gahoi Vaish Samaj</h2>
    </div>
  </div>
  </div>
  </div>

  <div class="container">
    <div class="col-md-3">
    </div>
      <div class="col-md-6" id="form_login">
          <form class="form-horizontal" onsubmit="return false">
          <div class="form-group">
            <h3><div class="text-center" id="Login_header_text">Change Password</div></h3>
          </div>
          <hr/>
          <?php
  try {
    require_once("connect.php");
    if(isset($_REQUEST["code"])&&isset($_REQUEST["email"])){

    $result=mysqli_query($mysql,"SELECT * FROM password_recovery WHERE `email`='".mysqli_real_escape_string($mysql,urldecode(strip_tags($_REQUEST["email"])))."' and code='".mysqli_real_escape_string($mysql,strip_tags(urldecode($_REQUEST["code"])))."'");
    if(mysqli_num_rows($result) > 0){
      ?>

      <input type="hidden" id="inputEmail" value="<?php echo strip_tags(urldecode($_REQUEST['email']));?>">
      <input type="hidden" id="inputCode" value="<?php echo strip_tags(urldecode($_REQUEST['code']));?>">

      <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
              </div>
            </div>
           
           <div class="form-group">
                <label for="inputConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputConfirmPassword" placeholder="confirmPassword" required>
                </div>
            </div>

            <div class="form-group text-center">
              <div class="">
                <a  class="btn btn-primary btn-lg" href="../../index.html" id="cancel_passchange">Cancel</a>
                <button  class="btn btn-primary btn-lg" onclick="rec_passchange()" id="confirm_passchange" style="display:inline-block;">Confirm</button>
              </div>
            </div>
            <div class="form-group text-center" id="error_message_p" style="font-size:18px;color:red;">
            <?php
    }
      else{
        ?>
        <div class="form-group text-center" id="error_message_p" style="font-size:18px;color:red;">
        <?php
     echo "Invalid Code";
      }  
  }else{
    ?>
        <div class="form-group text-center" id="error_message_p" style="font-size:18px;color:red;">
        <?php
     echo "Try Again Later"; 
 }
  } catch (Exception $e) {
    ?>
        <div class="form-group text-center" id="error_message_p" style="font-size:18px;color:red;">
        <?php
    echo $e->message;
  }
?>
         </div>
        </form>
        <hr/>

        </div>
  </div>
<br/>
<br/>
<br/>
<div class="container-fluid" style="position:absolute;padding-bottom:0px;bottom:0px;width:100%;">
    <div class="panel panel-footer" style="margin-top:50px;margin-bottom:0px;padding-bottom:3px;bottom:0px;">
      Copyright © 2015 Gahoi Vaish Samaj Lucknow. <span class="glyphicon glyphicon-heart"></span> Designed By : <a href="http://amandeepgupta.com" target="_blank">Amandeep Gupta</a>.&nbsp;&nbsp;<a href="mailto:amandeepgupta@rocketmail.com" target="_blank"><span class="glyphicon glyphicon-envelope"></span></a>
    </div>
  </div>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/main.js"></script>
</body>


</html>

