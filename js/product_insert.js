$(document).ready( function () {


 $('#add_product_btn').click(function () { add_product_btn_click(); });
 $('#add_product_btn_ed').click(function () { add_product_btn_edclick(); });
 $('#add_product_btn_ex').click(function () { add_product_btn_exclick(); });
 $('#saveoptionbtn').click(function() { saveoptionbtn_click();});
 $('#update_product_btn').click(function (){update_product_btn_click();});

 $('#saveeditoptionbtn').click(function () {
 saveeditoptionbtn_click();
 } );
} );

function addpageload(product_id)
{
var thisShopName = $('#shopName').val();
  var product_id = $('#product_id').val();
  var product_nameformat = $('#product_nameformat').val();
  alert('you just Added : '+product_nameformat);
  window.location.href = "/user/add-product/" + thisShopName ;
} 
function editpageload(product_id)
{
  var thisShopName = $('#shopName').val();
  //var page = $('#page').val();
  var product_id = $('#product_id').val();
  var product_nameformat = $('#product_nameformat').val();
  alert('you just Edited : '+product_nameformat);
  window.location.href = "/edit-product/" + thisShopName + "/" + product_id + "/" + product_nameformat;
} 
function exitpageload(product_id)
{
  var thisShopName = $('#shopName').val();

  var product_id = $('#product_id').val();
  var product_nameformat = $('#product_nameformat').val();
  window.location.href = "/business-link/" + thisShopName ;
} 

