<?php 
include "include/conxn.php";
	$selprdt = "SELECT * FROM shop WHERE shop_id = '$shop_id' LIMIT 1";
	$queryprdt = mysqli_query($link,$selprdt);
	if(mysqli_num_rows($queryprdt) >= 1)
	{
		while($while_prdt = mysqli_fetch_assoc($queryprdt))
		{
			$shop_id = 		$while_prdt['shop_id'];
			$user_id = 		$while_prdt['user_id'];
			$shopName = 	$while_prdt['shopName'];
			$telephone =	 $while_prdt['telephone'];
			$shop_descrb = 	$while_prdt['shop_descrb'];
			$telephone =	 $while_prdt['telephone'];
			$state =		 $while_prdt['state'];
			$country = 		$while_prdt['country'];
			$city = 		$while_prdt['city'];
			$countryCode = 	$while_prdt['countryCode'];
			$address = 		$while_prdt['address'];
			$email = 		$while_prdt['email'];
			$category = 	$while_prdt['category'];
			$mode = 		$while_prdt['mode'];
			$bus_type = 	$while_prdt['bus_type'];
			$core_products = $while_prdt['core_products'];
			$datetime = 	$while_prdt['datetime'];
			$business_url = $while_prdt['business_url'];
			
			echo '<div class="col-sm-7 col-md-7 col-lg-7">
              <div class="padding-10" style="margin-left: 10px; ">
                <div class="row">
									<div class="col-sm-12 col-md-12 col-lg-12">
										<div class="row">
											<div class="col-xs-6">
												<label class="text-info" style="font-weight:600;">Business Name</label>
												<input type="text" class="form-control disabled" id="shopName"  name="shopName" value="'.$shopName.'" disabled />
											</div>
											<div class="col-xs-6">
												<label class="text-info" style="font-weight:600;">Business email</label>
												<input type="text" class="form-control" id="email_edit"  name="email" value="'.$email.'" required />
											</div>
										</div>
											<br>
										<div class="row">
											<div class="col-md-12">
												<label class="text-info" style="font-weight:600;">Business Description</label>
												<textarea class="form-control" id="edte_descrb" name="shop_descrb" required>'.$shop_descrb.'</textarea>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12">
												<label class="text-info" style="font-weight:600;">Business address and Landmark</label>
												<textarea class="form-control" id="edt_address" name="address" required>'.$address.'</textarea>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12">
												<label class="text-info" style="font-weight:600;">Core products</label>
												<textarea class="form-control" id="edt_products" name="core_products" required>'.$core_products.'</textarea>
											</div>
										</div>
											<br>
										<div class="row">
											<div class="col-sm-4 col-xs-6">
													<label class="text-info" style="font-weight:600;">City </label>
													<input type="text" class="form-control" id="edr_city" name="city" value="'.$city.'" required />
											</div>
											<div class="col-sm-4 col-xs-6">
													<label class="text-info" style="font-weight:600;">Business Url</label>
													<input type="text" class="form-control" id="business_url" name="business_url" value="'.$business_url.'" required />
											</div>
											<div class="col-sm-4 col-xs-6">
													<label class="text-info" style="font-weight:600;">Telephone</label>
													<input type="number" class="form-control" id="edt_telephone" name="telephone" value="'.$telephone.'" required />
											</div>
											<div class="row padding-10">

<div class="input-group padding-10">
	   <span class="input-group-addon"><i class="fa fa-suitcase fa-sm fa-fw"></i></span>
	 <select id="bus_type_set"  placeholder="Full name" class="form-control"    >
	 <option class="active">'.$bus_type.'</option>
	 <option>Manufacturing</option>
	 <option>wholesaler/distributor</option>
	 <option>Retailer</option>
	 <option>Association</option> 
	 <option>Agent</option>
	 <option>Trading business</option>
	 <option>buying business</option>
	 <option>Business service</option>
	</select>
</div>
<div class="input-group padding-10">
	   <span class="input-group-addon"><i class="fa fa-tag fa-sm fa-fw"></i></span>
	 <select class=" form-control"  id="bus_cat" >
<option class="active">'.$category.'</option>
<option>Agriculture, Food & Beverage</option>
<option>Art, Crafts & Gallery </option>
<option>Auto & Transportation</option>
<option>Clothing, Textiles, Jewelry, Bags & shoes</option>
<option>Electrical Equipment, Components, & Telecom</option>
<option>Electronics & Electrical Appliances</option>
<option>Gifts & Toys</option>
<option>Health & Beauty</option>
<option>Home, Lights & Construction</option>
<option>Machinery, Hardware & Tools</option>
<option>Metallurgy, Chemicals, Rubber & Plastics</option>
<option>Packaging, Advertising & Office</option>
<option>Software, Computers & Accessories</option>
<option>Sports & Accessories</option>
<option>Stationery, Furniture & Fittings</option>

</select> 
</div>
</div>
											
											<div class="col-xs-12" id="updateprdtAlert" style="margin-top:10px;"></div>
										</div>
										<input name="update_product_btn" type="submit" class="btn btn-success btn-md pull-right" style="margin-top:5px;" value="Save" id="update_bus_btn" />
									</div>
								</div>
							</div>
						</div><div class="smart-form client-form col-xs-12 col-sm-5 col-md-5 col-lg-5" ><label class="text-info" style="font-weight:600;">Delivery Options</label>
<section class="padding-10">';
		$selprdt = "SELECT * FROM delivery_option WHERE shop_id = '$shop_id' LIMIT 1";
	$queryprdt = mysqli_query($link,$selprdt);
	if(mysqli_num_rows($queryprdt) >= 1)
	{
		while($while_prdt = mysqli_fetch_assoc($queryprdt))
		{
		$option_1 =$while_prdt['option_1'];
		$option_2 =$while_prdt['option_2'];
		$option_3 =$while_prdt['option_3'];
		
	if( $option_1 == 1 )
	{
	echo '<label class="checkbox">
		<input id="do1" checked="" type="checkbox">
		<i></i>Pickup from Store.</label>';}
	else if( $option_1 != 1 )
	{ echo '<label class="checkbox">
<input id="do1"  type="checkbox">
<i></i>Pickup from Store.</label>';}
				
	if( $option_2 == 1 )
	{
	echo '<label class="checkbox">
		<input id="do2" checked="" type="checkbox">
		<i></i>Self Delivery.</label>';}
	else if( $option_2 != 1 )
	{ echo '<label class="checkbox">
<input id="do2" type="checkbox">
<i></i>Self Delivery.</label>';}
				
	if( $option_3 == 1 )
	{
	echo '<label class="checkbox">
		<input id="do3" checked="" type="checkbox">
		<i></i>Other Delivery Agents.</label>';}
	else if( $option_3 != 1 )
	{ echo '<label class="checkbox">
<input id="do3"  type="checkbox">
<i></i>Other Delivery Agents.</label>';}

echo '	<input name="update_delivery_btn" type="submit" class="btn btn-success btn-lg pull-right" style="margin-top:10px;" value="Save Delivery" id="update_delivery_btn" /></section>
		</div>			';
				
	
	
}
}			
}
}
?>