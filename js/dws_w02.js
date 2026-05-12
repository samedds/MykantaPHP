
function password_reset()
{document.getElementById("fgt_btn").innerHTML = ' <div class="btn btn-success"><img src="img/loading.gif"/></div>';  

		 var email = $( '#reset_password' ).val();
		 
		 document.getElementById("reset_error").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;">Checking '+email+'</strong>';
		 
		if(email.length > 0 )
		{
		 	 $.post("/ajax/password_reset.php",  
				{
					task : "task",
				  	email : email,
				  	
					cache: false,
				})
				
					.error(
				  
					   function( )
					   {
						document.getElementById("fgt_btn").innerHTML = '<input type="submit" class="btn btn-warning" onClick="account_create()" value="Reload page"></input>'; 
					   })
					.success(function(response)
					{
					     document.getElementById("fgt_btn").innerHTML = '<input type="submit" class="btn btn-success" value="Success"></input>'; $("#reset_error").html(response);
						 $( '#email' ).val("");
					});
	    }
	else
	{
	document.getElementById("reset_error").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Type your Email</strong>';
	}
}
