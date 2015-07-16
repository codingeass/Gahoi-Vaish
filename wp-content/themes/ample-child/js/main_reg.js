var pages=['login','executives','interaction','titiksha','about'];
function content_change(page){
	window.location.hash=page;
	var xmlhttp=false;
	document.getElementById('html_views').style.display="block";
	document.getElementById('iframe_display').style.display="none";
	document.getElementById('iframe_display').innerHTML="";
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
		xmlhttp.open("GET",'public/views/'+page+'.html?'+Math.random());
		xmlhttp.send();
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById('html_views').innerHTML=xmlhttp.responseText;
				window.setInterval(removeCarousel(),2000);
			}
		}					
	}
}

window.onload =function(){
	var hash = window.location.hash;
	if(hash=="")
	content_change('login');
	else
	{
		if(pages.indexOf(hash.slice(1))>-1)
		content_change(hash.slice(1));
		else
		{
			content_change('login');
		}
	}	

}

function active_css(obj)
{
	var allLi=document.getElementById("navbar").getElementsByTagName("li");
	for(var i=0;i<allLi.length;i++)
	{
		allLi[i].className="";	
	}
	obj.className="active";
}

function removeCarousel()
{
	
	if(screen.availWidth<996)
	{
		//alert(document.getElementById('projects').innerHTML);
		//var proj=document.getElementById('content_dir').getElementById('projects');
		document.getElementById('slider_remove_id').className="";	
		document.getElementById('arrow').innerHTML="";
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
}

function login_register(){
  var email = document.getElementById('inputEmail').value;
  var password = document.getElementById('inputPassword').value;
  var cpassword = document.getElementById('inputConfirmPassword').value;
  var name = document.getElementById('inputFullName').value;
  var mobile = document.getElementById('inputMobile').value;
  var marital= document.getElementById('inputMarital').value;

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
      xmlhttp.open("GET",'public/php/reg.php?email='+encodeURIComponent(email)+'&pass='+encodeURIComponent(password)+'&name='+encodeURIComponent(name)+'&mobile='+encodeURIComponent(mobile)+'&marital='+encodeURIComponent(marital));
      xmlhttp.send();
      xmlhttp.onreadystatechange=function()
      {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
          if(xmlhttp.responseText=="1")
          {
            check_user=1;
            alert("Register Yourself");
          }
          else
          {
            document.getElementById('error_message').innerHTML=xmlhttp.responseText;
             window.location="../php/profile.php"; 
          }
      }
    }
}

function iframe_display(){
	document.getElementById("iframe_display").innerHTML='<iframe src="public/views/GridGallery/index.html" style="height:100%;width:100%;"></iframe>';
	document.getElementById('html_views').style.display="none";
	document.getElementById('iframe_display').style.display="block";
}