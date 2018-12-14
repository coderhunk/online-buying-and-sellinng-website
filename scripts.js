//sliders
$(window).load(function() {
				$("#flexiselDemo").flexisel({
					visibleItems: 5,
					animationSpeed: 1000,
					autoPlay: false,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
			    	responsiveBreakpoints: { 
			    		portrait: { 
			    			changePoint:480,
			    			visibleItems: 1
			    		}, 
			    		landscape: { 
			    			changePoint:640,
			    			visibleItems: 2
			    		},
			    		tablet: { 
			    			changePoint:768,
			    			visibleItems: 3
			    		}
			    	}
			    });
			    
			});
			
			 $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
    
    
    //menu
    $(document).ready(function(){
		
	 $(".color1").css("display","block");
	 $(".color1").css("background","orange");
	 $(".megamenu").megamenu();});
//pageload

function load_page(pageloc,pageid){	
    $("html, body").animate({ scrollTop: 0 }, 1000); 
   	
    
     
     for (var i=1;i<=20;i++)
     {	 
	
	 $(".color"+i).css("display","block");
	 $(".color"+i).css("background","");
	 $(".color"+i).css("color","");
      }
       
	 $("#"+pageid).css("display","block");
	 $("#"+pageid).css("background","orange");
	  $("#"+pageid).css("color","black");
       $('#loadcont').html("<div style='position:absolute;top:38%;margin-bottom:20%;left:44%;'><img src='img/loader.gif' ><br><b></b></div>").load(pageloc);
          
	}

$(document).ready(function() 
{	
	$("#vpb_pop_up_background").click(function()
	{
		$("#vpb_login_pop_up_box").hide(); //Hides the login box when clicked outside the form
		$("#userpro").hide(); //Hides the login box when clicked outside the form
		$("#vpb_pop_up_background").fadeOut("slow");
	});
});

function vpb_show_login_box()
{
	$("#vpb_pop_up_background").css({
		"opacity": "0.4"
	});
	$("#vpb_pop_up_background").fadeIn("slow");
	$("#vpb_login_pop_up_box").fadeIn('fast');
	window.scroll(0,0);
}

function vpb_hide_popup_boxes()
{
	$("#vpb_login_pop_up_box").hide(); //Hides the login box when clicked outside the form
	$("#userpro").hide(); //Hides the login box when clicked outside the form
	$("#vpb_pop_up_background").fadeOut("slow");
}
function pick(data){
return document.getElementById(data).value.replace(RegExp(" ",'g'),"\+");
}

function missing(field)
{
if(pick(field)=="" || pick(field)==" " || pick(field).length<1)
{
$("#"+field).css("border","1px solid red");
$("#"+field).focus();
}
else
{
$("#"+field).css("border","1px solid green");
}
}


function notify(loc,msg,cat)
{
if(cat=="error")
{
$("#"+loc).slideDown(2000).html("<div class='info' style='width:80%;'><font style='color:red;'>"+msg+"</font></div>");
}
if(cat=="success")
{
$("#"+loc).html("<div class='info'><font style='color:green;'>"+msg+"</font></div>");
}
if(cat=="loading")
{
$("#"+loc).html("<font style='color:blue;'>"+msg+"</font>");
}
}

function login()
{

	stuid=pick("stuid").toUpperCase();
	stupasswd=pick("stupasswd");	
	if (stuid!=undefined && stupasswd!=undefined && stuid!="" && stupasswd!="" && stuid!=NaN && stupasswd!=NaN)
	{
	notify("login_status","Authenticating.....","loading");
	$.post("check_login.php",{stuid:stuid,stupasswd:stupasswd},function(data){if(data.indexOf("success")!=-1){location.reload();} else if(data.indexOf("invalid")!=-1){notify("login_status","Invalid Credentials","error");}});
	}
	else
	{
		
		missing("stupasswd");
		missing("stuid");
	}
	return false;

}

function addproduct()
{
ptitle=pick("ptitle");
pdesc=pick("pdesc");
pbran=pick("pbran");
pproc=pick("pproc");
File=pick("File");
pcost=pick("pcost");

if(ptitle=="")
{
notify("status","Please Enter Product Title","error");
missing("ptitle");
return false;
} 
else if(pdesc=="")
{
notify("status","Please Enter Product Description","error");
missing("pdesc");
return false;
}
 
else if(File=="")
{
notify("status","Please Select Image","error");
missing("File");
return false;
} 
else if(pbran=="")
{
notify("status","Please Select Branch where you want to post","error");
missing("pbran");
return false;
} 
else if(pproc=="")
{
notify("status","Please Select Product Category","error");
missing("pproc");
return false;
} 
else if(pcost=="")
{
notify("status","Please Select Product Category","error");
missing("pcost");
return false;
} 
else
{
return true;
}
}

