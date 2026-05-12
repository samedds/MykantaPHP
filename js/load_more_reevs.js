function load_more_reevs(_id_of_user,reev_id,num)
{ 
	  document.getElementById('load_more_reev_box'+num+'').innerHTML = ' <div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>'; 
$.post("/ajax/load_more_reevs.php", 
		{
		

		load_more_reevs : "task",
			_id_of_user: _id_of_user,
			reev_id: reev_id,
			num: num,
		  	cache: false,
		}).error(function( )
			   {
				 
			   })
			.success(function(response)
			{ $( '#load_more_reev_box5').hide;
			// document.getElementById('load_more_reev_box'+num).innerHTML.hide;
//var new_reev = num			
			
			setTimeout(function() {
				$('#mydiv').fadeOut('fast');
			$( '#load_more_reev_box'+num+'').hide();
			
			}, 1000); // <-- time in milliseconds
			
			
			setTimeout(function() {
			$("#load_more_reevs").delay(3200).fadeIn('slow').append(response);
			
			}, 980); // <-- time in milliseconds
			
			});
			}
			
			
function load_more_reevs_conect(_id_of_user,reev_id,num)
{ 
	  document.getElementById('load_more_reev_box'+num+'').innerHTML = ' <div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>'; 
$.post("/ajax/load_more_reevs.php", 
		{
		

		load_more_reevs_conect : "task",
			_id_of_user: _id_of_user,
			reev_id: reev_id,
			num: num,
		  	cache: false,
		}).error(function( )
			   {
				 
			   })
			.success(function(response)
			{ $( '#load_more_reev_box5').hide;
			// document.getElementById('load_more_reev_box'+num).innerHTML.hide;
//var new_reev = num			
			
			setTimeout(function() {
				$('#mydiv').fadeOut('fast');
			$( '#load_more_reev_box'+num+'').hide();
			
			}, 1000); // <-- time in milliseconds
			
			
			setTimeout(function() {
			$("#load_more_reevs").delay(3200).fadeIn('slow').append(response);
			
			}, 980); // <-- time in milliseconds
			
			});
			}
			
			
function load_more_reevs_tag(num,hashtag)
{         	 var load_reev_button = $( '#load_reev_button' ).val();
	  document.getElementById('load_more_reevs_tag'+num).innerHTML = ' <div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>'; 
$.post("/ajax/load_more_reevs.php", 
		{
		

		load_more_reevs_tag : "task",
			hashtag: load_reev_button,
			num: num,
		  	cache: false,
		}).error(function( )
			   {
				 
			   })
			.success(function(response)
			{ $( '#load_more_reevs_tag'+num).hide;
			// document.getElementById('load_more_reev_box'+num).innerHTML.hide;
//var new_reev = num			
			
			setTimeout(function() {
				$('#mydiv').fadeOut('slow');
			$( '#load_more_reevs_tag'+num).hide();
			
			}, 1000); // <-- time in milliseconds
			
			
			setTimeout(function() {
			$("#load_more_reevs").delay(3200).fadeIn('slow').append(response);
			
			}, 980); // <-- time in milliseconds
			
			});
			}
			
function load_more_reevs_conect_pub(_id_of_user,reev_id,num)
{ 
	  document.getElementById('load_more_reev_box'+num+'').innerHTML = ' <div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>'; 
$.post("/ajax/load_more_reevs.php", 
		{
		

		load_more_reevs_conect_pub : "task",
			_id_of_user: _id_of_user,
			reev_id: reev_id,
			num: num,
		  	cache: false,
		}).error(function( )
			   {
				 
			   })
			.success(function(response)
			{ $( '#load_more_reev_box5').hide;
			// document.getElementById('load_more_reev_box'+num).innerHTML.hide;
//var new_reev = num			
			
			setTimeout(function() {
				$('#mydiv').fadeOut('fast');
			$( '#load_more_reev_box'+num+'').hide();
			
			}, 1000); // <-- time in milliseconds
			
			
			setTimeout(function() {
			$("#load_more_reevs").delay(3200).fadeIn('slow').append(response);
			
			}, 980); // <-- time in milliseconds
			
			});
			}
			
			
function load_more_reevs_tag_pub(num,hashtag)
{         	 var load_reev_button = $( '#load_reev_button' ).val();
	  document.getElementById('load_more_reevs_tag'+num).innerHTML = ' <div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>'; 
$.post("/ajax/load_more_reevs.php", 
		{
		

		load_more_reevs_tag_pub : "task",
			hashtag: load_reev_button,
			num: num,
		  	cache: false,
		}).error(function( )
			   {
				 
			   })
			.success(function(response)
			{ $( '#load_more_reevs_tag'+num).hide;
			// document.getElementById('load_more_reev_box'+num).innerHTML.hide;
//var new_reev = num			
			
			setTimeout(function() {
				$('#mydiv').fadeOut('slow');
			$( '#load_more_reevs_tag'+num).hide();
			
			}, 1000); // <-- time in milliseconds
			
			
			setTimeout(function() {
			$("#load_more_reevs").delay(3200).fadeIn('slow').append(response);
			
			}, 980); // <-- time in milliseconds
			
			});
			}
			
function smile_ico(post_id)
{ 
 //document.getElementById('smiles_box'+post_id).innerHTML='<img  class="img img-circle" src="/img/site_img/smiles/smile_3.png" style="height:30px; margin-top:-18px;" />'; 
$.post("/ajax/load_more_reevs.php", 
{
smile : "task",
post_id: post_id,
cache: false,
})
.error(function( )
{
 
})
.success(function(data)
{ 
document.getElementById('smile_box'+post_id).innerHTML=' <img  class="img img-circle" src="/img/site_img/smiles/smile_3.png" style="height:30px; margin-top:-18px;"/><span class="font-xs" id="in_box'+post_id+'">'+data+' <span class="hidden-xs hidden-sm "> smile(s)</span>';
  setTimeout( notification_smile(post_id),1000);
});
}


