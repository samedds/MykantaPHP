$(document).ready(function(){
	$.filter_input = $('#filter-chat-list');
	$.chat_users_container = $('#chat-container > .chat-list-body')
	$.chat_users = $('#chat-users')
	$.chat_list_btn = $('#chat-container > .chat-list-open-close');
	$.chat_body = $('#chat-body');

	/*
	* LIST FILTER (CHAT)
	*/
console.log( "saaaaaaaaaaaa: " ); 
	// custom css expression for a case-insensitive contains()
	jQuery.expr[':'].Contains = function(a, i, m) {
		return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
	};

	function listFilter(list) {// header is any element, list is an unordered list
		// create and add the filter form to the header

		$.filter_input.change(function() {
			var filter = $(this).val();
			if (filter) {
				// this finds all links in a list that contain the input,
				// and hide the ones not containing the input while showing the ones that do
				$.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
				$.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
			} else {
				$.chat_users.find("li").slideDown();
			}
			return false;
		}).keyup(function() {
			// fire the above change event after every letter
			$(this).change();

		});

	}

	// on dom ready
	listFilter($.chat_users);

	// open chat list
	$.chat_list_btn.click(function() {
		$(this).parent('#chat-container').toggleClass('open');
	})

	$.chat_body.animate({
		scrollTop : $.chat_body[0].scrollHeight
	}, 500);
	//////////////////////////
	chatCheck();
	
	//hide to stop notification
	loadLog();
	loadLog_business();
	//load the chat contents instantly
	setInterval(loadLog, 7500);	//Reload file every 2500 ms or x ms if you w
	setInterval(loadLog_business, 7500);	//Reload file every 2500 ms or x ms if you w
	setInterval(chatCheck,7500);
	setInterval(chatCheck_business,7500);
	setTimeout(autoscroll,150);
	//setInterval(chatCheck,60000);
	$('#hiddenChatMinCheck').val("minimized");
	
	//click send message
	$("#submitchat").click(function(){	
	console.log( "ResponseText: " ); 
		var clientmsg = $("#usermsg").val();
		var fileid = $('#hiddenId').val();
		var friend_id = $('#hiddenFriendId').val();
		if((clientmsg != "") && (fileid != "")){
			$.post("/include/chat/procmessage.php", {text: clientmsg, fileid: fileid, friend_id: friend_id})
			.error(function()
			   {
				 // console.log( "Error: " );   //sam commented this to check if the loading at the title will stop
			   })
		  	.success(function( data )
			   {
			   	 $("#usermsg").val("");
			   	 setTimeout(autoscroll,150);
				  console.log( "ResponseText: " + data ); //sam commented this to check if the loading at the title will stop
				  setTimeout( notification_friend_chat(friend_id),1000);

			   });
		}
		return false;
	});		
	//click send message
	$("#submitmsg_friend").click(function(){
console.log( "ResponseText: f" ); 		
		var clientmsg = $("#usermsg").val();
		var fileid = $('#hiddenId').val();
		var friend_id = $('#hiddenFriendId').val();
		if((clientmsg != "") && (fileid != "")){
			$.post("/include/chat/procmessage.php", {text: clientmsg, fileid: fileid, friend_id: friend_id})
			.error(function()
			   {
				 // console.log( "Error: " );   //sam commented this to check if the loading at the title will stop
			   })
		  	.success(function( data )
			   {
			   	 $("#usermsg").val("");
				
			   $('#chatWrapper').html('') ;
			   
			   //	$('#chatWrapper').html('<div class="jarviswidget-editbox"><div><label>Title:</label><input type="text" /></div></div><div class="padding-10"><div id="chat-container" class="open chat-container" style="height:0px;"></div><ul id="chat-body" class="hidden padding-5 chat-body custom-scroll myChatBody" style="height:0px; list-style:none;"></ul><div class="row"><div class="padding-10" style="background-color: #EAEAEA;"><div class="input-group input-group-lg"><span class="input-group-addon"><i class="fa fa-envelope"></i></span><div class="icon-addon addon-lg"><input placeholder="Message here..." class="form-control" id="usermsg" name="usermsg" type="input"/></div><span class="input-group-btn" id=""><button class="btn btn-default"  id="submitmsg_friend" name="submitmsg_friend" type="submit">Send</button></span></div></div></div></div');
			   	$('#sent_message').html('<img src="/img/gcheck.png" style="height:27px;"/>');
				// console.log( "ResponseText: " + data ); //sam commented this to check if the loading at the title will stop 
				//$('#chatWrapper').style('display','none');
			   });
		}
		return false;
	});	
	//click send message business
	$("#submitmsg_business").click(function(){	
	console.log( "ResponseText:a " ); 
		var clientmsg = $("#usermsg").val();
		var fileid = $('#hiddenId').val();
		var friend_id = $('#hiddenFriendId').val();
		var shop_id = $('#hiddenShopId').val();
		if((clientmsg != "") && (fileid != "")){
			$.post("/include/chat/procmessage.php", {text_business_admin: clientmsg, fileid: fileid, friend_id: friend_id, shop_id: shop_id})
			.error(function()
			   {
				 // console.log( "Error: " );   //sam commented this to check if the loading at the title will stop
			   })
		  	.success(function( data )
			   {
			   	 $("#usermsg").val("");
			   	 setTimeout(autoscroll,150);
				// console.log( "ResponseText: " + data ); //sam commented this to check if the loading at the title will stop
			   });
		}
		return false;
	});

});

