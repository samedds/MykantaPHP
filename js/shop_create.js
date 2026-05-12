function create_business()
{ document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success"><img src="/img/loading.gif"/></button>';  
		 var shopname = $( '#bizname' ).val(); 
		 var shop_descrb = $( '#shopdescrb' ).val();
		 var address = $( '#biz_address' ).val();
		 var telephone = $( '#shop_telephone' ).val();
		 var email = $( '#biz_email' ).val();
		 var city = $( '#biz_city' ).val();
         var state = $( '#region' ).val();
		 //var category = $( '#category' ).val();
		 var country = $( '#biz_country' ).val();
		 var code = $( '#biz_code' ).val();
		 var business_url = $( '#business_url' ).val();
		 var core_products = $( '#biz_core_products' ).val();
	     var bus_type = $( '#biz_type' ).val();
	     var bus_cat = $( '#biz_cat' ).val();
		 var datetime = $( '#datetime' ).val();
		 var dob = $( '#dob' ).val();
		
		if(document.getElementById("do1").checked)
			   {
			     do1 = "1";
			   }
			   else
			   {
			    do1 = "0";
			   }
		if(document.getElementById("do2").checked)
			   {
			    do2 = "1";
			   }
			   else
			   {
			   	 do2 = "0";
			   }
		if(document.getElementById("do3").checked)
			   {
			     do3 = "1";
			   }
			   else
			   {
			   	 do3 = "0";
			   }

		if(shopname.length < 1 )
	   	{
		  document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter Business name</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		} else if(email.length < 1 )
	   	{
		  document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter email</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if(shop_descrb.length < 1 )
	   	{
		   document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter description</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if(address.length < 1 )
	   	{
		  document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter address</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if(state.length < 1 )
	   	{
		   document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter region</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if(bus_cat.length < 1 )
	   	{
		   document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter category</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if(telephone.length < 1 )
	   	{
		   document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter telephone</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if(city.length < 1 )
	   	{
		   document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter City</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if(country.length < 1 )
	   	{
		  document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter Country</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if(bus_type.length < 1 )
	   	{
		   document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter business type</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if(core_products.length < 1 )
	   	{
		   document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Enter core products</small>';document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}else if( shop_descrb.length > 0 && state.length > 0 && shopname.length > 0 && email.length > 0 && bus_cat.length > 0 && address.length > 0 && country.length > 0 && city.length > 0 && telephone.length > 0 )
	   	{
			 if(shopname.length > 0 )
			 { 
			$.post("/ajax/shop_create.php",  
				{
					task : "task",
				  	shopname : shopname,
				  	address : address,
				  	shop_descrb : shop_descrb,
				  	bus_cat : bus_cat,
					city : city,
					code : code,
				   	telephone : telephone,
					email : email,
					state : state,
				  	country : country,
				  	bus_type : bus_type,
				   	business_url : business_url,
					core_products : core_products,	
					do1 : do1,	
					do2 : do2,	
					do3 : do3,	
					
					cache: false,
					
				})
				
					.error(
				  
					   function( )
					   {
						  console.log( "Error: " );
					   })
					.success(function(response)
					{
					    
					     $("#shop_create_response").html(response);
						
						 $( '#shopname' ).val("");
						 $( '#email' ).val("");
						 $( '#address' ).val("");
						 $( '#state' ).val("");
						 $( '#shop_descrb' ).val("");
						 $( '#biz_cat' ).val("");
						 $( '#country' ).val("");
						 $( '#biz_city' ).val("");
						 $( '#biz_code').val("");
						 $( '#telephone' ).val("");
						 $( '#core_products' ).val("");
						 $( '#business_url' ).val("");
						 $( '#biz_type' ).val("");
                        console.log(response);
						document.getElementById("report_btn").innerHTML = response;
						document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md"> Done </button>';//window.location.replace("profile.php");
					});
			}
			else
			{
				document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">Reload Page please.</small>';
			}
		}
		else
	  	{
	  		//textarea is empty
	  		document.getElementById("report_btn").innerHTML = ' <small class="text-danger " style="">you missed something</small>';
			document.getElementById("biz_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_business()"> Create </button>';
		}
	
}

function create_service()
{ document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success"><img src="/img/loading.gif"/></button>';  
		 var shopname = $( '#serv_name' ).val(); 
		 var shop_descrb = $( '#serv_descrb' ).val();
		 var address = $( '#serv_address' ).val();
		 var telephone = $( '#serv_telephone' ).val();
		 var email = $( '#serv_email' ).val();
		 var city = $( '#serv_city' ).val();
         var state = $( '#serv_region' ).val();
		 //var category = $( '#category' ).val();
		 var country = $( '#serv_country' ).val();
		 var code = $( '#serv_code' ).val();
		 var business_url = $( '#serv_url' ).val();
		 var core_products = $( '#serv_core_products' ).val();
	     var bus_type = "Service";
	     var bus_cat = $( '#serv_cat' ).val();
	

		if(shopname.length < 1 )
	   	{
		  document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Enter Business name</small>';document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		   $('#serv_name').css('border' , '1px solid #e1e1e1');
			 
		} else if(email.length < 1 )
	   	{
		  document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Enter email</small>';document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		}else if(shop_descrb.length < 1 )
	   	{
		   document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Enter description</small>';document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		}else if(address.length < 1 )
	   	{
		  document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Enter address</small>';document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		}else if(state.length < 1 )
	   	{
		   document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Enter region</small>';document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		}else if(bus_cat.length < 1 )
	   	{
		   document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Enter category</small>';document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		}else if(telephone.length < 1 )
	   	{
		   document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Enter telephone</small>';document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		}else if(city.length < 1 )
	   	{
		   document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Enter City</small>';document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		}else if(core_products.length < 1 )
	   	{
		   document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Enter core products</small>';document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		}else if( shop_descrb.length > 0 && state.length > 0 && shopname.length > 0 && email.length > 0 && bus_cat.length > 0 && address.length > 0 && country.length > 0 && city.length > 0 && telephone.length > 0 )
	   	{
			 if(shopname.length > 0 )
			 { 
			$.post("/ajax/shop_create.php",  
				{
					service_task : "task",
				  	shopname : shopname,
				  	address : address,
				  	shop_descrb : shop_descrb,
				  	bus_cat : bus_cat,
					city : city,
					code : code,
				   	telephone : telephone,
					email : email,
					state : state,
				  	country : country,
				  	bus_type : bus_type,
				   	business_url : business_url,
					core_products : core_products,	
					
					cache: false,
					
				})
				
					.error(
				  
					   function( )
					   {
						  console.log( "Error: " );
					   })
					.success(function(response)
					{
					    
					     $("#shop_create_response").html(response);
						
						 $( '#serv_name' ).val("");
						 $( '#serv_email' ).val("");
						 $( '#serv_address' ).val("");
						 $( '#serv_region' ).val("");
						 $( '#serv_descrb' ).val("");
						 $( '#serv_cat' ).val("");
						 $( '#serv_country' ).val("");
						 $( '#serv_city' ).val("");
						 $( '#serv_code').val("");
						 $( '#serv_telephone' ).val("");
						 $( '#serv_core_products' ).val("");
						 $( '#service_btnurl' ).val("");
						 //$( '#serv_type' ).val("");
                        console.log(response);
						document.getElementById("serv_report_btn").innerHTML = response;
						document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md"> Done </button>';//window.location.replace("profile.php");
					});
			}
			else
			{
				document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">Reload Page please.</small>';
			}
		}
		else
	  	{
	  		//textarea is empty
	  		document.getElementById("serv_report_btn").innerHTML = ' <small class="text-danger " style="">you missed something</small>';
			document.getElementById("serv_btn").innerHTML = '<button class="btn btn-success btn-md" onclick="create_service()"> Create </button>';
		}
	
}