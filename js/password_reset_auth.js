
function password_reset_auth()
{
		 var ref_code = $( '#ref_code' ).val();
		 var pass = $( '#pass' ).val();
		 var re_pass = $( '#re_pass' ).val();
		 
		 document.getElementById("reset_msg").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;">Loading...</strong>';
		 
		if(re_pass.length > 0 && pass.length > 0 && ref_code.length > 0 )
		{
		 	 $.post("/ajax/password_reset_auth.php",  
				{
					task : "task",
				  	ref_code : ref_code,
				  	pass : pass,
				  	re_pass : re_pass,
				  	
					cache: false,
				})
				
					.error(
				  
					   function( )
					   {
						  console.log( "Error: " );
					   })
					.success(function(response)
					{
					     $("#reset_msg").html(response);
						 $( '#email' ).val("");
					});
	    }
	else
	{
	document.getElementById("reset_msg").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">You made an Error! </strong>';
	}
}
