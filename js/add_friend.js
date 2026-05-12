
function add_friend_sug(friend_id)
{
	if(friend_id == "")
	{
		alert("Report this to your Admin.");
	}
	else
	{
    document.getElementById('accept_friend_box'+friend_id+'').innerHTML  = '<div class=""><img src="/img/loading.gif"/></div>'; 
		
		
		$.post("/ajax/add_friend.php",  
		{
		 task_sug : "task",
		friend_id: friend_id,
		
			cache: false,
			})
			.error(
		  
			   function( )
			   {
			    $('#ad_frin').css('border' , '1px solid #ff0000');
				  //console.log( "Error: " );
			   })
			.success(function(response)
			{
		document.getElementById('accept_friend_box'+friend_id+'').innerHTML =response;
				console.log(response);
			});
		
	}
}
function add_friend(friend_id)
{
	if(friend_id == "")
	{
		alert("Report this to your Admin.");
	}
	else
	{
	//$("#wass").addClass('loader');
     // $('#wass').html  = ' <img src="/img/loading.gif"/> '; 
	   document.getElementById("wass").innerHTML = ' <img src="/img/loading.gif"/> '; 
		var friend_id = $('#friend_id').val();
		
		$.post("/ajax/add_friend.php",  
		{
		 task : "task",
		friend_id: friend_id,
		
			cache: false,
			})
			.error(
		  
			   function( )
			   {
			    $('#ad_frin').css('border' , '1px solid #ff0000');
				  //console.log( "Error: " );
			   })
			.success(function(response)
			{
		 document.getElementById("wass").innerHTML =response;
		  setTimeout( notification_req(friend_id),10000);
				
			});
		
	}
}
function accept_friend(activate_friend)
{
	if(activate_friend == "")
	{
		alert("Report this to your Admin.");
	}
	else
	{
	$("#accept_friend_box").addClass('loader');

		var friend_id = $('#friend_id').val();
		
		$.post("/ajax/acceptprocess.php",  
		{
		 task1 : "task1",
		activate_friend: activate_friend,
		
			cache: false,
			})
			.error(
		  
			   function( )
			   {
			    $('#accept_friend_box').css('border' , '1px solid #ff0000');
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
document.getElementById('accept_friend_box'+activate_friend+'').innerHTML =response;
				 
				
			});
		
	}
}

function rfus_friend(deny_friend)
{
	if(deny_friend == "")
	{
		alert("Report this to your Admin.");
	}
	else
	{
	$("#accept_friend_box").addClass('loader');

		var friend_id = $('#friend_id').val();
		
		$.post("/ajax/denyprocess.php",  
		{
		 task2 : "task2",
		deny_friend: deny_friend,
		
			cache: false,
			})
			.error(
		  
			   function( )
			   {
			    $('#accept_friend_box').css('border' , '1px solid #ff0000');
				  console.log( "Error: " );
			   })
			.success(function(response)
			{
				document.getElementById('accept_friend_box'+deny_friend+'').innerHTML =response;	
			});
		
	}
}


function notification_req(friend_id)
	{
		console.log('notification add friend');
		//var post_id = $("#not_id").val();
		//send notification
		$.post("/api/notification.php", 
		{
		friend_req : "friend_req",
		friend_id: friend_id,
		cache: false,
		}).error(function()
			{
			
			}).success(function()
			{ 
				
			});
	}