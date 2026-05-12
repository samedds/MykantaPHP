function post_colloxn_each(post_id)
{
$(".superbox-show").hide();
$(".superbox-list").removeClass("active");
	if(post_id == "")
	{
		alert("Please report this to support@mykanta.com");
	}
	else
	{
		//$('.superbox-show').show();
		$('#super_box'+post_id+'').show();
		$('#spbox'+post_id+'').val();
		$('#superbox-list'+post_id+'').addClass("active");
	//$(".superbox-show").hide();
		$.post("/ajax/collection_load_each.php",  
		{
		
		 task : "load_product",
		post_id: post_id,
		cache: false,
			})
			.error(
		  
			   function( )
			   {
				$(".superbox-show").hide();
			   })
			.success(function(response)
			{
			   document.getElementById('collxn_box'+post_id+'').innerHTML= response;
			   
			});
		
	}
}function post_colloxn_each_friend(post_id)
{
$(".superbox-show").hide();
$(".superbox-list").removeClass("active");
	if(post_id == "")
	{
		alert("Please report this to support@mykanta.com");
	}
	else
	{
		//$('.superbox-show').show();
		$('#super_box'+post_id+'').show();
		$('#spbox'+post_id+'').val();
		$('#superbox-list'+post_id+'').addClass("active");
	//$(".superbox-show").hide();
		$.post("/ajax/collection_load_each.php",  
		{
		
		 task_friend: "load_product",
		post_id: post_id,
		cache: false,
			})
			.error(
		  
			   function( )
			   {
				$(".superbox-show").hide();
			   })
			.success(function(response)
			{
			   document.getElementById('collxn_box'+post_id+'').innerHTML= response;
			   
			});
		
	}
}