function chatMinBtnFunc()
{
	var chatMinCheck = $('#hiddenChatMinCheck').val();
	//console.log(chatMinCheck); //sam commented this to check if the loading at the title will stop
	if(chatMinCheck == "maximized"){
		$('#chatWrapper').hide();
		$('#chatMinBtnI').removeClass("fa-minus");
		$('#chatMinBtnI').addClass("fa-plus");
		chatMinCheck = "minimized";
		$('#hiddenChatMinCheck').val("minimized");
	}
	else if(chatMinCheck == "minimized"){
		$('#chatWrapper').show();
		$('#chatMinBtnI').removeClass("fa-plus");
		$('#chatMinBtnI').addClass("fa-minus");
		chatMinCheck = "maximized";
		$('#hiddenChatMinCheck').val("maximized");
	}
}
var counter = 1;

function notifyme(friend_name, friend_id, text, chat_file){
	
	  $.smallBox({
	         	title : "Message from: "+friend_name,
		content : text+ "<p class=''><a href='javascript:chatViewClick("+chat_file+","+friend_id+", "+counter+");' class='btn btn-default btn-sm'>View</a></p>", 
		iconSmall : "fa fa-times fa-2x fadeInRight animated",
		color : "#296191",
		timeout: 8000,
	       });

	
	
	//alert(counter);
	counter = counter + 1;
}

function loadLog(){
	var oldscrollHeight = $(".myChatBody").attr("scrollHeight") - 20; //Scroll height before the request
	var id2 = $('#hiddenId').val();
	$.ajax({
		url: "/include/chat/logs/"+id2+".html",
		cache: false,
		success: function(html){		
			$(".myChatBody").html(html); //Insert chat log into the #chatbox ul
	  	},
	});
}

function loadLog_business(){
	var oldscrollHeight = $(".myChatBody").attr("scrollHeight") - 20; //Scroll height before the request
	var id2 = $('#hiddenId').val();
	$.ajax({
		url: "/include/chat/logs_bus/"+id2+".html",
		cache: false,
		success: function(html){		
			$(".myChatBody").html(html); //Insert chat log into the #chatbox ul
	  	},
	});
}

function autoscroll()
{
	$('.myChatBody').stop().animate({
	  scrollTop: $(".myChatBody")[0].scrollHeight
	}, 800);
}

function chatFriendClick(id,friend_id)
{
	//alert(friend_id);
	$('#chatWrapper').show();
	$('#hiddenId').val(id);
	$('#hiddenFriendId').val(friend_id);
	$('.chat-container').removeClass("open");
	//$('#chatTitle').html("sup");
	//loadLog();
	//load the chat contents instantly
	//setInterval(loadLog, 10000);	//Reload file every 2500 ms or x ms if you w
	//setInterval(chatCheck,10000);
	//setTimeout(autoscroll,150);
	var frndname = $('#hdfrndname'+friend_id).val();
	$('#chatTitle').html('<i class="fa fa-comments"></i> '+frndname+'<hr>');
	$('#not_'+friend_id).html(''); 
	$.post("/include/chat/procmessage.php", {update_status: friend_id })
			.error(function()
			   {
				 // console.log( "Error: " );   //sam commented this to check if the loading at the title will stop
			   })
		  	.success(function( data )
			   {
			   	// $('#not_'+user_id).html('<badge class="badge inbox-badge" style="background-color:red;"> +1</badge>');
				 $('#not_'+friend_id).html(''); 
				// console.log( "ResponseText: " + data ); //sam commented this to check if the loading at the title will stop
			   });
}
function chatFriendClick_page(id,friend_id)
{
	//alert(friend_id);
	$('#chatWrapper').show();
	$('#hiddenId').val(id);
	$('#hiddenFriendId').val(friend_id);
	$('.chat-container').removeClass("open");
	//$('#chatTitle').html("sup");
	//loadLog();
	//load the chat contents instantly
	//setInterval(loadLog, 10000);	//Reload file every 2500 ms or x ms if you w
	//setInterval(chatCheck,10000);
	//setTimeout(autoscroll,150);
	//var frndname = $('#hdfrndname'+friend_id).val();
	//$('#chatTitle').html(frndname+'<hr>');
	$('#not_user').html(''); 
}

