function qty_change(price,stock,product_id)
{
	if(price == "")
	{
		//alert error
		alert("Price is empty. so can not be bought. Contact business owner.");
	}
	else
	{		
		if( stock.length < 1 )
		{
	      alert("stock is empty, sorry.");
		}
		else
		{
			var qty = Number($( '#qty_cell'+product_id+'' ).val());
			console.log(qty);
			var result = Number(price)  * Number(qty);
			var total_result = Number($( '#total_result_hidden' ).val());
			var hdqty = Number($( '#hdqty'+product_id).val());
			//if stock is increased
			if(qty > hdqty){
				var total = Number(total_result) + Number(price);
			
				//to update the stock in cart
				$.post("/ajax/qty_updt.php",  
		{
			quantity_updt : "quantity_updt",
		  	new_qty : qty,
		  	result : result,
		  	option_id : product_id,
			cache: false
		}).error(function( )
			   {
				 alert( "Error updating " );
				  
			   })
			.success(function()
			{
				$( '#hdqty'+product_id ).val(qty);
			   document.getElementById('total_cell'+product_id+'').innerHTML ='GHS '+result;
				document.getElementById('total_result').innerHTML ='GHS '+total;
				
				console.log(price+"-"+result+"-"+qty+"-"+hdqty+"-"+total+"-"+total_result);

			$( '#total_result_hidden' ).val(total);
				$( '#total_cost_hidden' ).val(total);
			//alert( result+' ----- '  );

			//Window.response();
			location.reload();
			});
			}
			else if(qty < hdqty){
				
				//console.log(qty+"-"+hdqty+"-"+total);
				
				//reducing the stock in cart
				$.post("/ajax/qty_updt.php",  
		{
			task_red : "task_red",
		  	new_qty : qty,
		  	option_id : product_id,
		  	result : result,
			cache: false,
		}).error(function( )
			   {
				// console.log( "Error: " );
				  
			   })
			.success(function()
			{
				var total = total_result.valueOf() - Number(price);
				$( '#hdqty'+product_id ).val(qty);
			   document.getElementById('total_cell'+product_id+'').innerHTML ='GHS '+result;
				document.getElementById('total_result').innerHTML ='GHS '+total;
				
			$( '#total_result_hidden' ).val(total);
				$( '#total_cost_hidden' ).val(total);
		//	console.log( result+' ----- '+response  );
			//reload page
				location.reload();
			});
			}		
		}
	}
}
function delivery_choice1(shop_id)
{ 
	var total_result = Number($( '#final_cost_fig'+shop_id ).val());
$( '#mini_st'+shop_id+'').show();
	$( '#delivery_cost'+shop_id+'').hide();
	$( '#dev2_info'+shop_id+'' ).hide();
	$( '#time_info'+shop_id+'' ).fadeIn("show");
     $( '#courier_ser'+shop_id+'' ).hide();
	 $( '#delivery_cost'+shop_id+'').hide();
	  var choice = $( '#radio1'+shop_id ).val();
	 	 var option = 'option2';
	 var final_cost = total_result ;
	document.getElementById('final_cost'+shop_id+'').innerHTML =' '+total_result;
	//update delivery 		
		delivery_post(shop_id,choice,option);
}
function delivery_choice2(shop_id)
{	 
	var total_result = Number($( '#final_cost_fig'+shop_id ).val());
$( '#mini_st'+shop_id+'').show();
$( '#delivery_cost'+shop_id+'').show();
$( '#time_info'+shop_id+'' ).hide();
$( '#dev2_info'+shop_id+'' ).fadeIn("show");
$( '#courier_ser'+shop_id+'' ).hide();
 var choice = $( '#radio2'+shop_id ).val();
	 	 var option = 'option1';
document.getElementById('delivery_cost'+shop_id+'').innerHTML = '<p>GHs 0.00<br>Delivery will be made by the business owner.</p>';
var final_cost = total_result ;
	document.getElementById('final_cost'+shop_id+'').innerHTML =' '+total_result;
//update delivery 		
		delivery_post(shop_id,choice,option);
}
function delivery_post(shop_id,choice,option)
{
$.post("/ajax/delivery_updt.php",  
		{
			"delivery_update": 'delivery_update',"choice":choice, "option":option, "shop_id": shop_id,
		  	cache: false})
			.error(function(){alert(response);});	
}
function delivery_type_post(shop_id,choice)
{
$.post("/ajax/delivery_updt.php",  
		{
			"delivery_type": 'delivery_type',"choice":choice, "shop_id": shop_id,
		  	cache: false})
			.error(function(){alert(response);});	
}
function delivery_choice3(shop_id)
{ 
$( '#delivery_cost'+shop_id+'').show();
$( '#mini_st'+shop_id+'').show();
$( '#dev2_info'+shop_id+'' ).hide();
$( '#time_info'+shop_id+'' ).hide();
 $( '#courier_ser'+shop_id+'' ).show();
	 var del_hd = Number($( '#del_hd'+shop_id ).val());
	 var address = $( '#address-line1' ).val();
	 var choice = $( '#radio3'+shop_id ).val();
	 var option = 'option5';
	
	 var city = $( '#city_bill' ).val();
	 var country = $( '#country_bill' ).val();
		var total_result = Number($( '#final_cost_fig'+shop_id ).val());
	 //var total_result =  result + 45;
	 delivery_post(shop_id,choice,option);
	 console.log(total_result);	
	if(del_hd != 0)
	{
	
	document.getElementById('delivery_cost'+shop_id+'').innerHTML ='Delivery by APK GHS 45';
	document.getElementById('courier_ser'+shop_id+'').innerHTML ='Delivery to you at your door step <br><a onclick="check_out_next();"class="" value="">Edit Address</a><br><label class="radio" onchange="courier_ser1('+shop_id+')"><input id="radioc1'+shop_id+'"  name="radioc'+shop_id+'" checked="" type="radio"><i></i><p class="text-info" style="font-size: 15px;"  ><img style="height:40px;" src="/img/ghpost.jpg"/></p></label><input type="hidden" id="del_hd'+shop_id+'" value="45" />	<label class="radio" onchange="courier_ser2('+shop_id+')"><input name="radioc'+shop_id+'" id="radioc2'+shop_id+'" checked="" type="radio"><i></i><p class="text-info" style="font-size: 15px;"  > <img style="height:40px;" src="/img/dhl.png"/></p></label>	<label class="radio" onchange="courier_ser3('+shop_id+')"><input name="radioc'+shop_id+'" id="radioc3'+shop_id+'" checked="" type="radio"><i></i><p class="text-info" style="font-size: 15px;"  > <img style="height:40px;" src="/img/apklogo.jpg"/></p></label>';
	var final_cost = total_result + 45;
	document.getElementById('final_cost'+shop_id+'').innerHTML =' '+final_cost;
	}
else
{	var amount = total_result - del_hd + 45 ;
	$( '#del_hd'+shop_id+'' ).val(45);
	document.getElementById('total_cost').innerHTML = amount;
	 var final_cost = total_result + 45;
	document.getElementById('final_cost'+shop_id+'').innerHTML =' '+final_cost;
	}
}
function courier_ser1(shop_id)
{
	if(shop_id == "")
	{
		alert("Error");
	}
	else
	{
    
		var total_result = Number($( '#final_cost_fig'+shop_id ).val());
	var del_hd = Number($( '#del_hd'+shop_id+'' ).val());
	var amount = total_result - del_hd + 35 ;
    var final_cost = total_result + 35;
	var choice = "cour1"; 
	delivery_type_post(shop_id,choice);
	document.getElementById('final_cost'+shop_id+'').innerHTML =' '+final_cost;
  
	if(del_hd == 0)
	{
	
	//$( '#total_cost_hidden' ).val(amount);
	$( '#del_hd'+shop_id+'' ).val(35);
	document.getElementById('delivery_cost'+shop_id+'').innerHTML ='Delivery by GhanaPost GHS 35';
	document.getElementById('total_cost').innerHTML = amount;
	}
	else if(del_hd != 0)
	{

	//$( '#total_cost_hidden' ).val(amount);
	$( '#del_hd'+shop_id+'' ).val(35);
	document.getElementById('delivery_cost'+shop_id+'').innerHTML ='Delivery by GhanaPost GHS 35';
	document.getElementById('total_cost').innerHTML = amount;
	}
	// console.log(del_hd+"-"+amount);
	}
}
function courier_ser2(shop_id)
{
	if(shop_id == "")
	{
		alert("Error");
	}
	else
	{		
	var total_result = Number($( '#final_cost_fig'+shop_id ).val());
	 var final_cost = total_result + 25;
	document.getElementById('final_cost'+shop_id+'').innerHTML =' '+final_cost;
	var del_hd = Number($( '#del_hd'+shop_id+'' ).val());
	var choice = "cour2"; 
	delivery_type_post(shop_id,choice);
	if(del_hd == 0)
	{
	var amount = total_result - del_hd + 25 ;
	//$( '#total_cost_hidden' ).val(amount);
	$( '#del_hd'+shop_id+'' ).val(25);
	document.getElementById('delivery_cost'+shop_id+'').innerHTML ='Delivery by DHL GHS 25';
	document.getElementById('total_cost').innerHTML = amount;
	}
	else if(del_hd != 0)
	{
	var amount = total_result - del_hd + 25;
	//$( '#total_cost_hidden' ).val(amount);
	$( '#del_hd'+shop_id+'' ).val(25);
	document.getElementById('delivery_cost'+shop_id+'').innerHTML ='Delivery by DHL GHS 25';
	document.getElementById('total_cost').innerHTML = amount;
	}
	//console.log(del_hd+"-"+amount);
	}
}
function courier_ser3(shop_id)
{
	if(shop_id == "")
	{
		alert("Error");
	}
	else
	{		
	var choice = "cour3"; 
	delivery_type_post(shop_id,choice);
	var total_result = Number($( '#final_cost_fig'+shop_id ).val());
	 var final_cost = total_result + 45;
	document.getElementById('final_cost'+shop_id+'').innerHTML =' '+final_cost;
	var del_hd = Number($( '#del_hd'+shop_id+'' ).val());
	if(del_hd == 0)
	{
	var amount = total_result - del_hd + 45 ;
//	$( '#total_cost_hidden' ).val(amount);
	$( '#del_hd'+shop_id+'' ).val(45);
	document.getElementById('delivery_cost'+shop_id+'').innerHTML ='Delivery by APK: GHS 45';
	document.getElementById('total_cost').innerHTML = amount;
	}
	else if(del_hd != 0)
	{
	var amount = total_result - del_hd + 45;
//	$( '#total_cost_hidden' ).val(amount);
	$( '#del_hd'+shop_id+'' ).val(45);
	document.getElementById('delivery_cost'+shop_id+'').innerHTML ='Delivery by APK: GHS 45';
	document.getElementById('total_cost').innerHTML = amount;
	}
	//console.log(del_hd+"-"+amount+"-"+total_result);
	}
}
function payment_choice()
{
$( '#mobile_money' ).show();
$( '#bank_deposit' ).hide();
}
function payment_choice2()
{
$( '#mobile_money' ).hide();
$( '#bank_deposit' ).show();
}
function check_out_next()
{
$( '#box_check_1' ).hide();
$( '#box_check_2' ).fadeIn("slow");
$( '#box_check_3' ).hide();
$( '#cart_btn' ).fadeIn("slow");
//$( '#place_order' ).hide();
$( '#check_out_btn' ).hide();
$( '#save_deliver_btn' ).fadeIn("slow");
$( '#mail_invoice' ).hide();
$( '#billing_info' ).hide();
}