function seen_remove(seen_id)
{ 
 document.getElementById('seen_box'+seen_id).innerHTML='<img  title="repost" class="img img-circle" src="/img/site_img/reev_icons/reev_sh1.png" style="height:22px; margin-top:-13px;" />'; 
$.post("/ajax/load_more_reevs.php", 
	{
	seen_remove : "seen_remove",
	seen_id: seen_id,
	cache: false,
	})
	.error(function( )
	{
	 
	})
	.success(function(response)
		{ 
		 document.getElementById('seen_box'+seen_id).innerHTML=' <img  class="img img-circle" src="/img/site_img/reev_icons/reev_sh.png" onclick="seen_ico('+seen_id+');" title="reposted" style="height:22px; margin-top:-13px;"/> '+response+'<span class="font-xs" id="in_box'+seen_id+'"> <span class="hidden-xs hidden-sm "></span>';

});
}
			
function seen_ico(seen_id)
{ 
 document.getElementById('seen_box'+seen_id).innerHTML='<img  title="repost" class="img img-circle" src="/img/site_img/reev_icons/reev_sh.png" style="height:22px; margin-top:-13px;" />'; 
$.post("/ajax/load_more_reevs.php", 
{
seen : "task",
seen_id: seen_id,
cache: false,
})
.error(function( )
{
 
})
.success(function(response)
{ 
 document.getElementById('seen_box'+seen_id).innerHTML=' <img  onclick="seen_remove('+seen_id+');" class="img img-circle" src="/img/site_img/reev_icons/reev_sh1.png" title="reposted" style="height:22px; margin-top:-13px;"/> '+response+'<span class="font-xs" id="in_box'+seen_id+'"> <span class="hidden-xs hidden-sm "></span>';
  setTimeout( notification_repost(seen_id),1000);

});
}

function smile_ico_conn(post_id)
{ 


var myElem = document.getElementById('smile_box'+post_id);
if (myElem === null)
{
 document.getElementById('smile_box_con'+post_id).innerHTML='<div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>';
}
else {
 document.getElementById('smile_box'+post_id).innerHTML=' <div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>';
 
 document.getElementById('smile_box_con'+post_id).innerHTML='<div class="btn btn-default"><img src="/img/site_img/image.gif"/></div>';
}

$.post("/ajax/load_more_reevs.php", 
{
smile : "task",
post_id: post_id,
cache: false,
})
.error(function( )
{
 
})
.success(function(response)
{ 

if (myElem === null)
{
 document.getElementById('smile_box_con'+post_id).innerHTML=' <img  class="img img-circle" src="/img/site_img/smiles/smile_3.png" style="height:30px; margin-top:-18px;"/><span class="font-xs" id="in_box'+post_id+'">'+response+' <span class="hidden-xs hidden-sm "> smile(s)</span>';
}
else {
 document.getElementById('smile_box'+post_id).innerHTML=' <img  class="img img-circle" src="/img/site_img/smiles/smile_3.png" style="height:30px; margin-top:-18px;"/><span class="font-xs" id="in_box'+post_id+'">'+response+' <span class="hidden-xs hidden-sm "> smile(s)</span>';
 
 document.getElementById('smile_box_con'+post_id).innerHTML=' <img  class="img img-circle" src="/img/site_img/smiles/smile_3.png" style="height:30px; margin-top:-18px;"/><span class="font-xs" id="in_box'+post_id+'">'+response+' <span class="hidden-xs hidden-sm "> smile(s)</span>';
}


});
}

setInterval(load_new_reevs,20000);

function load_new_reevs()
{
	 $.post( "/ajax/load_more_reevs.php " ,
		   {
			   load_new_reevs : "load_new_reevs",
		   }
		  )
		  .error(
			   function( )
			   {
				
			   })
		 .success(function(response)
			{
			if(response > 00)
			{
			    document.getElementById('load_new_reevs').innerHTML = '<button class="btn panel btn-block" onClick="load_new_items();" style="background-color:#e1e1e1; color:#5bc0de;">Load new Reevs +'+response+'</button>';
				
			}
			//console.log(response);
			
			
           
});
}

function load_new_items()
{
	 $.post( "/ajax/load_more_reevs.php " ,
		   {
			   load_new_items : "load_new_items",
		   }
		  )
		  .error(
			   function( )
			   {
				
			   })
		 .success(function(response)
			{
			if(response != '')
			{
			    document.getElementById('load_new_items').innerHTML = response;
			    document.getElementById('load_new_reevs').innerHTML = "";
				
			}
			//console.log(response);
			
			
           
});
}
function notification_smile(post_id)
	{
		//send notification
		$.post("/api/notification.php", 
		{
		smile : "smile",
		post_id: post_id,
		cache: false,
		}).error(function()
			{
			console.log('notification smile not sent');
			}).success(function()
			{ 
				console.log('notification smile sent');
			
			});
	}	
function notification_repost(post_id)
	{
		//send notification
		$.post("/api/notification.php", 
		{
		repost : "repost",
		post_id: post_id,
		cache: false,
		}).error(function()
			{
			console.log('notification repost not sent');
			}).success(function()
			{ 
				console.log('notification repost sent');
			
			});
	}	