function chatbusinessClick(chat_file,shop_id,client_id)
{
	//alert(friend_id);
	$('#chatWrapper').show();
	$('#hiddenId').val(chat_file);
	$('#hiddenFriendId').val(client_id);
	$('#hiddenShopId').val(shop_id);
	$('.chat-container').removeClass("open");
	//$('#chatTitle').html("sup");
	//loadLog();
	//load the chat contents instantly
	//setInterval(loadLog, 10000);	//Reload file every 2500 ms or x ms if you w
	//setInterval(chatCheck,10000);
	//setTimeout(autoscroll,150);
	var frndname = $('#hdfrndname'+client_id).val();
	$('#chatTitle').html(frndname);
	//$("#submitmsg_business").click();
   // loadLog_business();
    //$('#message_send_button').html('<button class="btn btn-default"  id="submitmsg_business" name="submitmsg_business" type="submit">Send</button>');
	//document.getElementById('message_send_button').innerHTML ='<button type="submit" class="btn	btn-primary " id="submitmsg_business" name="submitmsg_business">Send</button>';
	//post the date to friends list so it calls them in date order.
}

function chatViewClick(id,friend_id,counter)
{ 
	var hiddenChatMinCheck = $('#hiddenChatMinCheck').val();
	if(hiddenChatMinCheck == "maximized"){
	}
	else if(hiddenChatMinCheck == "minimized"){
		$('#chatWrapper').show();
		$('#chatMinBtnI').removeClass("fa-plus");
		$('#chatMinBtnI').addClass("fa-minus");
		$('#hiddenChatMinCheck').val("maximized");
	}
	chatFriendClick(id,friend_id);
	$('#bigBox'+counter).remove();
	$('#miniIcon'+counter).remove();
	
}

function chatCheck()
{
	var owner_id = 1;
	var user_id = $('#user_id').val();
	//alert(owner_id);
	$.post("/include/chat/checkmessage.php", {owner_id: owner_id})
	.error(function()
	   {
		 // console.log( "Error: " ); //sam commented this to check if the loading at the title will stop
	   })
  	.success(function( data )
	   {
		
			if(data != "unsuccessful")
			{	
			res = data.split("+-");
			//	$token = res[2];
				if(res[0] == '' || res[3] == '')
				{
				
				}
				else{
				  //$('#chatTitle').html(''+res[0]+''); 
				 $('#not_user').html('<badge class="badge inbox-badge" style="background-color:red;"> <i class="fa fa-user"></i></badge>');
				 $('#not_'+res[1]+'').html('<badge class="badge inbox-badge" style="background-color:red;"> +1</badge>'); 
				}
			//  $('#chatTitle').html('Customer Care!');
				//$('#chat_header').css('background-color' , '#4C4F53');
				
				//console.log( "ResponseText: " + data ); 
			
				
			}
			//else{  //sam commented this to check if the loading at the title will stop
				//alert("no message found");
			//}
	   });
}

function chatCheck_business()
{
	var owner_id = $('#owner_id').val();
	var shop_id = $('#shop_id').val();
	//alert(owner_id);
	$.post("/include/chat/checkmessage.php", {owner_id_business_admin: owner_id,shop_id: shop_id})
	.error(function()
	   {
		 // console.log( "Error: " ); //sam commented this to check if the loading at the title will stop
	   })
  	.success(function( data )
	   {
			//console.log( "ResponseText: " + data );  //sam commented this to check if the loading at the title will stop
			if(data != "unsuccessful")
			{	
			res = data.split("+-");
			var token = res[2];
				
				switch(token){
				case "1":  $('#chatTitle').html('Customer Care!');
				//$('#chat_header').css('background-color' , '#4C4F53');
				break;
				
				case "2":   $('#chatTitle').html('<em class="text-success " onClick="chatbusinessClick('+res[1]+'.'+res[0]+','+res[0]+');" > <badge class="badge inbox-badge" style="background-color:red;  "> +1	 </badge> </em> '+res[3] +''); 
				//$('#chat_header').css('background-color' , '#5bc0de');
				break;
				
				}
				
			}
			
	   });
}

function reload_cus_list_chat_of_admin($shop_id)
{
	//var owner_id = $('#owner_id').val();
	var shop_id = $('#shop_id').val();
	//alert(owner_id);
	$.post("/include/chat/checkmessage.php", {reload_cus_list_chat_of_admin:shop_id})
	.error(function()
	   {
		 // console.log( "Error: " ); //sam commented this to check if the loading at the title will stop
	   })
  	.success(function( data )
	   {
			
		 $('#chat-users').html(data);
		
				
				
			
			
	   });
}

function notification_friend_chat(friend_id)
	{
		console.log('notification chat sent');
		//var post_id = $("#not_id").val();
		//send notification
		$.post("/api/notification.php", 
		{
		friend_chat : "friend_chat",
		friend_id: friend_id,
		cache: false,
		}).error(function()
			{
			
			}).success(function()
			{ 
				
			});
	}