function save_billing_info()
{
	var firstname = $( '#firstname' ).val();
	var lastname = $( '#lastname' ).val();
	var telephone = $( '#telephone_bill' ).val();
	//var postalcode = $( '#postalcode' ).val();
	var postalcode = 'NULL';
	var addressline1 = $( '#address-line1' ).val();
	var addressline2 = 'NULL';
	//var addressline2 = $( '#address-line2' ).val();
	var city = $( '#city_bill' ).val();
	var region = $( '#region_bill' ).val();
	var country = $('#country_bill').val();
	var bill_email = $('#bill_email').val();
	
		if(firstname.length < 1 )
	   	{
		   document.getElementById("bill_info_box").innerHTML = ' <small>Enter First name type</small>';
		    $('#firstname').css('border' , '1px solid #ff0000');
		}else if(lastname.length < 1 )
	   	{
			$('#firstname').css('border' , '1px solid #ccc');
			document.getElementById("bill_info_box").innerHTML = ' <small>Enter Last name</small>';
			$('#lastname').css('border' , '1px solid #ff0000');
		}else if(telephone.length < 1 )
	   	{
			$('#lastname').css('border' , '1px solid #ccc');
			document.getElementById("bill_info_box").innerHTML = ' <small>Enter Telephone</small>';
			$('#telephone_bill').css('border' , '1px solid #ff0000');
		}else if(bill_email.length < 1 )
	   	{
			$('#telephone_bill').css('border' , '1px solid #ccc');
			document.getElementById("bill_info_box").innerHTML = ' <small>Enter email</small>';
			$('#bill_email').css('border' , '1px solid #ff0000');
		}else if(addressline1.length < 1 )
	   	{
			$('#bill_email').css('border' , '1px solid #ccc');
			document.getElementById("bill_info_box").innerHTML = ' <small>Enter Address Location</small>';
			$('#address-line1').css('border' , '1px solid #ff0000');
		}else if(addressline2.length < 1 )
	   	{
			$('#address-line1').css('border' , '1px solid #ccc');
			document.getElementById("bill_info_box").innerHTML = ' <small>Enter Street address or Landmark</small>';
			$('#address-line2').css('border' , '1px solid #ff0000');
		}else if(city.length < 1 )
	   	{
			$('#address-line2').css('border' , '1px solid #ccc');
			document.getElementById("bill_info_box").innerHTML = ' <small>Enter City</small>';
			$('#city_bill').css('border' , '1px solid #ff0000');
		}else if(region.length < 1 )
	   	{
			$('#city_bill').css('border' , '1px solid #ccc');
			document.getElementById("bill_info_box").innerHTML = ' <small>Enter Region</small>';
			$('#region_bill').css('border' , '1px solid #ff0000');
		}else if(country.length < 1 )
	   	{
			$('#region_bill').css('border' , '1px solid #ccc');
			document.getElementById("bill_info_box").innerHTML = ' <small>Enter Country</small>';
			$('#country_bill').css('border' , '1px solid #ff0000');
		}
		else if( firstname.length > 0 && lastname.length > 0 && telephone.length > 0 && region.length > 0 && addressline1.length > 0 && addressline2.length > 0 && country.length > 0 && city.length > 0 && bill_email.length > 0 )
	   	{
		
		$.post("/ajax/billing_info_vis.php",  
		{
			task : "b_task",
		  	firstname: firstname,
		  	lastname: lastname,
		  	telephone: telephone,
		  	bill_email: bill_email,
		  	postalcode: postalcode,
		  	addressline1: addressline1,
		  	addressline2: addressline2,
		  	city: city,
		  	region: region,
		  	country: country,
		  	cache: false,
		}).error(function( )
			   {
			   $.smallBox({
	          title : "Alert",
	          content : "<i class='fa fa-clock-o'></i> <i>Operation Failed,check connection</i>",
	          color : "#C46A69",
	          iconSmall : "fa fa-times fa-2x fadeInRight animated",
	          timeout : 2000
	       });
		   $( '#check_out_btn' ).click()
				 })
			.success(function(response)
			{
				
				$.smallBox({
						title : "Success!",
						content : 'Billing Info. Updated',
						color : "#739E73",
						iconSmall : "fa fa-cloud",
						timeout : 1500
					});
				$( '#box_check_2' ).hide();
				$( '#box_check_3' ).fadeIn("slow");
			 	$( '#cart_btn' ).fadeIn("slow");
				//$( '#place_order' ).hide()
				$( '#check_out_btn' ).hide();
				$( '#save_deliver_btn' ).hide();
				$( '#mail_invoice' ).hide();
				//$( '#billing_info' ).fadeIn("slow")
});



}
}
function voucher(shop_id)
{
 	$( '#vodafone_voucher_code'+shop_id+'' ).fadeIn("slow");
	console.log($( '#vodafone_voucher_code'+shop_id+'' ).val());
}