function clickable(search_term)
{
	$("#suggested_names").val('');
	$("#hide_or_show_search_results_box").hide();
	alert('You clicked -- '+search_term);
}

$(document).ready(function()
{
	$("#suggested_names").live("keyup",function() 
	{
		var suggested_names = $("#suggested_names").val();
		var response_brought = $("#response_brought");
		var dataString = "suggested_names=" + suggested_names;
		
		if(suggested_names.length > 30)
		{
			$("#hide_or_show_search_results_box").show();
			$("#suggested_names").val('');
			$("#loadcont").html('<font color="red">Search term must not be greater than 30 characters.</font>');
		}
		else if(suggested_names.length < 1)
		{
			$("#loadcont").hide();
		}
		else if(suggested_names.length > 0 && suggested_names.length <= 30)
		{	
			$.ajax({  
				type: "POST",  
				url: "search.php",  
				data: dataString,
				beforeSend: function() 
				{
					$("#loadcont").show();
					$("#loadcont").html('<center><br><br><br><br><br><br><br><img src="img/loading.gif" align="absmiddle" alt="Searching '+suggested_names+'..."> <br>Searching...</center>');
				},  
				success: function(response)
				{
					$("#loadcont").show();
					$("#loadcont").html(response);
				}
			   
			}); 
		}
		else
		{
			$("#loadcont").html('<font color="red">Search term must not be less than 3 or greater than 30 characters.</font>');
		}
		return false;
	});
});


function showproduct(pid)
{
$('#loadcont').html("<div style='position:absolute;top:38%;margin-bottom:20%;left:44%;'><img src='img/loader.gif' ><br><b></b></div>");
$.post("view_product.php",{pid:pid},function(data){$("#loadcont").html(data);});
}


function updateprofile()
{
stuname=pick("stuname");
gender=pick("gender");
branch=pick("branch");
block=pick("block");
room=pick("room");
year=pick("year");
dorm=pick("dorm");
mobile=pick("mobile");
cls=block+"-"+room;

if(stuname!="" || gender!="" || branch !="" || block!="" || room!="" || year!="" || dorm!="")
{
	$.post("dbactions/editprofile-db.php",{stuname:stuname,gender:gender,branch:branch,cls:cls,year:year,dorm:dorm,mobile:mobile},function(data){$("#editpro").html("<img src='img/like.png'><br><br><br><h4><font color='green'>Your Profile has been Updated Successfully</font></h4><br><br><h5>For any Queries please Contact us through Contact Us option</h5>");$("#editpro").css("height","60px");});

}
else
{
		notify("status","All fields are Required","error");
		window.alert("error");

}
}

$(document).ready(function()
{
$("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
var i='prathap';
$.post("dbactions/setnoteview.php",{i:i},function(data){$("#notification_count").fadeOut("slow");});
return false;
});

//Document Click
$(document).click(function()
{
$("#notificationContainer").hide();
});
//Popup Click
$("#notificationContainer").click(function()
{
return false
});

});

function shwprofile(stu)
{
	$("#userpro").html("<center><img src='img/loading.gif'><br><b>Retriving "+stu+" Details</b></center>");
$.post("dbactions/userpro.php",{stu:stu},function(data){$("#userpro").html(data);});
$("#vpb_pop_up_background").css({
		"opacity": "0.4"
	});
	$("#vpb_pop_up_background").fadeIn("slow");
	$("#userpro").fadeIn('fast');
	window.scroll(0,0);
}


function shwbuyerprofile(stu)
{
	$("#userpro").html("<center><img src='img/loading.gif'><br><b>Retriving "+stu+" Details</b></center>");
$.post("dbactions/buyerpro.php",{stu:stu},function(data){$("#userpro").html(data);});
$("#vpb_pop_up_background").css({
		"opacity": "0.4"
	});
	$("#vpb_pop_up_background").fadeIn("slow");
	$("#userpro").fadeIn('fast');
	window.scroll(0,0);
}
