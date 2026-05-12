$(document).ready( function(){
  //this will fire once the page has been fully loaded
  
});
function settings_user_id(user_id)
{
//$("#set1").addClass('loading_gif');

	if(user_id == "")
	{
		alert("The programming language function field in the clicked button must not be empty please.");
	}
	else
	{	
		var firstName_setings = $('#firstName_setings_edt').val();
		var username_setings = $('#username_setings_edt').val();
		var telephone_user = $('#edt_telephone').val();
		
		$.post("/ajax/settings_user.php",  
		{
		 task_set : "task",
		firstName_setings: firstName_setings,
	    username_setings: username_setings,
		telephone_user: telephone_user,
			cache: false,
			})
			.error(function( response )
			   {
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
			    // $("#set1").removeClass('loading_gif');
			   	 //document.getElementById('set1').innerHTML = '<p class="text-success"> Changed </p>'; 
			   	 document.getElementById('set1').innerHTML = response; 
				
			});
		
	}
}
function pub_vis()
{

	$.post("/ajax/settings_user.php",  
		{
		 task_pub_vis : "task",
			cache: false,
			})
			.error(function( response )
			   {
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
			 console.log( "Success: "+response ); 
				
			});

}
function con_req()
{

	$.post("/ajax/settings_user.php",  
		{
		 task_con_req : "task",
			cache: false,
			})
			.error(function( response )
			   {
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
			 console.log( "Success: "+response ); 
				
			});

}
function sn_mails()
{

	$.post("/ajax/settings_user.php",  
		{
		 task_sn_mails : "task",
			cache: false,
			})
			.error(function( response )
			   {
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
			 console.log( "Success: "+response ); 
				
			});

}
