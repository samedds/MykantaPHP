$(document).ready( function(){
  //this will fire once the page has been fully loaded
  
}); 
function change_password(user_id)
{
	if(user_id == "")
	{
		alert("The programming language function field in the clicked button must not be empty please.");
	}
	else
	{
		 var old_pass = $( '#old_pass' ).val();
		 //var new_pass = $( '#new_pass' ).val();
		 var new_pass = $( '#rep_new_pass' ).val();
		 console.log(old_pass + new_pass );

		if( old_pass.length > 0 && new_pass.length > 0 )
	   	{
			 if( new_pass > 5)
			 { 	
				
			
				$.post("/ajax/change_pass.php",  
				{
					task : "task",
				  	old_pass : old_pass,
				   	new_pass : new_pass,
				   	//console.log( old_pass + new_pass );
					cache: false,
				})
					.error(
				  
					   function( )
					   {
						  $('#old_pass, #new_pass, #rep_new_pass').css('border' , '1px solid #e1e1e1');
					   })
					.success(function(response)
					{
					     $("#set2").removeClass('loader');
					     $("#set2").html(response);
						 $( '#old_pass' ).val("");
						 $( '#new_pass' ).val("");
						 $( '#rep_new_pass' ).val("");
					});
			}
			else
			{
				alert("New Passwords should not be less than 6 characters");
				$('#new_pass, #rep_new_pass').css('border' , '1px solid #ff0000');
				$('#old_pass').css('border' , '1px solid #e1e1e1');
			}
		}
		else
	  	{
	  		//textarea is empty
	  		$('#old_pass, #new_pass, #rep_new_pass').css('border' , '1px solid #ff0000');
		}
	}
}