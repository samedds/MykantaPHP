$(document).ready( function(){
	$('#update_bus_btn').click(function(){
	update_bus_btn();
	});
	$('#update_delivery_btn').click(function(){
	update_del_btn();
	});
});

function update_bus_btn()
{
	$('#editprdtover1').removeClass('hide');
	var shopName = $( '#shopName' ).val(); 
		 var shop_descrb = $( '#edte_descrb' ).val();
		 var address = $( '#edt_address' ).val();
		 var telephone = $( '#edt_telephone' ).val();
		 var email = $( '#email_edit' ).val();
		 var city = $( '#edr_city' ).val();
         //var state = $( '#region' ).val();
		 //var category = $( '#category' ).val();
		 //var country = $( '#biz_country' ).val();
		 //var code = $( '#biz_code' ).val();
		 var business_url = $( '#business_url' ).val();
		 var core_products = $( '#edt_products' ).val();
	    var bus_type = $( '#bus_type_set' ).val();
	    var bus_cat = $( '#bus_cat' ).val();
		 var datetime = $( '#datetime' ).val();
		// var dob = $( '#dob' ).val();
		 

	console.log(' '+shop_descrb + ' '+shopName +' '+ telephone +' '+address + ' '+core_products + ' '+email +' '+ city + ' '+business_url);
	
	if( (shop_descrb.length > 0) && (shopName.length > 0) && (city.length > 0) && (address.length > 0) && (email.length > 0))
	{
		$('#shopName, #shop_descrb, #address, #core_products, #email, #city , #business_url').css('border' , '1px solid #CCC');
		document.getElementById("updateprdtAlert").innerHTML = '';
		$.post("/ajax/edit_bus_prc.php",  
		{
			task : "task",
		  	shop_descrb : shop_descrb,
		  	shopName : shopName,
				telephone : telephone,
				address : address,
				core_products : core_products,
				bus_type : bus_type,
				bus_cat : bus_cat,
				city : city,
				email : email,
				business_url : business_url,
			cache: false,
		})
			.error(function( )
			   {
				  console.log( "Error: " );
				  $('#editprdtover1').addClass('hide');
			   })
			.success(function(response)
			{
				$('#editprdtover1').addClass('hide');
				if(response == "Business Info updated")
				{
					$.smallBox({
						title : "Success!",
						content : "Business Info updated",
						color : "#739E73",
						iconSmall : "fa fa-cloud",
						timeout : 1500
					});
			    $("#updateprdtAlert").html("<b class='text-success'>Business updated</b>");
			    //$( '#prdt_name, #prdt_desc, #prdt_man, #prdt_color, #prdt_cond, #min_order' ).val("");
				 	//setTimeout(editpageload,1500);
			  }
				else{
					$.smallBox({
	          title : "Alert",
	          content : "<i class='fa fa-clock-o'></i> <i>Operation Failed<br>"+response+"</i>",
	          color : "#C46A69",
	          iconSmall : "fa fa-times fa-2x fadeInRight animated",
	          timeout : 4000
	       });
				}
			});
	}
	else{
		$('#prdt_name, #prdt_desc, #prdt_man, #prdt_color, #prdt_cond, #min_order').css('border' , '2px solid #ff0000');
		document.getElementById("updateprdtAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Fill all fields</small>';
	}
	
	
}function update_del_btn()
{
	$('#editprdtover1').removeClass('hide');
	 
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
			   var shopName = $( '#shopName' ).val(); 

	console.log(' '+do1 + ' '+do2 +' '+ do3);
	
	if(do1 != 0 || do2 != 0 || do3 != 0)
	{
		document.getElementById("updateprdtAlert").innerHTML = '';
		$.post("/ajax/edit_bus_prc.php",  
		{
			task_dob : "task_dob",
			do1 : do1,	
			do2 : do2,	
			do3 : do3,	
			shopName : shopName,	
			cache: false,
		})
			.error(function( )
			   {
				  console.log( "Error: " );
				  $('#editprdtover1').addClass('hide');
			   })
			.success(function(response)
			{
				$('#editprdtover1').addClass('hide');
				if(response == "Delivery Option updated")
				{
					$.smallBox({
						title : "Success!",
						content : "Business Info updated",
						color : "#739E73",
						iconSmall : "fa fa-cloud",
						timeout : 1500
					});
			    $("#updateprdtAlert").html("<b class='text-success'>Business updated</b>");
			    //$( '#prdt_name, #prdt_desc, #prdt_man, #prdt_color, #prdt_cond, #min_order' ).val("");
				 	//setTimeout(editpageload,1500);
			  }
				else{
					$.smallBox({
	          title : "Alert",
	          content : "<i class='fa fa-clock-o'></i> <i>Operation Failed<br>"+response+"</i>",
	          color : "#C46A69",
	          iconSmall : "fa fa-times fa-2x fadeInRight animated",
	          timeout : 2000
	       });
				}
			});
	}
	else{
		$('#editprdtover1').removeClass('show');
		document.getElementById("updateprdtAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Fill all fields</small>';
	}
}