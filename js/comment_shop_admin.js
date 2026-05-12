function comment_shop_admin(post_id)
{


var shop_comment_text = $( '#shop_comment_text'+post_id+'' ).val();
	if(shop_comment_text == "")
	{
		alert("Report this to your Admin.");
	}
	else if(shop_comment_text.legnth < 1  )
	{
	     $( '#shop_comment_text' ).val("");
	}
	else
	{
	$("#reply-holder-ul").addClass('loader');

var shop_comment_text = $( '#shop_comment_text'+post_id+'' ).val();		
		$.post("/ajax/comment_shop_admin.php",  
		{
		 task1 : "task1",
		post_id: post_id,
		shop_comment_text: shop_comment_text,
		
			cache: false,
			})
			.error(
		  
			   function( )
			   {
			    $('#reply-holder-ul').css('border' , '1px solid #ff0000');
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
document.getElementById('reply-holder-ul'+post_id+'').innerHTML =response;
				 
				
			});
		
	}
}
