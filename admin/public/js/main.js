function login_user(){
  var email = document.getElementById('inputEmail').value;
  var password = document.getElementById('inputPassword').value;
  if(email=="" || password == "")
  {  
    document.getElementById('error_message').innerHTML="Incomplete Fields";
    return;
  }

  var xmlhttp=false;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(xmlhttp)
    {
      xmlhttp.open("GET",'public/php/login.php?email='+encodeURIComponent(email)+'&pass='+encodeURIComponent(password));
      xmlhttp.send();
      xmlhttp.onreadystatechange=function()
      {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
          if(xmlhttp.responseText=="0")
          {
            document.getElementById('error_message').innerHTML="Email or Password is Wrong";
          }
          else
          if(xmlhttp.responseText=="4")
          {
            document.getElementById('error_message').innerHTML="Account not verified by Admin";
          }
          else
          if(xmlhttp.responseText=="3")
          {
            document.getElementById('error_message').innerHTML="Check you account for activation Email";
          }
          else
          {
            document.getElementById('error_message').innerHTML=xmlhttp.responseText;
            window.location="public/php/profile.php";
          }
        }
      }
    }

}

function login_register_display(){
    document.getElementById('Login_header_text').innerHTML="Register";
    document.getElementById('register_group_button').style.display="block";
    document.getElementById('button_sigin_register').style.display="none";
    document.getElementById('button_back').style.display="inline-block";
    document.getElementById('button_register').style.display="inline-block";
    document.getElementById('button__register').style.display="none";
}

function login_back(){
    document.getElementById('Login_header_text').innerHTML="Login/Register";
    document.getElementById('register_group_button').style.display="none";
    document.getElementById('button_sigin_register').style.display="inline-block";
    document.getElementById('button_back').style.display="none";
    document.getElementById('button_register').style.display="none";
    document.getElementById('button__register').style.display="inline-block";
    document.getElementById('error_message').innerHTML="";
}

function login_register(){
  var email = document.getElementById('inputEmail').value;
  var password = document.getElementById('inputPassword').value;
  var cpassword = document.getElementById('inputConfirmPassword').value;
  var name = document.getElementById('inputFullName').value;
  var mobile = document.getElementById('inputMobile').value;

  if(password!=cpassword)
  {
    document.getElementById('error_message').innerHTML="Password Don't Match";
    return;
  }
  if(password.length<6)
  {
    document.getElementById('error_message').innerHTML="Password must be atleast 6 characters";
    return;
  }
  var xmlhttp=false;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(xmlhttp)
    {
      xmlhttp.open("GET",'public/php/reg.php?email='+encodeURIComponent(email)+'&pass='+encodeURIComponent(password)+'&name='+encodeURIComponent(name)+'&mobile='+encodeURIComponent(mobile));
      xmlhttp.send();
      xmlhttp.onreadystatechange=function()
      {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {
          if(xmlhttp.responseText=="1")
          {
            alert("Register Yourself");
          }
          else
          {
            document.getElementById('error_message').innerHTML=xmlhttp.responseText;
          }
        }
      }
    }
}

function Edit_profile(){
  display_profile_section();
  document.getElementById('display_profile_section').style.display="none";
  document.getElementById('edit_profile_section').style.display="inline-block";
  document.getElementById('change_password_section').style.display="none";

}
function back_button_profile(){
  display_profile_section();
  document.getElementById('display_profile_section').style.display="inline-block";
  document.getElementById('edit_profile_section').style.display="none";
  document.getElementById('change_password_section').style.display="none";
}
function back_button_profile1(){
   display_profile_section();
  document.getElementById('display_profile_section').style.display="inline-block";
  document.getElementById('edit_profile_section').style.display="none";
  document.getElementById('change_password_section').style.display="none";
}

function Change_password(){
  display_profile_section();
  document.getElementById('display_profile_section').style.display="none";
  document.getElementById('edit_profile_section').style.display="none";
  document.getElementById('change_password_section').style.display="inline-block";
}

