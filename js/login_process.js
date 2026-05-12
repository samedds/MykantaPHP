 var token = 0;
 token = localStorage.getItem('email_user');
 console.log(token);
 if (token != null )
 {
	 $.post("/include/token_check.php",  
				{
			     	token : token,		  		
					cache: false,
				})
				.error(function( )
					  {
						  console.log( "Error: " );
					   })
					.success(function(response)
					{
						if (response == 2)
						{
						var uri="/User";
							document.location.href = "/User";
						}
						else if (response == 1){
						   console.log( 'wrong token' );
                           localStorage.removeItem('email_user');
						   //window.location="/index_login.php";
						}
						else if (response == 0){
						console.log( 'no token' );
						}
				      
					});
 }
  function login_user()
{ document.getElementById("haa").innerHTML = '<button class="btn btn-success"><img src="/img/loading.gif"/></button>';  

		 var email = $( '#email' ).val(); 
		 var password = $( '#pass' ).val();
		 var remb_me = $( '#remb_me' ).val();

		 if(email.length < 1 )
	   	{
		  document.getElementById("haa").innerHTML = ' <small class="text-danger " style="">Enter email or Username</small>';
		}else if(password.length < 3 )
	   	{
		   document.getElementById("haa").innerHTML = ' <small class="text-danger " style="">Password must to be 8 charaters</small>';
		}else if( email.length > 2 && password.length > 2 )
	   	{
			$.post("/login-auth",  
				{
					task : "task",
				  	email : email,
				  	pass : password,		  		
					cache: false,
				})
				.error(function( )
					  {
							document.getElementById("haa").innerHTML = ' <strong class="text-danger " style="">Error! Check you network.</strong>';
					   })
					.success(function(response)
					{
						if(response == "false")
						{
						document.getElementById("haa").innerHTML = ' <strong class="text-danger " style=""> Wrong Username or Password</strong>';
						}
						else if(response.length > 2)
						{
						var uri="/user";
						redirect(uri);	
					}
					localStorage.setItem('email_user',email);
			         localStorage['token'] = token;
					 
							function redirect(uri) {
							  if(navigator.userAgent.match(/Android/i)) 
								//document.location=uri;     
								window.location.href = uri;
								//windows.open(uri);
							  else
								window.location.replace(uri);
							}
					});
		}
		else
	  	{
	  		//textarea is empty
	  		document.getElementById("haa").innerHTML = ' <strong class="text-danger " style="">Type in your Email. Thank you!</strong>';
		}
	 //save token
        saveToken = function (token){
            sessionStorage.setItem("token",token);
            localStorage['token'] = token;
        };
        //save user info
       saveUser = function (user) {
            sessionStorage.setItem("user",user);
            localStorage['user'] = user;
        };
}