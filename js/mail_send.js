function suggestions_to_all_users()
{

//document.getElementById("fgt_btn").innerHTML = ' ';  

		// var subject = $( '#subject' ).val();
		// var message = $( '#message' ).val();
		 
	 document.getElementById("response").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;">Retrieving emails to send. <img src="img/loading.gif"/> </strong>'; 
	 
	console.log("start");
		
		 	 $.post("/ajax/mail_send.php",  
				{
					suggestions_to_all_users : "suggestions_to_all_users",
				  //	subject : subject,
				  //	message : message,
				  	
					cache: false,
				})
				
					.error(function(response)
					   {
						   console.log("error");
						//document.getElementById("fgt_btn").innerHTML = '<input type="submit" class="btn btn-warning" onClick="account_create()" value="Reload page"></input>'; 
						//console.log(message+' '+subject);
						////document.getElementById("reset_error").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Check your connection</strong>';
					   })
					.success(function(response)
					{
					    // document.getElementById("fgt_btn").innerHTML = '<input type="submit" class="btn btn-success" value="Success"></input>'; $("#reset_error").html(response);
						// $( '#message' ).val("");
						// $( '#subject' ).val("");
		              //  $( '#message' ).val(response);
					console.log("susscess");
		document.getElementById("response").innerHTML = response;
					});
	    
	
}