function change_password_up(){
  opass=document.getElementById("inputOldPassword").value;
  npass=document.getElementById("inputNewPassword").value;
  ncpass=document.getElementById("inputCNewPassword").value;
  if(npass!=ncpass)
  {
    document.getElementById("error_message_p").innerHTML="Password Don't Match";  
    return;
  }
  if(npass.length<6)
  {
    document.getElementById('error_message_p').innerHTML="Password must be atleast 6 characters";
    return;
  }

  var xmlhttp=false;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(xmlhttp)
    {
      xmlhttp.open("GET",'Change_password.php?oldPass='+encodeURIComponent(opass)+'&newPass='+encodeURIComponent(npass));
      xmlhttp.send();
      xmlhttp.onreadystatechange=function()
      {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
            document.getElementById('error_message_p').innerHTML=xmlhttp.responseText;
            if(xmlhttp.responseText=="Updated Successfully")
              window.location="profile.php";
          }
      }
    }

}

function profile_search()
{
  search_keyword=document.getElementById("inputSearchKey").value;
    
    var xmlhttp=false;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(xmlhttp)
    {
      xmlhttp.open("GET",'searchProfile.php?search_val='+encodeURIComponent(search_keyword));
      xmlhttp.send();
      xmlhttp.onreadystatechange=function()
      {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
             //var xmlDoc=xmlhttp.responseText;
             var xmlDoc = jQuery.parseXML(xmlhttp.responseText);
             //xd=xmlDoc.getElementsByTagName("search_result");
             x=xmlDoc.getElementsByTagName("profile");
            var mk="";
            for (i=0;i<x.length;i++)
            {
              mk+='<div class="media" >\
  <a class="pull-left" onclick="view_other_profile(\''+x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+'\')" href="#">\
    <img class="media-object" height="50px;" src="../img/profile/'+x[i].getElementsByTagName("image")[0].childNodes[0].nodeValue+'" alt="profile">\
  </a>\
  <div class="media-body">\
    <h4 class="media-heading" style="cursor:pointer;" onclick="view_other_profile(\''+x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+'\')">'+x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue+'</h4>\
    '+x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+'<br/>'+x[i].getElementsByTagName("address")[0].childNodes[0].nodeValue+'\
  </div>\
</div>';
    }
            document.getElementById('display_search_result').innerHTML=mk;
          }
      }
    }
}


function display_profile_section(){
  document.getElementById('view_display').innerHTML="";
  document.getElementById('display_profile_section').style.display="inline-block";
  document.getElementById('edit_profile_section').style.display="none";
  document.getElementById('change_password_section').style.display="none"; 
  document.getElementById('wall_display_section').style.display="block";  
  document.getElementById('view_display').style.display="none";
}

function content_change(page,extension){
  window.location.hash=page
  var xmlhttp=false;
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  if(xmlhttp)
  {   
    xmlhttp.open("GET",'../views/'+page+'.'+extension);
    xmlhttp.send();
    xmlhttp.onreadystatechange=function()
    {
      if(xmlhttp.readyState==4 && xmlhttp.status==200)
      {
        document.getElementById('view_display').innerHTML=xmlhttp.responseText;
        document.getElementById('view_display').style.display="inline-block";
      }
    }         
  }
}

function display_allow_user_section(){
  document.getElementById('display_profile_section').style.display="none";
  document.getElementById('edit_profile_section').style.display="none";
  document.getElementById('change_password_section').style.display="none"; 
  document.getElementById('wall_display_section').style.display="none";
  content_change('users',"php");
}

function display_search_section(){
    document.getElementById('display_profile_section').style.display="none";
  document.getElementById('edit_profile_section').style.display="none";
  document.getElementById('change_password_section').style.display="none"; 
  document.getElementById('wall_display_section').style.display="none";
  content_change('search_section',"html");
}
function view_other_profile(email){
  document.getElementById('display_profile_section').style.display="none";
  document.getElementById('edit_profile_section').style.display="none";
  document.getElementById('change_password_section').style.display="none"; 
  document.getElementById('wall_display_section').style.display="none";
  content_change('otherProfile',"php?email="+email);
}