function add_product_btn_click()
{
 	var shop_id = $( '#shop_id' ).val();
 	var shopName = $( '#shopName' ).val();
	var prdt_name = $( '#prdt_name' ).val();
	var prdt_desc = $( '#prdt_desc' ).code();
	var prdt_option = $( '#prdt_option' ).val();
	var price = $( '#price' ).val();
	var prdt_man = $('#prdt_man').val();
	var prdt_color = $('#prdt_color').val();
	var prdt_stock = $('#prdt_stock').val();
	var prdt_cond = $('#prdt_cond').val();
	var min_order = $('#min_order').val();
	var myfile1 = $( '#myfile1' ).val();
	var myfile2 = $( '#myfile2' ).val();
	var myfile3 = $( '#myfile3' ).val();
	var myfile4 = $( '#myfile4' ).val();
	var myfile5 = $( '#myfile5' ).val();
	var myfile6 = $( '#myfile6' ).val();
	var myfile7 = $( '#myfile7' ).val();
	console.log(prdt_name + prdt_desc + price + myfile1 + myfile2 + myfile3 + myfile4 + myfile5 + myfile6 + myfile7 + shop_id + shopName);

	if( prdt_name.length > 0)
	{
		$('#prdt_name').css('border' , '1px solid #CCC');
		document.getElementById("nameAlert").innerHTML = '';
		if( prdt_man.length > 0)
		{
			$('#prdt_man').css('border' , '1px solid #CCC');
			document.getElementById("manAlert").innerHTML = '';
			if( prdt_option.length > 0)
			{
				$('#prdt_option').css('border' , '1px solid #CCC');
				document.getElementById("optionAlert").innerHTML = '';
				if( price.length > 0)
				{
					$('#price').css('border' , '1px solid #CCC');
					document.getElementById("priceAlert").innerHTML = '';
					if( prdt_stock.length > 0)
					{
						$('#prdt_stock').css('border' , '1px solid #CCC');
						document.getElementById("stockAlert").innerHTML = '';
						if( min_order.length > 0)
						{
							$('#min_order').css('border' , '1px solid #CCC');
							document.getElementById("min_orderAlert").innerHTML = '';
							if( prdt_desc.length > 0)
							{
								$('#prdt_desc').css('border' , '1px solid #CCC');
								document.getElementById("describeAlert").innerHTML = '';
								if( prdt_color.length > 0)
								{
									$('#prdt_color').css('border' , '1px solid #CCC');
									document.getElementById("colorAlert").innerHTML = '';
									if( prdt_cond.length > 0)
									{
										$('#prdt_cond').css('border' , '1px solid #CCC');
										document.getElementById("condAlert").innerHTML = '';
										if(myfile1.length > 0)
										{
											$('#img1_field').css('border' , '1px solid #CCC');
											document.getElementById("imageAlert").innerHTML = '';
											$('#addprdtover1').removeClass('hide');
											//post to php
											$.post("/add_product_prc.php",  
											{
												task : "task",
											  	shop_id : shop_id,
											  	shopName : shopName,
											  	prdt_name : prdt_name,
											  	prdt_desc : prdt_desc,
											  	prdt_option : prdt_option,
											  	price : price,
											  	prdt_man : prdt_man,
													prdt_color : prdt_color,
													prdt_stock : prdt_stock,
													prdt_cond : prdt_cond,
													min_order : min_order,
											  	myfile1 : myfile1,
											   	myfile2 : myfile2,
											   	myfile3 : myfile3,
											   	myfile4 : myfile4,
											   	myfile5 : myfile5,
											   	myfile6 : myfile6,
											   	myfile7 : myfile7,
												cache: false,
											})
												.error(function( )
												   {
											          $('#addprdtover1').addClass('hide');
												   })
												.success(function(response)
												{	var	res = response.split("+-+");
													$('#addprdtover1').addClass('hide');

													$('#product_id').val(res[1]);
													$('#product_nameformat').val(res[2]);
													$.smallBox({
														title : "Success!",
														content : "Product added!",
														color : "#739E73",
														iconSmall : "fa fa-cloud",
														timeout : 1500
													});
											     //$("#feedBack").html(response);
											     $( '#prdt_name' ).val("");
													 $( '#prdt_desc' ).code("");
													 $( '#price, #prdt_man, #prdt_option, #prdt_stock, #min_order, #prdt_color, #prdt_cond, #myfile1, #myfile2, #myfile3, #myfile4, #myfile5, #myfile6, #myfile7' ).val("");
													 $('#vpb_uploads_displayer').html("");
													 $('#vpb_uploads_displayer2').html("");
													 $('#vpb_uploads_displayer3').html("");
													 $('#vpb_uploads_displayer4').html("");
													 $('#vpb_uploads_displayer5').html("");
													 $('#vpb_uploads_displayer6').html("");
													 $('#vpb_uploads_displayer7').html("");
													 
													 setTimeout(addpageload,1500);
													 
													 //setTimeout(editpageload,1500);
												
												     //setTimeout(exitpageload,1500);
													 
												});
										}
										else{
											$('#img1_field').css('border' , '2px solid #ff0000');
											document.getElementById("imageAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add atleast one image</small>';
										}
									}
									else{
										$('#prdt_cond').css('border' , '2px solid #ff0000');
										document.getElementById("condAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add Product Condition</small>';
									}
								}
								else{
									$('#prdt_color').css('border' , '2px solid #ff0000');
									document.getElementById("colorAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add Product Color</small>';
								}
							}
							else{
								$('#prdt_desc').css('border' , '2px solid #ff0000');
								document.getElementById("describeAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a Description</small>';
							}
						}
						else{
							$('#min_order').css('border' , '2px solid #ff0000');
							document.getElementById("min_orderAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a valid Minimum Order</small>';
						}
					}
					else{
						$('#prdt_stock').css('border' , '2px solid #ff0000');
						document.getElementById("stockAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a valid Stock Quantity</small>';
					}					
				}
				else{
					$('#price').css('border' , '2px solid #ff0000');
					document.getElementById("priceAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a valid Price</small>';
				}
			}
			else{
				$('#prdt_option').css('border' , '2px solid #ff0000');
				document.getElementById("optionAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add an option</small>';
			}
		}
		else{
			$('#prdt_man').css('border' , '2px solid #ff0000');
			document.getElementById("manAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a Manufacturer</small>';
		}
	}
	else{
		 $('#prdt_name').css('border' , '2px solid #ff0000');
		 document.getElementById("nameAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a Name</small>';
	}
}
function add_product_btn_edclick()
{
 	var shop_id = $( '#shop_id' ).val();
 	var shopName = $( '#shopName' ).val();
	var prdt_name = $( '#prdt_name' ).val();
	var prdt_desc = $( '#prdt_desc' ).code();
	var prdt_option = $( '#prdt_option' ).val();
	var price = $( '#price' ).val();
	var prdt_man = $('#prdt_man').val();
	var prdt_color = $('#prdt_color').val();
	var prdt_stock = $('#prdt_stock').val();
	var prdt_cond = $('#prdt_cond').val();
	var min_order = $('#min_order').val();
	var myfile1 = $( '#myfile1' ).val();
	var myfile2 = $( '#myfile2' ).val();
	var myfile3 = $( '#myfile3' ).val();
	var myfile4 = $( '#myfile4' ).val();
	var myfile5 = $( '#myfile5' ).val();
	var myfile6 = $( '#myfile6' ).val();
	var myfile7 = $( '#myfile7' ).val();
	console.log(prdt_name + prdt_desc + price + myfile1 + myfile2 + myfile3 + myfile4 + myfile5 + myfile6 + myfile7 + shop_id + shopName);

	if( prdt_name.length > 0)
	{
		$('#prdt_name').css('border' , '1px solid #CCC');
		document.getElementById("nameAlert").innerHTML = '';
		if( prdt_man.length > 0)
		{
			$('#prdt_man').css('border' , '1px solid #CCC');
			document.getElementById("manAlert").innerHTML = '';
			if( prdt_option.length > 0)
			{
				$('#prdt_option').css('border' , '1px solid #CCC');
				document.getElementById("optionAlert").innerHTML = '';
				if( price.length > 0)
				{
					$('#price').css('border' , '1px solid #CCC');
					document.getElementById("priceAlert").innerHTML = '';
					if( prdt_stock.length > 0)
					{
						$('#prdt_stock').css('border' , '1px solid #CCC');
						document.getElementById("stockAlert").innerHTML = '';
						if( min_order.length > 0)
						{
							$('#min_order').css('border' , '1px solid #CCC');
							document.getElementById("min_orderAlert").innerHTML = '';
							if( prdt_desc.length > 0)
							{
								$('#prdt_desc').css('border' , '1px solid #CCC');
								document.getElementById("describeAlert").innerHTML = '';
								if( prdt_color.length > 0)
								{
									$('#prdt_color').css('border' , '1px solid #CCC');
									document.getElementById("colorAlert").innerHTML = '';
									if( prdt_cond.length > 0)
									{
										$('#prdt_cond').css('border' , '1px solid #CCC');
										document.getElementById("condAlert").innerHTML = '';
										if(myfile1.length > 0)
										{
											$('#img1_field').css('border' , '1px solid #CCC');
											document.getElementById("imageAlert").innerHTML = '';
											$('#addprdtover1').removeClass('hide');
											//post to php
											$.post("/add_product_prc.php",  
											{
												task : "task",
											  	shop_id : shop_id,
											  	shopName : shopName,
											  	prdt_name : prdt_name,
											  	prdt_desc : prdt_desc,
											  	prdt_option : prdt_option,
											  	price : price,
											  	prdt_man : prdt_man,
													prdt_color : prdt_color,
													prdt_stock : prdt_stock,
													prdt_cond : prdt_cond,
													min_order : min_order,
											  	myfile1 : myfile1,
											   	myfile2 : myfile2,
											   	myfile3 : myfile3,
											   	myfile4 : myfile4,
											   	myfile5 : myfile5,
											   	myfile6 : myfile6,
											   	myfile7 : myfile7,
												cache: false,
											})
												.error(function( )
												   {
											          $('#addprdtover1').addClass('hide');
												   })
												.success(function(response)
												{	var	res = response.split("+-+");
													$('#addprdtover1').addClass('hide');

													$('#product_id').val(res[1]);
													$('#product_nameformat').val(res[2]);
													$.smallBox({
														title : "Success!",
														content : "Product added!",
														color : "#739E73",
														iconSmall : "fa fa-cloud",
														timeout : 1500
													});
											     //$("#feedBack").html(response);
											     $( '#prdt_name' ).val("");
													 $( '#prdt_desc' ).code("");
													 $( '#price, #prdt_man, #prdt_option, #prdt_stock, #min_order, #prdt_color, #prdt_cond, #myfile1, #myfile2, #myfile3, #myfile4, #myfile5, #myfile6, #myfile7' ).val("");
													 $('#vpb_uploads_displayer').html("");
													 $('#vpb_uploads_displayer2').html("");
													 $('#vpb_uploads_displayer3').html("");
													 $('#vpb_uploads_displayer4').html("");
													 $('#vpb_uploads_displayer5').html("");
													 $('#vpb_uploads_displayer6').html("");
													 $('#vpb_uploads_displayer7').html("");
													 
													// setTimeout(addpageload,1500);
													 
													 setTimeout(editpageload,1500);
												
												     //setTimeout(exitpageload,1500);
													 
												});
										}
										else{
											$('#img1_field').css('border' , '2px solid #ff0000');
											document.getElementById("imageAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add atleast one image</small>';
										}
									}
									else{
										$('#prdt_cond').css('border' , '2px solid #ff0000');
										document.getElementById("condAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add Product Condition</small>';
									}
								}
								else{
									$('#prdt_color').css('border' , '2px solid #ff0000');
									document.getElementById("colorAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add Product Color</small>';
								}
							}
							else{
								$('#prdt_desc').css('border' , '2px solid #ff0000');
								document.getElementById("describeAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a Description</small>';
							}
						}
						else{
							$('#min_order').css('border' , '2px solid #ff0000');
							document.getElementById("min_orderAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a valid Minimum Order</small>';
						}
					}
					else{
						$('#prdt_stock').css('border' , '2px solid #ff0000');
						document.getElementById("stockAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a valid Stock Quantity</small>';
					}					
				}
				else{
					$('#price').css('border' , '2px solid #ff0000');
					document.getElementById("priceAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a valid Price</small>';
				}
			}
			else{
				$('#prdt_option').css('border' , '2px solid #ff0000');
				document.getElementById("optionAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add an option</small>';
			}
		}
		else{
			$('#prdt_man').css('border' , '2px solid #ff0000');
			document.getElementById("manAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a Manufacturer</small>';
		}
	}
	else{
		 $('#prdt_name').css('border' , '2px solid #ff0000');
		 document.getElementById("nameAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a Name</small>';
	}
}
function add_product_btn_exclick()
{
 	var shop_id = $( '#shop_id' ).val();
 	var shopName = $( '#shopName' ).val();
	var prdt_name = $( '#prdt_name' ).val();
	var prdt_desc = $( '#prdt_desc' ).code();
	var prdt_option = $( '#prdt_option' ).val();
	var price = $( '#price' ).val();
	var prdt_man = $('#prdt_man').val();
	var prdt_color = $('#prdt_color').val();
	var prdt_stock = $('#prdt_stock').val();
	var prdt_cond = $('#prdt_cond').val();
	var min_order = $('#min_order').val();
	var myfile1 = $( '#myfile1' ).val();
	var myfile2 = $( '#myfile2' ).val();
	var myfile3 = $( '#myfile3' ).val();
	var myfile4 = $( '#myfile4' ).val();
	var myfile5 = $( '#myfile5' ).val();
	var myfile6 = $( '#myfile6' ).val();
	var myfile7 = $( '#myfile7' ).val();
	console.log(prdt_name + prdt_desc + price + myfile1 + myfile2 + myfile3 + myfile4 + myfile5 + myfile6 + myfile7 + shop_id + shopName);

	if( prdt_name.length > 0)
	{
		$('#prdt_name').css('border' , '1px solid #CCC');
		document.getElementById("nameAlert").innerHTML = '';
		if( prdt_man.length > 0)
		{
			$('#prdt_man').css('border' , '1px solid #CCC');
			document.getElementById("manAlert").innerHTML = '';
			if( prdt_option.length > 0)
			{
				$('#prdt_option').css('border' , '1px solid #CCC');
				document.getElementById("optionAlert").innerHTML = '';
				if( price.length > 0)
				{
					$('#price').css('border' , '1px solid #CCC');
					document.getElementById("priceAlert").innerHTML = '';
					if( prdt_stock.length > 0)
					{
						$('#prdt_stock').css('border' , '1px solid #CCC');
						document.getElementById("stockAlert").innerHTML = '';
						if( min_order.length > 0)
						{
							$('#min_order').css('border' , '1px solid #CCC');
							document.getElementById("min_orderAlert").innerHTML = '';
							if( prdt_desc.length > 0)
							{
								$('#prdt_desc').css('border' , '1px solid #CCC');
								document.getElementById("describeAlert").innerHTML = '';
								if( prdt_color.length > 0)
								{
									$('#prdt_color').css('border' , '1px solid #CCC');
									document.getElementById("colorAlert").innerHTML = '';
									if( prdt_cond.length > 0)
									{
										$('#prdt_cond').css('border' , '1px solid #CCC');
										document.getElementById("condAlert").innerHTML = '';
										if(myfile1.length > 0)
										{
											$('#img1_field').css('border' , '1px solid #CCC');
											document.getElementById("imageAlert").innerHTML = '';
											$('#addprdtover1').removeClass('hide');
											//post to php
											$.post("/add_product_prc.php",  
											{
												task : "task",
											  	shop_id : shop_id,
											  	shopName : shopName,
											  	prdt_name : prdt_name,
											  	prdt_desc : prdt_desc,
											  	prdt_option : prdt_option,
											  	price : price,
											  	prdt_man : prdt_man,
													prdt_color : prdt_color,
													prdt_stock : prdt_stock,
													prdt_cond : prdt_cond,
													min_order : min_order,
											  	myfile1 : myfile1,
											   	myfile2 : myfile2,
											   	myfile3 : myfile3,
											   	myfile4 : myfile4,
											   	myfile5 : myfile5,
											   	myfile6 : myfile6,
											   	myfile7 : myfile7,
												cache: false,
											})
												.error(function( )
												   {
											          $('#addprdtover1').addClass('hide');
												   })
												.success(function(response)
												{	var	res = response.split("+-+");
													$('#addprdtover1').addClass('hide');

													$('#product_id').val(res[1]);
													$('#product_nameformat').val(res[2]);
													$.smallBox({
														title : "Success!",
														content : "Product added!",
														color : "#739E73",
														iconSmall : "fa fa-cloud",
														timeout : 1500
													});
											     //$("#feedBack").html(response);
											     $( '#prdt_name' ).val("");
													 $( '#prdt_desc' ).code("");
													 $( '#price, #prdt_man, #prdt_option, #prdt_stock, #min_order, #prdt_color, #prdt_cond, #myfile1, #myfile2, #myfile3, #myfile4, #myfile5, #myfile6, #myfile7' ).val("");
													 $('#vpb_uploads_displayer').html("");
													 $('#vpb_uploads_displayer2').html("");
													 $('#vpb_uploads_displayer3').html("");
													 $('#vpb_uploads_displayer4').html("");
													 $('#vpb_uploads_displayer5').html("");
													 $('#vpb_uploads_displayer6').html("");
													 $('#vpb_uploads_displayer7').html("");
													 
													 //setTimeout(addpageload,1500);
													 
													 //setTimeout(editpageload,1500);
												
												     setTimeout(exitpageload,1500);
													 
												});
										}
										else{
											$('#img1_field').css('border' , '2px solid #ff0000');
											document.getElementById("imageAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add atleast one image</small>';
										}
									}
									else{
										$('#prdt_cond').css('border' , '2px solid #ff0000');
										document.getElementById("condAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add Product Condition</small>';
									}
								}
								else{
									$('#prdt_color').css('border' , '2px solid #ff0000');
									document.getElementById("colorAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add Product Color</small>';
								}
							}
							else{
								$('#prdt_desc').css('border' , '2px solid #ff0000');
								document.getElementById("describeAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a Description</small>';
							}
						}
						else{
							$('#min_order').css('border' , '2px solid #ff0000');
							document.getElementById("min_orderAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a valid Minimum Order</small>';
						}
					}
					else{
						$('#prdt_stock').css('border' , '2px solid #ff0000');
						document.getElementById("stockAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a valid Stock Quantity</small>';
					}					
				}
				else{
					$('#price').css('border' , '2px solid #ff0000');
					document.getElementById("priceAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a valid Price</small>';
				}
			}
			else{
				$('#prdt_option').css('border' , '2px solid #ff0000');
				document.getElementById("optionAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add an option</small>';
			}
		}
		else{
			$('#prdt_man').css('border' , '2px solid #ff0000');
			document.getElementById("manAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a Manufacturer</small>';
		}
	}
	else{
		 $('#prdt_name').css('border' , '2px solid #ff0000');
		 document.getElementById("nameAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Please add a Name</small>';
	}
}

function saveoptionbtn_click()
{
   // document.getElementById("addoptionover1").innerHTML.removeClass('hide');
	$('#addoptionover1').removeClass('hide');
	var product_id = $( '#product_id' ).val();
	var prdt_option1 = $( '#prdt_option1' ).val();
	var price1 = $( '#price1' ).val();
	var prdt_stock1 = $('#prdt_stock1').val();
	if( (prdt_option1.length > 0) && (price1.length > 0) && (prdt_stock1.length > 0) )
	{
		$('#prdt_option1, #price1, #prdt_stock1').css('border' , '1px solid #CCC');
		document.getElementById("optionAlert").innerHTML = '';
		//post to php
		$.post("/add_product_prc.php",  
		{
			task1 : "task1",
		  	product_id : product_id,
		  	prdt_option1 : prdt_option1,
		  	price1 : price1,
		  	prdt_stock1 : prdt_stock1,
			cache: false,
		})
			.error(function( )
			   {
				  console.log( "Error: " );
				  $('#addoptionover1').addClass('hide');
			   })
			.success(function(response)
			{
				$('#addoptionover1').addClass('hide');
				$.smallBox({
					title : "Success!",
					content : "Product option added!",
					color : "#739E73",
					iconSmall : "fa fa-cloud",
					timeout : 1500
				});
		     $("#optionAlert").html(response);
		     $( '#prdt_option1, #price1, #prdt_stock1' ).val("");
			 
				 setTimeout(editpageload,1500);	
														
													// if( $('#add_product_btn_ex').click())
													//	{ setTimeout(exitpageload,1500);}	
					
			});
	}
	else{
		$('#prdt_option1, #price1, #prdt_stock1').css('border' , '2px solid #ff0000');
		document.getElementById("optionAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Fill all fields</small>';
	}
}

function saveeditoptionbtn_click()
{
	$('#editoptionover1').removeClass('hide');
	var option_id = $( '#edit_option_id' ).val();
	var edit_prdt_option = $( '#edit_prdt_option' ).val();
	var edit_prdt_price = $( '#edit_prdt_price' ).val();
	var edit_prdt_stock = $('#edit_prdt_stock').val();
	if( (edit_prdt_option.length > 0) && (edit_prdt_price.length > 0) && (edit_prdt_stock.length > 0) )
	{
		$('#edit_prdt_option, #edit_prdt_price, #edit_prdt_stock').css('border' , '1px solid #CCC');
		document.getElementById("editoptionAlert").innerHTML = '';
		//post to php
		$.post("/add_product_prc.php",  
		{
			task3 : "task3",
		  	option_id : option_id,
		  	edit_prdt_option : edit_prdt_option,
		  	edit_prdt_price : edit_prdt_price,
		  	edit_prdt_stock : edit_prdt_stock,
			cache: false,
		})
			.error(function( )
			   {
				  console.log( "Error: " );
				  $('#editoptionover1').addClass('hide');
			   })
			.success(function(response)
			{
				$('#editoptionover1').addClass('hide');
				if(response == "Product option updated")
				{
					$.smallBox({
						title : "Success!",
						content : "Product option updated",
						color : "#739E73",
						iconSmall : "fa fa-cloud",
						timeout : 1500
					});
			    $("#editoptionAlert").html("<b class='text-success'>Product option updated</b>");
				 	setTimeout(editpageload,1500);
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
		$('#edit_prdt_option, #edit_prdt_price, #edit_prdt_stock').css('border' , '2px solid #ff0000');
		document.getElementById("editoptionAlert").innerHTML = ' <small class="text-danger " style="margin-top:0px; margin-right:5px;">Fill all fields</small>';
	}
}

function update_product_btn_click()
{
	$('#editprdtover1').removeClass('hide');
	var product_id = $( '#product_id' ).val();
	var prdt_name = $( '#prdt_name' ).val();
	var prdt_desc = $( '#prdt_desc' ).code();
	var prdt_man = $('#prdt_man').val();
	var prdt_color = $('#prdt_color').val();
	var prdt_cond = $('#prdt_cond').val();
	var min_order = $('#min_order').val();
	console.log(prdt_name + prdt_desc + prdt_man + prdt_color + prdt_cond + min_order + product_id);
	if( (prdt_name.length > 0) && (prdt_desc.length > 0) && (prdt_man.length > 0) && (prdt_color.length > 0) && (prdt_cond.length > 0) && (min_order.length > 0) )
	{
		$('#prdt_name, #prdt_desc, #prdt_man, #prdt_color, #prdt_cond, #min_order').css('border' , '1px solid #CCC');
		document.getElementById("updateprdtAlert").innerHTML = '';
		$.post("/add_product_prc.php",  
		{
			task2 : "task2",
		  	product_id : product_id,
		  	prdt_name : prdt_name,
				prdt_desc : prdt_desc,
				prdt_man : prdt_man,
				prdt_color : prdt_color,
				prdt_cond : prdt_cond,
				min_order : min_order,
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
				if(response == "Product updated")
				{
					$.smallBox({
						title : "Success!",
						content : "Product updated",
						color : "#739E73",
						iconSmall : "fa fa-cloud",
						timeout : 1500
					});
			    $("#updateprdtAlert").html("<b class='text-success'>Product updated</b>");
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
}