function mail_send_to_all()
{

document.getElementById("fgt_btn").innerHTML = ' ';  

		 var subject = $( '#subject' ).val();
		 var message = $( '#message' ).val();
		 
		 document.getElementById("reset_error").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;">Retrieving emails to send. <img src="img/loading.gif"/> </strong>';
		 
		if(message.length > 0 )
		{
		 	 $.post("/ajax/mail_send.php",  
				{
					mail_send_to_all : "mail_send_to_all",
				  	subject : subject,
				  	message : message,
				  	
					cache: false,
				})
				
					.error(function(response)
					   {
						document.getElementById("fgt_btn").innerHTML = '<input type="submit" class="btn btn-warning" onClick="account_create()" value="Reload page"></input>'; 
						//console.log(message+' '+subject);
						document.getElementById("reset_error").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Check your connection</strong>';
					   })
					.success(function(response)
					{
					     document.getElementById("fgt_btn").innerHTML = '<input type="submit" class="btn btn-success" value="Success"></input>'; $("#reset_error").html(response);
						 $( '#message' ).val("");
						 $( '#subject' ).val("");
		                 $( '#message' ).val("");
					
		
					});
	    }
	else
	{
	document.getElementById("reset_error").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Type your message</strong>';
	document.getElementById("fgt_btn").innerHTML = '<div class="pull-right" id="acc_btn"><input type="submit" class="btn btn-info" onClick="mail_send()" value="Send"></input></div>';
	
	
	}
}
function mail_send_user_all()
{

document.getElementById("fgt_btn1").innerHTML = ' ';  

		 var subject = $( '#subject1' ).val();
		 var message = $( '#message1' ).val();
		 
		 document.getElementById("reset_error1").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;">Retrieving emails to send. <img src="img/loading.gif"/> </strong>';
		 
		if(message.length > 0 )
		{
		 	 $.post("/ajax/mail_send.php",  
				{
					mail_send_to_all_user : "mail_send_to_all_user",
				  	subject : subject,
				  	message : message,
				  	
					cache: false,
				})
				
					.error(function(response)
					   {
						document.getElementById("fgt_btn1").innerHTML = '<input type="submit" class="btn btn-warning" onClick="account_create()" value="Reload page"></input>'; 
						console.log(response);
						document.getElementById("reset_error1").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Check your connection</strong>';
					   })
					.success(function(response)
					{
					     document.getElementById("fgt_btn1").innerHTML = '<input type="submit" class="btn btn-success" value="Success"></input>'; $("#reset_error1").html(response);
						 $( '#message1' ).val("");
						 console.log(response);
					     $( '#subject1' ).val("");
		 
					});
	    }
	else
	{
	document.getElementById("reset_error1").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Type your message</strong>';
	document.getElementById("fgt_btn1").innerHTML = '<div class="pull-right" id="acc_btn"><input type="submit" class="btn btn-info" onClick="mail_send_user_all()" value="Send"></input></div>';
	
	
	}
}
function mail_send()
{

document.getElementById("fgt_btn").innerHTML = ' ';  

		 var subject = $( '#subject' ).val();
		 var message = $( '#message' ).val();
		 
		 document.getElementById("reset_error").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;">Retrieving emails to send. <img src="img/loading.gif"/> </strong>';
		 
		if(message.length > 0 )
		{
		 	 $.post("/ajax/mail_send.php",  
				{
					feedback : "feedback",
				  	subject : subject,
				  	message : message,
				  	
					cache: false,
				})
				
					.error(function(response)
					   {
						document.getElementById("fgt_btn").innerHTML = '<input type="submit" class="btn btn-warning" onClick="account_create()" value="Reload page"></input>'; 
						//console.log(message+' '+subject);
						document.getElementById("reset_error").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Check your connection</strong>';
					   })
					.success(function(response)
					{
					     document.getElementById("fgt_btn").innerHTML = '<input type="submit" class="btn btn-success" value="Success"></input>'; $("#reset_error").html(response);
						 $( '#message' ).val("");
						 
					
		 $( '#subject' ).val("");
		$( '#message' ).val("");
					});
	    }
	else
	{
	document.getElementById("reset_error").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Type your message</strong>';
	document.getElementById("fgt_btn").innerHTML = '<div class="pull-right" id="acc_btn"><input type="submit" class="btn btn-info" onClick="mail_send()" value="Send"></input></div>';
	
	
	}
}
function mail_send_contact()
{
//document.getElementById("fgt_btn_in").innerHTML = ' ';  

		 var email = $( '#email_in' ).val();
		 var subject = $( '#subject_in' ).val();
		 var message = $( '#message_in' ).val();
		 
		 document.getElementById("fgt_btn_in").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;">Sending to Mykanta Team... <img src="img/loading.gif"/></strong>';
		 
		if(message.length > 0 )
		{
		 	 $.post("/ajax/mail_send.php",  
				{
					taskemail : "task",
				  	email : email,
				  	subject : subject,
				  	message : message,
				  	
					cache: false,
				})
				
					.error(function(response)
					   {
					
						document.getElementById("fgt_btn_in").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Check your connection</strong>';
					   })
					.success(function(response)
					{
					   document.getElementById("fgt_btn_in").innerHTML = '<input type="submit" class="btn btn-success" value="Mail Sent"></input><p class="text-primary" style="font-size:1.2em;">Thanks for sending us a message.</p>'; 
						 $("#reset_error_in").html(response);
					     $( '#email_in' ).val("");
						$( '#subject_in' ).val("");
						  $( '#message_in' ).val("");
					});
	    }
	else
	{
	document.getElementById("reset_error_in").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Type your message</strong>';
	
	
	}
}
function mail_send_ind()
{
//document.getElementById("fgt_btn_in").innerHTML = ' ';  

		 var email = $( '#email_in' ).val();
		 var subject = $( '#subject_in' ).val();
		 var message = $( '#message_in' ).val();
		 
		 document.getElementById("fgt_btn_in").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;">Sending to Mykanta Team... <img src="img/loading.gif"/></strong>';
		 
		if(message.length > 0 )
		{
		 	 $.post("/ajax/mail_send.php",  
				{
					taskemailind : "task",
				  	email : email,
				  	subject : subject,
				  	message : message,
				  	
					cache: false,
				})
				
					.error(function(response)
					   {
					
						document.getElementById("fgt_btn_in").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Check your connection</strong>';
					   })
					.success(function(response)
					{
					   document.getElementById("fgt_btn_in").innerHTML = '<input type="submit" class="btn btn-success" value="Mail Sent"></input><p class="text-primary" style="font-size:1.2em;">Thanks for sending us a message.</p>'; 
						 $("#reset_error_in").html(response);
					     $( '#email_in' ).val("");
						$( '#subject_in' ).val("");
						  $( '#message_in' ).val("");
					});
	    }
	else
	{
	document.getElementById("reset_error_in").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Type your message</strong>';
	
	
	}
}
function mail_feedback()
{
	document.getElementById("fgt_btn_in").innerHTML = ' ';  

		 var email = $( '#email_in' ).val();
		 var subject = $( '#subject_in' ).val();
		 var message = $( '#message_in' ).val();
		 
		 document.getElementById("reset_error_in").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;"> Retrieving email to send. <img src="img/loading.gif"/></strong>';
		 
		if(message.length > 0 )
		{
		 	 $.post("/ajax/mail_send.php",  
				{
					task_feedback : "task",
				  	email : email,
				  	subject : subject,
				  	message : message,
				  	
					cache: false,
				})
				
					.error(function(response)
					   {
						document.getElementById("fgt_btn_in").innerHTML = '<input type="submit" class="btn btn-warning" onClick="account_create()" value="Reload page"></input>'; 
					//	console.log(email+' '+subject);
						document.getElementById("reset_error_in").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Check your connection</strong>';
					   })
					.success(function(response)
					{
					     document.getElementById("fgt_btn_in").innerHTML = '<input type="submit" class="btn btn-success" value="Success"></input>'; 
						 $("#reset_error_in").html('<h5 class="text-success"> Sent! Thank you for send us your feedback.</h5>');
						 $( '#message_in' ).val("");
							 $( '#email_in' ).val("");
							  $( '#subject_in' ).val("");
							  $( '#message_in' ).val("");
					});
	    }
	else
	{
	document.getElementById("reset_error_in").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Type your message</strong>';
	
	document.getElementById("fgt_btn_in").innerHTML = '<div class="pull-right" id="acc_btn_in"><input type="submit" class="btn btn-info" onClick="mail_feedback()" value="Send"></input></div>';
	
	
	}
}
function bus_invite()
{
	document.getElementById("fgt_btn_in").innerHTML = ' ';  

		 var username = $( '#username' ).val();
		 var email = $( '#email_invite' ).val();

		 var message = $( '#message_invite' ).val();
		 
		 document.getElementById("reset_error_in").innerHTML = ' <strong class="text-info " style="margin-top:10px; margin-right:5px;"> Sending Business Invite. <img src="img/loading.gif"/></strong>';
		 
		if(message.length > 0 )
		{
		 	 $.post("/ajax/mail_send.php",  
				{
					task_invite : "task",
				  	email : email,
				  	username : username,
				  	 
				  	message : message,
				  	
					cache: false,
				})
				
					.error(function(response)
					   {
						document.getElementById("fgt_btn_in").innerHTML = '<input type="submit" class="btn btn-warning" value="Reload page"></input>'; 
					//	console.log(email+' '+subject);
						document.getElementById("reset_error_in").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Check your connection</strong>';
					   })
					.success(function(response)
					{
					     document.getElementById("fgt_btn_in").innerHTML = '<input type="submit" class="btn btn-success" value="Success"></input>'; 
						 $("#reset_error_in").html(response+ '<h5 class="text-success"> Sent! Thank you for the Business Invitation.</h5>');
						 $( '#message_invite' ).val("");
							 $( '#email_invite' ).val("");
							  
							  $( '#message_invite' ).val("");
					});
	    }
	else
	{
	document.getElementById("reset_error_in").innerHTML = ' <strong class="text-danger " style="margin-top:10px; margin-right:5px;">Type your message</strong>';
	
	document.getElementById("fgt_btn_in").innerHTML = '<div class="pull-right" id="acc_btn_in"><input type="submit" class="btn btn-info" onClick="mail_feedback()" value="Send"></input></div>';
	
	
	}
}
