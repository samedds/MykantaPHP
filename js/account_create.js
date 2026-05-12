
function account_create()
{
document.getElementById('acc_btn').innerHTML  = '<div class=""><img src="/img/loading.gif"/></div>';  

		 var captcha = $( '#captcha' ).val();
		 var captcha_img = $( '#captcha_img' ).val();
		 var username = $( '#username' ).val();
		 var email = $( '#email' ).val();
		
		 var year = $( '#year' ).val();
		 var month = $( '#month' ).val();
		 var day = $( '#day' ).val(); 
		 var dob = day+'-'+month+'-'+year;
		 var password = $( '#password' ).val();
		 var passwordConfirm = $( '#passwordConfirm' ).val();
		 var firstname = $( '#firstname' ).val();
		 var datetime = $( '#datetime' ).val();
		// var country = $( '#country' ).val();
		// var city = $( '#city' ).val();
		// var code = $( '#code' ).val();
		//var telephone = $( '#telephone' ).val();
		
		if(username.length < 1 )
	   	{
		   $( '#username' ).val("");
		}
		if(captcha.length < 1 )
	   	{
		   $( '#captcha' ).val("");
		}
		
		if(email.length < 1 )
	   	{
		   $( '#email' ).val("");
		}
		
		if(firstname.length < 1 )
	   	{
		   $( '#firstname' ).val("");
		}
		
		if(password.length < 1 )
	   	{
		   $( '#password' ).val("");
		}
		
		if(passwordConfirm.length < 1 )
	   	{
		   $( '#passwordConfirm' ).val("");
		}
		

		if(captcha == captcha_img)
		{
		
		if( password.length > 0 && passwordConfirm.length > 0 && username.length > 0 && email.length > 0 && firstname.length > 0  )
	   	{
			 if( password == passwordConfirm)
			 { 
			 /*  if(document.getElementById("acc_btn").checked)
			   { */
				   $.post("/ajax/account_create.php",  
					{
						task : "task",
					  	username : username,
					  	email : email,
						dob : 1,
					  	password : password,
					  	firstname : firstname,
					  	datetime : datetime,
					  	//country : country,
					   	//city : city,
					   //	code : code,
					   //	telephone : telephone,
					 	cache: false,
					})
					
						.error(
					  
						   function( )
						   {console.log(response);
							  $("#reg").html(response);
document.getElementById("acc_btn").innerHTML = '<input type="submit" class="btn btn-warning" onClick="account_create()" value="Reload page"></input>'; 
 })
.success(function(response)
{
	if(response == "created")
		{
			document.getElementById("form_holder").innerHTML = '<div class=" padding-10  " style="background-color:#fff; border-radius:55px; border: 1px solid black;"><div class="" ><h4 style="color:#000;"><img  src="/img/site_img/reg_succes.png" class="img " style="height:100px;"/><span class=""style="color:#000; margin-bottom:150px;"> Congratulations!</span></h4></div><div class="row padding-10"><div class="col-xs-12 padding-10"> <p  style="color:#000;" >You have succesfully signed up...</p> <br><p  style="color:#000;"> Click  <strong><a href="/create_business" > Create Business Page </a></strong>to complete your business registration</p><br><p  style="color:#000;"> Click  <strong><a href="/User" > Login </a></strong>to view your profile</p><p  style="color:#000;">Kindly verify your account in the mail sent to you to complete the registration.</p><br><p  style="color:#000;">Thank you.</p><br><br><p  class="text-muted font-sm" >Need Help?</p><br><p  class="text-muted font-xs">Did not receive an Email?</p><em  s class="text-muted font-xs">Check your mail spam or search for "mykanta" in your mail.</em></div></div></div>'; 
		     $( '#username' ).val("");
				 $( '#email' ).val("");
				 $( '#password' ).val("");
				 $( '#passwordConfirm' ).val("");
				 $( '#firstname' ).val("");
				 $( '#shopName' ).val("");
				 $( '#telephone' ).val("");
		}
			else
			{
			 $("#reg").html(response);
				
				 $( '#password' ).val("");
				 $( '#passwordConfirm' ).val("");
				
				 $( '#shopName' ).val("");
			console.log(response);
		    document.getElementById("acc_btn").innerHTML = '<input type="submit" class="btn btn-primary-lg-o btn-block"  style="width:300px;" onClick="account_create()" value="Create Account"></input>'; }
		});
	/*
}
else
{
			document.getElementById("reg").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please Accept Terms and Conditions.</small>';
			document.getElementById("acc_btn").innerHTML = '<input type="submit" class="btn btn-primary" onClick="account_create()" value="Register"></input>'; 	
}  */
}
else
	{
			document.getElementById("reg").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Passwords do not match.</small>';
		    document.getElementById("acc_btn").innerHTML = '<input type="submit" class="btn btn-primary-lg-o btn-block"  style="width:300px;" onClick="account_create()" value="Create Account"></input>'; 
	}
		}
		else
	  	{
	  		//textarea is empty
	  		document.getElementById("reg").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Fill all fields.</small>';
		    document.getElementById("acc_btn").innerHTML = '<input type="submit" class="btn btn-primary-lg-o btn-block"  style="width:300px;" onClick="account_create()" value="Create Account"></input>'; 
		}
	}
	else
	{
	document.getElementById("reg").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Captcha wrong</small>';
    document.getElementById("acc_btn").innerHTML = '<input type="submit" class="btn btn-primary-lg-o btn-block"  style="width:300px;" onClick="account_create()" value="Create Account"></input>'; 
	}
}