function check_out_order(shop_id)
{
document.getElementById('place_order'+shop_id+'').innerHTML = ' <div class="center"><img src="/img/loading.gif"/></div>'; 
var customer_number = $( '#phone_number'+shop_id+'' ).val(); 

if(customer_number.length == 10)
{
 var customer_number = $( '#phone_number'+shop_id+'' ).val(); 
 


//var amount_to_pay = $( '#amount'+shop_id+'' ).val(); 
var amount =  $( '#final_cost_fig'+shop_id).val();

if(document.getElementById('mobile_code1'+shop_id+'').checked )
{
	var mobile_code = $( '#mobile_code1'+shop_id+'' ).val(); 
	var vodafone_voucher_code = "0";
}else
	if(document.getElementById('mobile_code2'+shop_id+'').checked )
{
	var mobile_code = $( '#mobile_code2'+shop_id+'' ).val(); 
	var vodafone_voucher_code = "0";
}else
	if(document.getElementById('mobile_code3'+shop_id+'').checked )
{
	var mobile_code = $( '#mobile_code3'+shop_id+'' ).val(); 
	var vodafone_voucher_code = "0";
}else
	if(document.getElementById('mobile_code4'+shop_id+'').checked )
{
	var mobile_code = $( '#mobile_code4'+shop_id+'' ).val(); 
	var vodafone_voucher_code =  $( '#vodafone_voucher_code'+shop_id).val();
}

console.log(mobile_code+' '+amount+' '+customer_number+' '+vodafone_voucher_code);


//first payment process using pick up 
if(document.getElementById('radio1'+shop_id+'').checked )
{
	//pipck up process
var pickup_date = $( '#pickup_date'+shop_id+'' ).val(); 
var time_date = $( '#time'+shop_id+'' ).val(); 


              //sending data to db after payment is succeesful
if(pickup_date.length > 1 && time_date.length > 1 )
{	
 var transaction_id= "bb875bf44558753";
 var network_code= mobile_code;
  

		$.post("/api/rest.php", 
		 {
             'customer_number':customer_number,
			 'amount':amount,
			 'transaction_id':transaction_id,
			 'network_code':network_code,
			 'vodafone_voucher_code':vodafone_voucher_code,
			  cache: false,
		 }).error( function (data) {
              
			 document.getElementById('place_order'+shop_id+'').innerHTML = '<em class=" pull-left text-danger">Connection Error!</em><button type="submit" id="place_order_btn'+shop_id+'" style="width:130px;" onclick="check_out_order('+shop_id+')" class="btn btn-success pull-right" value="">Order</button>'; 
			
             }).success( function (data_raw, status, jqXHR) {
				 var data_code = data_raw;
				 console.log("status "+status);
				
								$.post("/ajax/place_order_cart_list_vis.php",  
									{
									place_order : "task",
									shop_id: shop_id,
									cache: false
									}).error(function( )
									   {
										alert('Check your connection and try again');
									   })
									.success(function(response)
									{
										//sending mail
										$.post("/ajax/place_order_vis.php",  
											{
											place_order : "task",
											shop_id: shop_id,
											cart_list: response,
											pickup_date: pickup_date,
											data_raw:data_raw,
											time_date: time_date,
											cache: false
											
											}).error(function(data)
											   {
											 console.log(data);
												//alert('fail' + status.code);
												document.getElementById('place_order'+shop_id+'').innerHTML =  ' <em class=" pull-left text-danger">Transaction Error!</em><button type="submit" id="place_order_btn'+shop_id+'" style="width:130px;" onclick="check_out_order('+shop_id+')" class="btn btn-success pull-right" value="">Order</button>'; 
											 //settTimeout Here 
											 setInterval(re_check,50000);
											   })
											.success(function(data)
											{
											// document.getElementById('place_holder_box'+shop_id+'').innerHTML = response+'<h4 class="text-success strong" align="center"> Successful, thank you for your order. </h4><p class="text-success strong" align="center"> Your order information has been sent to your email, please confirm the order in the mail sent to you.</p><p class="text-info strong" align="center">  Your Order Code is added to mail.</p></p>'; 
											 document.getElementById('place_order'+shop_id+'').innerHTML = ' <h4 class="text-success strong" align="center"><img width="100px" src="img/loading.gif"/><br> Waiting for confirmaion, <br>You will recieve a SMS to confirm the transaction, pleae Check your phone message and confirm the transaction. </h4><p class="text-danger strong" align="center"> Message will expire in 5 minutes.</p>'; 
											 
//settTimeout Here 
var intervalId = null;
var varCounter = 0;
var re_check = function(){
if(varCounter <= 35) {
  varCounter++;
		  $.post("/ajax/place_order_vis.php",  
				{
				re_place_order : "task",
				shop_id: shop_id,
				data_raw:data_code,
				cache: false
				}).error(function( )
				{
					alert('Check your connection and try again');
				})
				.success(function(response1)
				{
					//console.log('data => '+ response);
					if(response1 == 'true')
					{
						//alert('Completed PAID!');
					 document.getElementById(''+shop_id+'').innerHTML = '<h4 class="text-success strong" align="center"><img width="100px" src="img/gcheck.png"/><br> Transaction Completed!<br>Your Reciept was sent to your email. </h4>';

					 $( '#paymentbox'+shop_id+'').fadeOut(); 	
					 //alert('Completed PAID!');
					// document.getElementById(''+shop_id+'').innerHTML = response; 
					} else if(response1 == 'false')
					{
						//alert('not yet paid '+response);
					 document.getElementById('place_order'+shop_id+'').innerHTML = '<h4 class="text-success strong" align="center"><img width="50px" src="img/loading.gif"/><br> Waiting for confirmaion, <br>You will be sent a SMS to confirm the transaction, pleae Check your phone message and confirm the transaction. </h4><p class="text-danger strong" align="center"> Message will expire in 4 minutes.</p>'; 
					}
					
		});	
} else {
  clearInterval(intervalId);
}
};
setInterval(re_check,10000);
											 
								
										}); 
									});

		});
									
}
else
{
$( '#pickup_date'+shop_id+'' ).css('border','1px solid #ff0000');
$( '#radio1'+shop_id+'' ).click();
 document.getElementById('place_order'+shop_id+'').innerHTML = '<em class=" pull-left text-danger">Enter the Pick up Date.</em><button style="width:130px;" onclick="check_out_order('+shop_id+')" type="submit" id="place_order_btn'+shop_id+'" class="btn btn-success pull-right" value="">Order</button>';
}
}
else
 if(document.getElementById('radio2'+shop_id+'').checked)
{

 var transaction_id= "X13454";
 var network_code= mobile_code;

 //$('#place_order_btn'+shop_id+'').submit(function(e){
   //     e.preventDefault();
$.post("/api/rest.php",  
{
 'customer_number':customer_number,
 'amount':amount,
 'transaction_id':transaction_id,
 'network_code':network_code,
 'vodafone_voucher_code':vodafone_voucher_code,
	cache: false,
}).error(function(data )
   {
	 document.getElementById('place_order'+shop_id+'').innerHTML = '<em class=" pull-left text-danger">Connection Error!</em><button type="submit" id="place_order_btn'+shop_id+'" style="width:130px;" onclick="check_out_order('+shop_id+')" class="btn btn-success pull-right" value="">Order</button>'; 
   })

.success( function (data_raw, status, jqXHR) {
console.log("data "+data_raw);
var data_code = data_raw;
console.log("status "+status);
// console.log("jq "+jqXHR);
	$.post("/ajax/place_order_cart_list_vis.php",  
		{
		place_order : "task",
		shop_id: shop_id,
		cache: false
		}).error(function( )
		   {
			alert('Check your connection and try again');
		   })
		.success(function(response)
{
//sending mail
$.post("/ajax/place_order_vis.php",  
	{
	place_order : "task",
	shop_id: shop_id,
	cart_list: response,
	pickup_date: pickup_date,
	data_raw:data_raw,
	time_date: time_date,
	cache: false
	
	}).error(function(data)
	   {
	 console.log(data);
		//alert('fail' + status.code);
		document.getElementById('place_order'+shop_id+'').innerHTML =  ' <em class=" pull-left text-danger">Transaction Error!</em><button type="submit" id="place_order_btn'+shop_id+'" style="width:130px;" onclick="check_out_order('+shop_id+')" class="btn btn-success pull-right" value="">Order</button>'; 
	 //settTimeout Here 
	 setInterval(re_check,50000);
	   })
	.success(function(data)
	{
	// document.getElementById('place_holder_box'+shop_id+'').innerHTML = response+'<h4 class="text-success strong" align="center"> Successful, thank you for your order. </h4><p class="text-success strong" align="center"> Your order information has been sent to your email, please confirm the order in the mail sent to you.</p><p class="text-info strong" align="center">  Your Order Code is added to mail.</p></p>'; 
	 document.getElementById('place_order'+shop_id+'').innerHTML = ' <h4 class="text-success strong" align="center"><img width="100px" src="img/loading.gif"/><br> Waiting for confirmaion, <br>You will recieve a SMS to confirm the transaction, pleae Check your phone message and confirm the transaction. </h4><p class="text-danger strong" align="center"> Message will expire in 5 minutes.</p>'; 
	 
	 //settTimeout Here 
	 var intervalId = null;
	var varCounter = 0;
	var re_check = function(){
		 if(varCounter <= 35) {
			  varCounter++;
$.post("/ajax/place_order_vis.php",  
{
re_place_order : "task",
shop_id: shop_id,
data_raw:data_code,
cache: false
}).error(function( )
{
	alert('Check your connection and try again');
})
.success(function(response1)
{
	//console.log('data => '+ response);
	if(response1 == 'true')
	{
		//alert('Completed PAID!');
	 document.getElementById(''+shop_id+'').innerHTML = '<h4 class="text-success strong" align="center"><img width="100px" src="img/gcheck.png"/><br> Transaction Completed!<br>Your Reciept was sent to your email. </h4>';

	 $( '#paymentbox'+shop_id+'').fadeOut(); 	
	 //alert('Completed PAID!');
	// document.getElementById(''+shop_id+'').innerHTML = response; 
	} else if(response1 == 'false')
	{
		//alert('not yet paid '+response);
	 document.getElementById('place_order'+shop_id+'').innerHTML = '<h4 class="text-success strong" align="center"><img width="50px" src="img/loading.gif"/><br> Waiting for confirmaion, <br>You will be sent a SMS to confirm the transaction, pleae Check your phone message and confirm the transaction. </h4><p class="text-danger strong" align="center"> Message will expire in 5 minutes.</p>'; 
	}
	
});	
		 } else {
			  clearInterval(intervalId);
		 }
	};
	 setInterval(re_check,10000);
	 

}); 
});
				

});		   
	/*	.success(function(response)
		{
			   alert(response);  
			//alert('fail' + status.code);
			$.post("/ajax/place_order_cart_list_vis.php", 
			{
				place_order : "task",
				shop_id: shop_id,
				cache: false,
			}).error(function( )
		   {
			 document.getElementById('place_order'+shop_id+'').innerHTML = '<em class=" pull-left text-danger">Check your Connection!</em><button style="width:130px;" type="submit" id="place_order_btn'+shop_id+'" onclick="check_out_order('+shop_id+')" class="btn btn-success pull-right" value="">Order</button>'; 
		   })
			.success(function(response)
			{
			 //sending mail
				$.post("/ajax/place_order_vis.php",  
					{
					place_order : "task",
					shop_id: shop_id,
					cart_list: response,
					pickup_date: pickup_date,
					time_date: time_date,
					cache: false,
					}).error(function( )
					   {
						document.getElementById('place_order'+shop_id+'').innerHTML = '<em class=" pull-left text-danger">Check your Connection!</em><button style="width:130px;" type="submit" id="place_order_btn'+shop_id+'" onclick="check_out_order('+shop_id+')" class="btn btn-success pull-right" value="">Order</button>'; 
					   })
					.success(function(response)
					{
					// document.getElementById('place_holder_box'+shop_id+'').innerHTML = response+'<h4 class="text-success strong" align="center"> Successful, thank you for your order. </h4><p class="text-success strong" align="center"> Your order information has been sent to your email, please confirm the order in the mail sent to you.</p><p class="text-info strong" align="center">  Your Order Code is added to mail.</p></p>'; 
					document.getElementById('place_order'+shop_id+'').innerHTML = response+'<h4 class="text-success strong" align="center"> Waiting for confirmaion, <br>You will be sent a SMS to confirm the transaction, pleae Check your phone message and confirm the transaction. </h4><p class="text-danger strong" align="center"> Message will expire in 5 minutes.</p>'; 
				}); 
			}); 
		});*/
		
}
else
 if(document.getElementById('radio3'+shop_id+'').checked || document.getElementById('radioc1'+shop_id+'').checked || document.getElementById('radioc2'+shop_id+'').checked || document.getElementById('radioc3'+shop_id+'').checked  )
{

 var transaction_id= "X13454";
 var network_code= mobile_code;
 
   $.ajax({
             type: "POST",
             url: "/api/rest.php",
             data: JSON.stringify({
									'customer_number':customer_number,
									'amount':amount,
									'transaction_id':transaction_id,
									'network_code':network_code,
									'vodafone_voucher_code':vodafone_voucher_code,
					
									}),
             contentType: "application/json; charset=utf-8",
             crossDomain: true,
             dataType: "json",
			error: function (jqXHR, status)  {
				console.log(jqXHR);
              document.getElementById('place_order'+shop_id+'').innerHTML = '<em class=" pull-left text-danger">Check your Connection!</em><button style="width:130px;" onclick="check_out_order('+shop_id+')" type="submit" id="place_order_btn'+shop_id+'" class="btn btn-success pull-right" value="">Order</button>'; 
             },
             success: function (data, status, jqXHR)  
           {
               alert(success);  
				//alert('fail' + status.code);
				$.post("/ajax/place_order_cart_list_vis.php", 
		{
			place_order : "task",
			shop_id: shop_id,
		  	cache: false,
		}).error(function( )
			   {
				 document.getElementById('place_order'+shop_id+'').innerHTML = '<em class=" pull-left text-danger">Check your Connection!</em><button style="width:130px;" onclick="check_out_order('+shop_id+')" type="submit" id="place_order_btn'+shop_id+'" class="btn btn-success pull-right" value="">Order</button>'; 
			   })
			.success(function(response)
			{
			 //sending mail
				$.post("/ajax/place_order_vis.php",  
					{
					place_order : "task",
					shop_id: shop_id,
					cart_list: response,
					pickup_date: pickup_date,
					time_date: time_date,
					cache: false,
					}).error(function( )
					   {
						document.getElementById('place_order'+shop_id+'').innerHTML = '<em class=" pull-left text-danger">Netwrok Error!</em><button style="width:130px;" onclick="check_out_order('+shop_id+')" type="submit" id="place_order_btn'+shop_id+'" class="btn btn-success pull-right" value="">Order</button>'; 
					   })
					.success(function(response)
					{
					// document.getElementById('place_holder_box'+shop_id+'').innerHTML = response+'<h4 class="text-success strong" align="center"> Successful, thank you for your order. </h4><p class="text-success strong" align="center"> Your order information has been sent to your email, please confirm the order in the mail sent to you.</p><p class="text-info strong" align="center">  Your Order Code is added to mail.</p></p>'; 
					document.getElementById('place_order'+shop_id+'').innerHTML = '<h4 class="text-success strong" align="center"> Waiting for confirmaion, <br>You will be sent a SMS to confirm the transaction, pleae Check your phone message and confirm the transaction. </h4><p class="text-danger strong" align="center"> Message will expire in 5 minutes.</p>'; 

					//checking if pament is done
					//setTimeout(check_DB_pay(response,shop_id),5000);					
				}); 
			});
             }
          });
}
 else 
 {
	 alert('Please choose one of the delivery Option');
document.getElementById('place_order'+shop_id+'').innerHTML = '<button  onclick="check_out_order('+shop_id+')" class="btn btn-block btn-success pull-right btn-md btn-sm btn-xs" value="">Order</button>'; 
$('#radio1'+shop_id+'').css('border' , '1px solid red');
$('#radio2'+shop_id+'').css('border' , '1px solid red');
$('#radio3'+shop_id+'').css('border' , '1px solid red');
}
}
else
{
	document.getElementById('place_order'+shop_id+'').innerHTML =  ' <em class=" pull-left text-danger">You typed a wrong number. Add "0" to the number abd make sure it is 10 digits.</em><button type="submit" id="place_order_btn'+shop_id+'" style="width:130px;" onclick="check_out_order('+shop_id+')" class="btn btn-success pull-right" value="">Order</button>';  
}
$( '#check_out_btn' ).hide();

}

