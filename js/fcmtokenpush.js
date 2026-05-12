 var token = 0;
 token = localStorage.getItem('token');
 //console.log(token);
if (token != null )
 {
	//alert(token);
	 $.post("/include/token_check.php",  
				{
			     	fcmToken : token,		  		
					cache: false,
				})
				.error(function( )
					  {
						  console.log( "FCM Error: " );
					   })
					.success(function(response)
					{
						console.log('fcm js response '+response);
						if (response == 2)
						{
						//var uri="/User";
							//document.location.href = "/User";
							 console.log( 'insert' );
						}
						else if (response == 1){
						   console.log( 'update' );
                         //  localStorage.removeItem('email_user');
						   //window.location="/index_login.php";
						}
						else if (response == 0){
						console.log( 'no token' );
						}
				      
					});
 }
 else
 {
	localStorage['token'] = token;
	console.log('new token ' +token);
	}
 