function friend_search()
{
  document.getElementById('display_profile_section').style.display="none";
  document.getElementById('edit_profile_section').style.display="none";
  document.getElementById('change_password_section').style.display="none"; 
  document.getElementById('wall_display_section').style.display="none";
  document.getElementById('view_display').style.display="inline-block";
  friend_search_get();
}

function friend_search_get()
{ 
    var xmlhttp=false;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(xmlhttp)
    {
      xmlhttp.open("GET",'friendList.php');
      xmlhttp.send();
      xmlhttp.onreadystatechange=function()
      {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
             //var xmlDoc=xmlhttp.responseText;
             var xmlDoc = jQuery.parseXML(xmlhttp.responseText);
             //xd=xmlDoc.getElementsByTagName("search_result");
             x=xmlDoc.getElementsByTagName("profile");
            var mk="";
            for (i=0;i<x.length;i++)
            {
              mk+='<div class="media" >\
  <a class="pull-left" onclick="view_other_profile(\''+x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+'\')" href="#">\
    <img class="media-object" height="50px;" src="../img/profile/'+x[i].getElementsByTagName("image")[0].childNodes[0].nodeValue+'" alt="profile">\
  </a>\
  <div class="media-body">\
    <h4 class="media-heading" style="cursor:pointer;" onclick="view_other_profile(\''+x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+'\')">'+x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue+'</h4>\
    '+x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+'<br/>'+x[i].getElementsByTagName("address")[0].childNodes[0].nodeValue+'\
  </div>\
</div>';
    }
            document.getElementById('view_display').innerHTML=mk;
          }
      }
    }
}

function FriendRequest_type_get(id,page){
  var xmlhttp=false;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(xmlhttp)
    {
      xmlhttp.open("GET",page+'.php?id='+id);
      xmlhttp.send();
      xmlhttp.onreadystatechange=function()
      {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {

          }
      }
    }
}


function sendFriendRequest(id,email){
  FriendRequest_type_get(id,'sendFriendRequest');
  view_other_profile(email);
}

function AcceptRequest(id,email){
  FriendRequest_type_get(id,'AcceptRequest');
  view_other_profile(email);
}

function deleteFriendRequest(id,email){
  FriendRequest_type_get(id,'deleteFriendRequest');
  view_other_profile(email);
}


function UnfriendRequest(id,email){
  FriendRequest_type_get(id,'Unfriend');
  view_other_profile(email);
}


function friend_request()
{
  document.getElementById('display_profile_section').style.display="none";
  document.getElementById('edit_profile_section').style.display="none";
  document.getElementById('change_password_section').style.display="none"; 
  document.getElementById('wall_display_section').style.display="none";
  document.getElementById('view_display').style.display="inline-block";
  friend_request_get();
}

function friend_request_get()
{ 
    var xmlhttp=false;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(xmlhttp)
    {
      xmlhttp.open("GET",'friendRequest.php');
      xmlhttp.send();
      xmlhttp.onreadystatechange=function()
      {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
             //var xmlDoc=xmlhttp.responseText;
             var xmlDoc = jQuery.parseXML(xmlhttp.responseText);
             //xd=xmlDoc.getElementsByTagName("search_result");
             x=xmlDoc.getElementsByTagName("profile");
            var mk="";
            for (i=0;i<x.length;i++)
            {
              mk+='<div class="media" >\
  <a class="pull-left" onclick="view_other_profile(\''+x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+'\')" href="#">\
    <img class="media-object" height="50px;" src="../img/profile/'+x[i].getElementsByTagName("image")[0].childNodes[0].nodeValue+'" alt="profile">\
  </a>\
  <div class="media-body">\
    <h4 class="media-heading" style="cursor:pointer;" onclick="view_other_profile(\''+x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+'\')">'+x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue+'</h4>\
    '+x[i].getElementsByTagName("email")[0].childNodes[0].nodeValue+'<br/>'+x[i].getElementsByTagName("address")[0].childNodes[0].nodeValue+'\
  </div>\
</div>';
    }
            document.getElementById('view_display').innerHTML=mk;
          }
      }
    }
}
