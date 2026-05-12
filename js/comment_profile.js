function comment_profile(post_id)
{
document.getElementById('btn_'+post_id+'').innerHTML = ' <div class=""><img src="/img/loading.gif"/></div>'; 

var profile_comment_text = $( '#profile_comment_text'+post_id+'' ).val();
	if(profile_comment_text == "" && profile_comment_text.length < 1 )
	{
		$('#profile_holder_ul'+post_id+'').css('border' , '1px solid #ff0000');
		  document.getElementById('btn_'+post_id+'').innerHTML = '<button type="submit" id="btn_'+post_id+'" onClick="comment_profile('+post_id+')" class="btn  btn-primary btn-xs">Comment</button>'; 

	}
	else
	{
	$('#profile_holder_ul'+post_id+'').addClass('loader');

var profile_comment_text = $( '#profile_comment_text'+post_id+'' ).val();		
		$.post("/ajax/comment_profile.php",  
		{
		 task1 : "task1",
		post_id: post_id,
		profile_comment_text: profile_comment_text,
		
			cache: false,
			})
			.error(
		  
			   function(response )
			   {
				  document.getElementById('profile_holder_ul'+post_id+'').innerHTML = '<em class="padding-10text-danger"> <a href="/index.php"> Login</a> or <a href="/create_account_mobile"> Sign up</a> to comment.</em>';
				 document.getElementById('btn_'+post_id+'').innerHTML = '<button type="submit" id="btn_'+post_id+'" onClick="comment_profile('+post_id+')" class="btn  btn-primary btn-xs">Comment</button>'; 

				
			   })
			.success(function(response)
			{
document.getElementById('profile_holder_ul'+post_id+'').innerHTML =response;
			// $( '#profile_comment_text'+post_id+'').val("");	 
				 document.getElementById('btn_'+post_id+'').innerHTML = '<button type="submit" id="btn_'+post_id+'" onClick="comment_profile('+post_id+')" class="btn  btn-primary btn-xs">Comment</button>'; 
                  $( '#profile_comment_text'+post_id+'' ).val("");
			 setTimeout( notification_comment(post_id),10000);

			});
		
	}
}

function notification_comment(post_id)
	{
		console.log('notification comment profile sent');
		//var post_id = $("#not_id").val();
		//send notification
		$.post("/api/notification.php", 
		{
		commentuser : "commentuser",
		post_id: post_id,
		cache: false,
		}).error(function()
			{
			
			}).success(function()
			{ 
				
			});
	}
