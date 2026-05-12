
function password_reset()
{
	
		 var email = $( '#reset_password' ).val();
		 
		
		 
		if(email.length > 10 )
		{ 
	document.getElementById("reset_error").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;">Checking '+email+'</strong>';
	
			document.getElementById("fgt_btn").innerHTML = ' <div class="btn btn-success"><img src="img/loading.gif"/></div>';  

			
		 	 $.post("/ajax/password_reset.php",  
				{
					task : "task",
				  	email : email,
					cache: false,
				})
					.error(
					   function( )
					   {
						document.getElementById("fgt_btn").innerHTML = ' <input type="submit" class="btn btn-primary" value="Try again" onclick="password_reset()"></input>'; 
					   })
					.success(function(response)
					{
					     document.getElementById("fgt_btn").innerHTML = '<br><input type="submit" class="btn btn-primary" value="Try again" onclick="password_reset()"></input>';
						if(response == "emailsent")
						{
							$("#reset_error").html('<em class=" text-success" > Successfully sent '+email+' a password recovery mail</em>');
						}
						if(response == "notused")
						{
							$("#reset_error").html('<em class=" text-danger" > Email has not used, you can use this email to create an account</em>');
						}
						else{
							
							
						}						
						 $( '#email' ).val("");
					});
	    }
	else
	{
	document.getElementById("reset_error").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Type your Email</strong>';
	}
}