function cart_btn()
{
$( '#box_check_1' ).fadeIn("slow");
$( '#box_check_2' ).hide();
$( '#box_check_3' ).hide();
$( '#cart_btn' ).fadeIn("slow");
//$( '#place_order' ).hide()
$( '#check_out_btn' ).fadeIn("slow");
$( '#mail_invoice' ).fadeIn("slow");
$( '#save_deliver_btn' ).hide();
$( '#billing_info' ).hide();
}
function addData(shop_id)
{

 var customer_number= "0507712727";
 var amount= "10.0";
 var transaction_id= "X13454";
 var network_code= "VOD";
 var callback_url= "https://www.mykanta.com/callback?transaction_id=bbbf44553&status=SUCCESS&message=MESSAGE";
 var description= "payment for item";
 var client_id= "5";
 
   $.ajax({
             type: "POST",
             url: "https://korbaxchange.herokuapp.com/api/v1.0/collect/",
             data: JSON.stringify({
									'customer_number':customer_number,
									'amount':amount,
									'transaction_id':transaction_id,
									'network_code':network_code,
									'callback_url':callback_url,	
									'description':description, 
									'client_id':client_id
									}),
             contentType: "application/json; charset=utf-8",
             crossDomain: true,
             dataType: "json",
             success: function (data, status, jqXHR) {

                 alert(success);
             },

             error: function (jqXHR, status) {
                 // error handler
                 console.log(jqXHR);
                 //alert('fail' + status.code);
			 document.getElementById('place_order'+shop_id+'').innerHTML = '<em class=" pull-left text-danger">Netwrok Error!</em><button style="width:130px;" type="submit" id="place_order_btn'+shop_id+'" onclick="check_out_order('+shop_id+')" class="btn btn-success pull-right" value="">Order</button>'; 
				return 'success';
             }
          });
 }

