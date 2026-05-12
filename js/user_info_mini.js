function user_info_mini(user_id)
{
	if(user_id == "")
	{
		alert("Please report this to support@mykanta.com");
	}
	else
	{
		$(".modal-body-user").html('');
		$(".modal-body-user").addClass('loading_gif');
		$("#user_info_mini").modal('show');
		
		$.post("/ajax/load_user_modal.php",  
		{
		 task_load_user : "load_user",
		user_id: user_id,
			cache: false,
			})
			.error(
			   function( )
			   {
			   $(".modal-body-user").html("Failed, reload page and try again");
			   })
			.success(function(response)
			{
			     $(".modal-body-user").removeClass('loading_gif');
			     $(".modal-body-user").html(response);
			});
		
	}
}
function chat_launch(user_id)
{
	if(user_id == "")
	{
		alert("Please report this to support@mykanta.com");
	}
	else
	{
		$.post("/ajax/load_user_modal.php",  
		{
		 task_chat_launch : "chat_launch",
		user_id: user_id,
			cache: false,
			})
			.error(
			   function( )
			   {
			   $(".modal-body-user").html("Failed, reload page and try again");
			   })
			.success(function(response)
			{
			
			$( '#title_user1'+user_id+'' ).fadeOut('slow');
			$( '#chat_body'+user_id+'' ).fadeOut('slow');
            $( '#chat_body_input'+user_id+'' ).fadeOut('slow');
			
			     $(".modal-body-user").removeClass('loading_gif');
			     $("#chat_user1").prepend(response).fadeIn('slow');
			});
		
	}
}

function chat_open(friend_id)
{//alert('works');
	
$( '#chat_body'+friend_id+'' ).fadeIn('slow');
$( '#chat_body_input'+friend_id+'' ).fadeIn('slow');

}
function chat_minus(friend_id)
{//alert('works');
$( '#chat_body'+friend_id+'' ).hide();
$( '#chat_body_input'+friend_id+'' ).hide();

}
function chat_times(friend_id)
{//alert('works');
$( '#title_user1'+friend_id+'' ).fadeOut('slow');
$( '#chat_body'+friend_id+'' ).fadeOut('slow');
$( '#chat_body_input'+friend_id+'' ).fadeOut('slow');
//$( '#chat_body_input' ).hide();
//document.getElementById('chat_body').hide();
}