function verify_function(shop_id)
{
var security_key = $('#verify_input').val();
//var network = $('#network').val();
var phone_number = $('#phone_number').val();
//var amount = $('#pakage').val();
//var phone_number_confirm = $('#phone_number_confirm').val();

//var verify_body = $('#verify_body').val();

if (security_key.length > 4 && phone_number.length > 4 )
{
	$('#verify_input').css('border' , '2px solid green');
 $('#phone_number').css('border' , '2px solid green'); 
			 
$.post( "/ajax/settings_shop.php " ,
			   {
			   security_key_task : "verify_insert",
			   security_key : security_key,
			   shop_id : shop_id,
			   phone_number : phone_number,
			   cache: false,
			   }
			  )
			  .error( function( response )
				 {
			     $('#verify_body').css('border' , '10px solid #ff0000');
				})
			 .success(function( response )
			   {
		   $('#verify_button').val();
document.getElementById("agentbox").innerHTML = ' <label for="pakage3 padding-10" style="width:30%;"> <img src="/img/products_images/mini/1601546150-1261-1y.jpg"  style="width:auto; height:auto; position:relative;" alt=" 1 year verification" title=" 1 year verification">				  <h4 style="font-size:1.5em;">1 Year  </h4> 				 <span style="font-size:1.5em;">60.00 Cedis </span>				     <button type="button" style="margin-right:5px;" onclick="add_verif_cart(1)" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-shopping-cart"></i> Add to Cart </button>		      </label> 				 <label for="pakage3 padding-10"  style="width:30%;">    <img src="/img/products_images/mini/1601546869-1261-2y.jpg"  style="width:auto; height:auto; position:relative;" alt=" 1 year verification" title=" 1 year verification"><br>	  <h4 style="font-size:1.5em;">2 Year  </h4>  <span style="font-size:1.5em;">102.00 Cedis </span><button type="button" style="margin-right:5px;" onclick="add_verif_cart(2)" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-shopping-cart"></i> Add to Cart </button>      </label> 		<label for="pakage3 padding-10"  style="width:30%;"> 	    <img src="/img/products_images/mini/1601547006-1261-3y.jpg"  style="width:auto; height:auto; position:relative;" alt=" 1 year verification" title=" 1 year verification"><br>		  <h4 style="font-size:1.5em;">3 Year  </h4> <span style="font-size:1.5em;">135.00 Cedis </span>		  <button type="button" style="margin-right:5px;" onclick="add_verif_cart(3)" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-shopping-cart"></i> Add to Cart </button>  </label> '; 
						
		 
			   });  

 }
else
{ $('#phone_number_confirm').css('border' , '5px solid #ff0000'); 
 $('#phone_number').css('border' , '5px solid #ff0000'); 
}
}