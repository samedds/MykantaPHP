<?php
ini_set('session.cookie_httponly',true);
 @session_start();
if(!isset($_SESSION['id']))
{

  unset($_SESSION['id']);
  unset($_SESSION['email']);
   $expire = time() - 300;
setcookie("_email", '', $expire);
setcookie("_password", '', $expire);
setcookie("remb_me", '', $expire);
header("location:/check_out_vis.php");
//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
 //$_SESSION['vis_id'];
}
else
{
 $user_id = $_SESSION['id'];
$account_id = $_SESSION['id'];
}
 
require_once $_SERVER['DOCUMENT_ROOT'] . '/defines.php';
include "include/funcxn.php";

include "include/chat/chat.php";
include "include/check_out_process_vis.php";



?>
<html lang="en-us">
	
<head>
<meta charset="utf-8"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
		
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
<noscript> Your browser does not support JavaScript. </noscript>
		<title> Mykanta Checkout </title>
	<link rel="icon" href="img/mk.png" type="image/x-icon"/>
	
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type= "text/javascript" src = "/js/countries.js"></script>
<script type= "text/javascript" src = "/js/add_to_cart_vis.js"></script>
<script type= "text/javascript" src = "/js/live_edit_cart_vis.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
<!--<script type="text/javascript" src="/include/chat/chat.js" ></script> -->
<style type="text/css"> 
.pic{
height:auto;
width:100%;
 } 
 
.hover .image4 {
/* set it at the bottom of .carousel-inner */
      

width:110px; 
color:#ccc;

}
.hover .hover-toggle {
/* set it at the bottom of .carousel-inner */
position: absolute;      
top: 0;
display: none;
}
.hover:hover  .hover-toggle {
display: block;
}

.shelve{
background-image:url(img/shelve.jpg);

}

.loader
{
background-image:url(img/ajax-loader.gif);
background-repeat:no-repeat;
background-position:center;
height:100px;
}
.loading
{
background-image:url(img/loading.gif);
background-repeat:no-repeat;
background-position:center;
height:100px;
}
.myscroll{
 	overflow: auto !important;
 }
.bigbox, #divMiniIcons{
	left:10px !important;
}
</style> 
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media=  "screen" href="/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
		<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
</head>
<body class="fixed-header fixed-navigation">
	
	<!-- HEADER -->
	<?php 
include "inc/user_header.php";?>
	<!-- END HEADER -->

 <!-- BEGIN NAVIGATION -->
	<?php 
	nav($user_id);
	?>
	
	<!-- END NAVIGATION -->
	<!-- MAIN PANEL -->
<div id="main" role="main">
<div id="content">
<div class="row no-padding">
<div class="col-sm-12"  id="result" >
  <div class="">
    <div class="row ">
	<div class="col-sm-12 col-md-7 col-lg-7"id="box_check_1">
			<div class="row padding-10"> <ul class="bootstrapWizard form-wizard">
											<li class="active" data-target="#step1">
												<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Your Cart</span> </a>
											</li>
											<li>
												<a> <span class="step">2</span> <span class="title">Billing information</span> </a>
											</li>
											<li>
												<a> <span class="step">3</span> <span class="title">Finish</span> </a>
											</li>
											<!--<li>
												<a > <span class="step">4</span> <span class="title">Order </span> </a>
											</li>-->
										</ul> </div><br>
		 <table id="dt_basic" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Product Name</th>
						<th class="hidden-xs hidden-sm">Business</th>
						<th class="hidden-xs hidden-sm">Option</th>
						<th >Price</th>
						<th>Qty.</th>
						<th> Total </th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					<?php echo check_out_process(); ?>
				</tbody>
				<tbody>
					<th>Total </th>
					<th> </th><th class="hidden-xs hidden-sm"> </th><th class="hidden-xs hidden-sm"> </th><th > </th><th id="total_result">GHS <?php echo total_cost_items(); ?></th>
					<input type="hidden" id="total_result_hidden" value="<?php echo total_cost_items(); ?>" />
				</tbody>
				</table>	
		</div>
		<!-- billing info -->
		<div class=" col-sm-12 col-md-11 col-lg-11 "style="display:none;" id="box_check_2" >
			 <div class="row padding-10"> <ul class="bootstrapWizard form-wizard">
											<li>
												<a> <span class="step">1</span> <span class="title">Your Cart</span> </a>
											</li>
											<li class="active" data-target="#step1">
												<a href="#tab1" data-toggle="tab"> <span class="step">2</span> <span class="title">Billing Info</span> </a>
											</li>
											<li>
												<a> <span class="step">3</span> <span class="title">Finish</span> </a>
											</li>
											<!--<li>
												<a > <span class="step">4</span> <span class="title">Order </span> </a>
											</li>-->
										</ul> </div>
			 <br>
		     <hr class="no-margin">
          <div class="padding-10 margin-10" style="margin-left:20px;">  <?php  bill_info_used();?></div>
			  <form class="padding-10">
    <fieldset class="  client-form padding-10 margin-10"><div class="col-md-6">
	<h4><strong class="text-default">Complete your billing information</strong></h3><br>
	<h4 class=""><strong class="text-primary"> Basic Information</strong></h4><br>
        <div class="row " >
            <label for="firstname" class="control-label col-sm-2 padding-10">First Name </label>
            <div class="col-sm-3">
                <input id="firstname" name="firstname" type="text" style="border-radius:6px; height:30px; border:1px solid grey;" autocomplete="first-name" placeholder="First Name" class="padding-10">
                  <p class="help-block"></p>
            </div>
        </div>
        <!-- last name input-->
        <div class="row ">
            <label for="lastname" class="control-label col-sm-2 padding-10">Last Name </label>
            <div class="col-sm-3">
                <input id="lastname" name="lastname" type="text" style="border-radius:6px; height:30px; border:1px solid grey;" autocomplete="last-name" placeholder="Last Name" class="padding-10">
                <p class="help-block"></p>
            </div>
        </div>
       <!-- address-line1 input-->
        <div class="row">
            <label class="control-label col-sm-2 padding-10">Email</label>
            <div class="col-sm-3">
                <input id="bill_email" name="bill_email" type="text" style="border-radius:6px; height:30px; border:1px solid grey;" autocomplete="bill_email" placeholder="Email" class="padding-10">
                <p class="help-block"></p>
            </div>
        </div> 
		<!-- telephone input-->
        <div class="row ">
            <label for="telephone" class="control-label col-sm-2 padding-10">Telephone</label>
            <div class="col-sm-3">
                <input id="telephone_bill" name="telephone_bill" style="border-radius:6px; height:30px; border:1px solid grey;" type="telephone" autocomplete="telephone" placeholder="(xxx-xxx-xxx)" class="padding-10">
                <p class="help-block"></p>
            </div>
        </div> 
		 <!-- postal-code input
        <div class="row ">
            <label class="control-label col-sm-2 padding-10">Zip / Postal Code</label>
            <div class="col-sm-3">
                <input id="postalcode" name="postal-code" type="text"  style="border-radius:6px; height:40px; border:1px solid grey;"autocomplete="postal-code" placeholder="zip or postal code" class="padding-10">
                <p class="help-block"></p>
            </div>
        </div>
		
     -->
		
        <!-- address-line2 input
        <div class="row ">
            <label class="control-label col-sm-2 padding-10">Address Line 2</label>
            <div class="col-sm-3">
                <input id="address-line2" name="address-line2" type="text" style="border-radius:6px; height:40px; border:1px solid grey;" autocomplete="address-line2" placeholder="Landmarks, suite , unit, building, floor, etc." class="padding-10">
                <p class="help-block"></p>
            </div>
        </div>
		-->
		</div>
		<div class="col-md-6">
		<br>
		<br>
		<h4 class=""><strong class="text-primary"> Location</strong> We deliver at your door step.</h4><br>
        <!-- country select -->
        <div class="row ">
            <label class="control-label col-md-2">Country</label>
            <div class="col-md-3">
                <select id="country_bill" name="country" autocomplete="country" class="" style="border-radius:6px; height:30px; border:1px solid grey; border:1px solid grey; width:190px;">
                    <option value="" >(please select a country)</option>
                    <option value="AF">Afghanistan</option>
                    <option value="AL">Albania</option>
                    <option value="DZ">Algeria</option>
                    <option value="AS">American Samoa</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antarctica</option>
                    <option value="AG">Antigua and Barbuda</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaijan</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrain</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BY">Belarus</option>
                    <option value="BE">Belgium</option>
                    <option value="BZ">Belize</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermuda</option>
                    <option value="BT">Bhutan</option>
                    <option value="BO">Bolivia</option>
                    <option value="BA">Bosnia and Herzegowina</option>
                    <option value="BW">Botswana</option>
                    <option value="BV">Bouvet Island</option>
                    <option value="BR">Brazil</option>
                    <option value="IO">British Indian Ocean Territory</option>
                    <option value="BN">Brunei Darussalam</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="KH">Cambodia</option>
                    <option value="CM">Cameroon</option>
                    <option value="CA">Canada</option>
                    <option value="CV">Cape Verde</option>
                    <option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CX">Christmas Island</option>
                    <option value="CC">Cocos (Keeling) Islands</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comoros</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo, the Democratic Republic of the</option>
                    <option value="CK">Cook Islands</option>
                    <option value="CR">Costa Rica</option>
                    <option value="CI">Cote d'Ivoire</option>
                    <option value="HR">Croatia (Hrvatska)</option>
                    <option value="CU">Cuba</option>
                    <option value="CY">Cyprus</option>
                    <option value="CZ">Czech Republic</option>
                    <option value="DK">Denmark</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="DO">Dominican Republic</option>
                    <option value="TP">East Timor</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egypt</option>
                    <option value="SV">El Salvador</option>
                    <option value="GQ">Equatorial Guinea</option>
                    <option value="ER">Eritrea</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Ethiopia</option>
                    <option value="FK">Falkland Islands (Malvinas)</option>
                    <option value="FO">Faroe Islands</option>
                    <option value="FJ">Fiji</option>
                    <option value="FI">Finland</option>
                    <option value="FR">France</option>
                    <option value="FX">France, Metropolitan</option>
                    <option value="GF">French Guiana</option>
                    <option value="PF">French Polynesia</option>
                    <option value="TF">French Southern Territories</option>
                    <option value="GA">Gabon</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="DE">Germany</option>
                    <option value="GH" selected="selected">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GR">Greece</option>
                    <option value="GL">Greenland</option>
                    <option value="GD">Grenada</option>
                    <option value="GP">Guadeloupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GN">Guinea</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="GY">Guyana</option>
                    <option value="HT">Haiti</option>
                    <option value="HM">Heard and Mc Donald Islands</option>
                    <option value="VA">Holy See (Vatican City State)</option>
                    <option value="HN">Honduras</option>
                    <option value="HK">Hong Kong</option>
                    <option value="HU">Hungary</option>
                    <option value="IS">Iceland</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IR">Iran (Islamic Republic of)</option>
                    <option value="IQ">Iraq</option>
                    <option value="IE">Ireland</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italy</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japan</option>
                    <option value="JO">Jordan</option>
                    <option value="KZ">Kazakhstan</option>
                    <option value="KE">Kenya</option>
                    <option value="KI">Kiribati</option>
                    <option value="KP">Korea, Democratic People's Republic of</option>
                    <option value="KR">Korea, Republic of</option>
                    <option value="KW">Kuwait</option>
                    <option value="KG">Kyrgyzstan</option>
                    <option value="LA">Lao People's Democratic Republic</option>
                    <option value="LV">Latvia</option>
                    <option value="LB">Lebanon</option>
                    <option value="LS">Lesotho</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libyan Arab Jamahiriya</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lithuania</option>
                    <option value="LU">Luxembourg</option>
                    <option value="MO">Macau</option>
                    <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                    <option value="MG">Madagascar</option>
                    <option value="MW">Malawi</option>
                    <option value="MY">Malaysia</option>
                    <option value="MV">Maldives</option>
                    <option value="ML">Mali</option>
                    <option value="MT">Malta</option>
                    <option value="MH">Marshall Islands</option>
                    <option value="MQ">Martinique</option>
                    <option value="MR">Mauritania</option>
                    <option value="MU">Mauritius</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">Mexico</option>
                    <option value="FM">Micronesia, Federated States of</option>
                    <option value="MD">Moldova, Republic of</option>
                    <option value="MC">Monaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="MS">Montserrat</option>
                    <option value="MA">Morocco</option>
                    <option value="MZ">Mozambique</option>
                    <option value="MM">Myanmar</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NL">Netherlands</option>
                    <option value="AN">Netherlands Antilles</option>
                    <option value="NC">New Caledonia</option>
                    <option value="NZ">New Zealand</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Niger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk Island</option>
                    <option value="MP">Northern Mariana Islands</option>
                    <option value="NO">Norway</option>
                    <option value="OM">Oman</option>
                    <option value="PK">Pakistan</option>
                    <option value="PW">Palau</option>
                    <option value="PA">Panama</option>
                    <option value="PG">Papua New Guinea</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Peru</option>
                    <option value="PH">Philippines</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PL">Poland</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="RE">Reunion</option>
                    <option value="RO">Romania</option>
                    <option value="RU">Russian Federation</option>
                    <option value="RW">Rwanda</option>
                    <option value="KN">Saint Kitts and Nevis</option>
                    <option value="LC">Saint LUCIA</option>
                    <option value="VC">Saint Vincent and the Grenadines</option>
                    <option value="WS">Samoa</option>
                    <option value="SM">San Marino</option>
                    <option value="ST">Sao Tome and Principe</option>
                    <option value="SA">Saudi Arabia</option>
                    <option value="SN">Senegal</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leone</option>
                    <option value="SG">Singapore</option>
                    <option value="SK">Slovakia (Slovak Republic)</option>
                    <option value="SI">Slovenia</option>
                    <option value="SB">Solomon Islands</option>
                    <option value="SO">Somalia</option>
                    <option value="ZA">South Africa</option>
                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                    <option value="ES">Spain</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="SH">St. Helena</option>
                    <option value="PM">St. Pierre and Miquelon</option>
                    <option value="SD">Sudan</option>
                    <option value="SR">Suriname</option>
                    <option value="SJ">Svalbard and Jan Mayen Islands</option>
                    <option value="SZ">Swaziland</option>
                    <option value="SE">Sweden</option>
                    <option value="CH">Switzerland</option>
                    <option value="SY">Syrian Arab Republic</option>
                    <option value="TW">Taiwan, Province of China</option>
                    <option value="TJ">Tajikistan</option>
                    <option value="TZ">Tanzania, United Republic of</option>
                    <option value="TH">Thailand</option>
                    <option value="TG">Togo</option>
                    <option value="TK">Tokelau</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad and Tobago</option>
                    <option value="TN">Tunisia</option>
                    <option value="TR">Turkey</option>
                    <option value="TM">Turkmenistan</option>
                    <option value="TC">Turks and Caicos Islands</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UG">Uganda</option>
                    <option value="UA">Ukraine</option>
                    <option value="AE">United Arab Emirates</option>
                    <option value="GB">United Kingdom</option>
                    <option value="US">United States</option>
                    <option value="UM">United States Minor Outlying Islands</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistan</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VE">Venezuela</option>
                    <option value="VN">Viet Nam</option>
                    <option value="VG">Virgin Islands (British)</option>
                    <option value="VI">Virgin Islands (U.S.)</option>
                    <option value="WF">Wallis and Futuna Islands</option>
                    <option value="EH">Western Sahara</option>
                    <option value="YE">Yemen</option>
                    <option value="YU">Yugoslavia</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabwe</option>
                </select>
             <p class="help-block"></p></div>
        
		</div>
	

		<!-- region input-->
        <div class="row">
            <label class="control-label col-md-2">Region / State</label>
            <div class="col-md-3">
                <input id="region_bill" name="region" type="text"  style="border-radius:6px; height:30px; border:1px solid grey;"autocomplete="address-level1" placeholder="Region / State" class="padding-10">
                <p class="help-block"></p>
            </div>
        </div>
        <!-- city input-->
        <div class="row ">
            <label class="control-label col-sm-2 padding-10">City / Town</label>
            <div class="col-sm-6 ">
                <input id="city_bill" name="city" type="text" style="border-radius:6px; height:30px; border:1px solid grey;" autocomplete="address-level2" placeholder="City" class="padding-10">
                <p class="help-block"></p>
            </div>
        </div>
          <!-- address-line1 input--> <!-- city input-->
        <div class="row ">
            <label class="control-label col-sm-2 padding-10">Street</label>
            <div class="col-sm-6 ">
                <input id="street_bill" name="street" type="text" style="border-radius:6px; height:30px; border:1px solid grey;" autocomplete="address-level2" placeholder="Street name you live in." class="padding-10">
                <p class="help-block"></p>
            </div>
        </div>
          <!-- address-line1 input-->
        <div class="row ">
            <label class="control-label col-sm-2 padding-10">Address</label>
            <div class="col-sm-10">
                <textarea id="address-line1" name="address-line1" type="text" row="6" style="border-radius:6px; width:200px;  border:1px solid grey;" autocomplete="address-line1" placeholder="" class="padding-10"></textarea>
				 <p class="help-block"></p>
            </div>
        </div>
       	</div>
		<center class="text-danger" id="bill_info_box"></center>
    </fieldset>
</form>

			<hr>
			<input type="hidden" id="total_cost_hidden" value="<?php echo total_cost_items(); ?>" />
		</div>
		 <!-- delivery -->
		 <div class=" col-sm-12 col-md-11 col-lg-11 "style="display:none;" id="box_check_3" >
			 <div class="row padding-10"> <ul class="bootstrapWizard form-wizard">
											<li>
												<a> <span class="step">1</span> <span class="title">Your Cart</span> </a>
											</li>
											 <li>
												<a><span class="step">2</span> <span class="title">Billing info</span> </a>
											</li>
											<li class="active" data-target="#step1">
												<a href="#tab1" data-toggle="tab"> <span class="step">3</span> <span class="title">Finish</span> </a>
											</li>
											<!--<li>
												<a > <span class="step">4</span> <span class="title">Order </span> </a>
											</li>-->
										</ul> </div>
			 <br>
		     <hr>
			 <?php echo check_out_delivery(); ?>
			
			<input type="hidden" id="total_cost_hidden" value="<?php echo total_cost_items(); ?>" />
		</div>
    </div>
	<?php 
	  $query = "select cart_id FROM cart_vis WHERE account_id ='$user_id' AND order_code='0' LIMIT 1";
	  if($query4user_info = mysqli_query($link,$query))
		{
		while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
			 {
			 echo '<div class="row no-padding margin-10">
		<div class="col-sm-12 col-md-7 col-lg-7 ">
		<button id="cart_btn" style="display:none;" onclick="cart_btn()" class=" btn btn-success " value="">Cart</button> <button id="billing_info" style="display:none;" onclick="check_out_next()" class=" btn btn-success " value="">Billing Info</button>
		<!--<button id="mail_invoice" style="" onclick="mail_invoice()" class=" btn btn-success " value="">Mail invoice to my mail</button>-->
		<p class="pull-right"id="check_out_btn">Proceed to Billing Information <button  onclick="check_out_next()" class="btn btn-primary " value="">Confirm</button></p>
		<span id="save_deliver_btn_holder"><button id="save_deliver_btn" onclick="save_billing_info()"style="display:none;" class="btn btn-success pull-right" value="">Save and Deliver</button></span>
			
		</div>
		</div>';
			 }
		}
	?>
	
	<div class="col-md-6 padding-10" ><badge class="badge font-primary"><i class="fa fa-info"></i></badge> The price and availability of items on Mykanta are subject to change by the Business administrators themselves. Mykanta will make follow-ups on your behalf after completing the order. The Cart is a temporary place for keeping a list of your intend to purchase and reflects each item's most recent price.</div>
  </div>
</div>
<!--
<div class="col-sm-2">
   <div class="">
	 <div class="row">

     </div>
   </div>
</div> -->

		</div>
		<?php footer(); ?>
		<!-- END MAIN CONTENT -->

		<!-- new CHAT widget -->
		<div class=" hidden jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false" 
		data-widget-togglebutton="true" data-widget-fullscreenbutton="false" style="width:300px; position:fixed; bottom:-30px; right:20px; z-index:2;">
			<header>
				<span class="widget-icon" > <i class="fa fa-comments txt-color-white" style="line-height:2.5 !important;"></i> </span>
				<h2 id="chatTitle"> MyKanta Chat </h2>
				<div class="widget-toolbar">
					
					<a href="javascript:chatMinBtnFunc();"><span id="chatMinBtn" class="widget-icon padding-5"> <i id="chatMinBtnI" class="fa fa-plus txt-color-white"></i> </span></a>
				</div>
			</header>

			<!-- widget div-->
			<div id="chatWrapper" style="display:none;">
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<div>
						<label>Title:</label>
						<input type="text" />
					</div>
				</div>
				<!-- end widget edit box -->

				<div class="widget-body widget-hide-overflow no-padding">
					<!-- content goes here -->

					<!-- CHAT CONTAINER -->
					<div id="chat-container" class="open chat-container" style="height:230px;">
						<span class="chat-list-open-close"><i class="fa fa-user"></i><b>!</b></span>

						<div class="chat-list-body custom-scroll" style="height:230px;">
							<ul id="chat-users">
								<?php //get_onlinefriendnames($user_id); ?>
							</ul>
						</div>
					</div>

					<!-- CHAT BODY -->
					<ul id="chat-body" class="chat-body custom-scroll myChatBody" style="height:230px;">
							<li class="message" style="padding:10px; margin:10px 30px 0 0; background-color: #EAEAEA; border-left:4px solid #4C4F53;">
								<div class="message-text" style="margin:0;">
									Select a friend to chat with from the panel on the right 
								</div>
							</li>
					</ul>

					<!-- CHAT FOOTER -->
					<div class="chat-footer">
						<form name="message" action="">
							<!-- CHAT TEXTAREA -->
							<div class="textarea-div">
								<div class="typearea">
									<!--<textarea placeholder="Write a message..." id="textarea-expand" name="textarea-expand" class="custom-scroll" style="min-height:40px;"></textarea>-->
									<input type="text" name="usermsg" id="usermsg" class="custom-scroll" style="width:100%; border:none;" placeholder="Write a message..." />
								</div>
							</div>
							<!-- CHAT REPLY/SEND -->
							<span class="textarea-controls">
								<input type="submit" class="btn btn-sm btn-primary pull-right" id="submitmsg" name="submitmsg" value="Send" />
							</span>
						</form>
					</div>
					<!-- end content -->
				</div>
			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->

	</div>
	</div>
		<?php 
	//include required scripts
	include("inc/scripts_vis.php"); 
	//include footer
	//include("inc/google-analytics.php"); 
?>	


<!-- Start Chat -->
	<!-- SmartChat UI : plugin 
	<script src="/js/smart-chat-ui/smart.chat.ui.min.js"></script>
	<script src="/js/smart-chat-ui/smart.chat.manager.min.js"></script>-->
<!-- End Chat -->

<input type="hidden" id="datetime" value="<?php echo  $datetime =  date('l jS \of F Y H:i:s A');?>" /> 

<!--Chat 4 hidden inputs-->
<input type="hidden" id="hiddenId" value="" />
<input type="hidden" id="hiddenFriendId" value="" />
<input type="hidden" id="hiddenFriendName" value="" />
<input type="hidden" id="hiddenChatMinCheck" value="" /> 

<script type="text/javascript">
function use_billing_info()
{
	
				$( '#box_check_2' ).hide();
				$( '#box_check_3' ).fadeIn("slow");
			 	$( '#cart_btn' ).fadeIn("slow");
				//$( '#place_order' ).hide()
				$( '#check_out_btn' ).hide();
				$( '#save_deliver_btn' ).hide();
				$( '#mail_invoice' ).hide();
}

$('#qty_cell').bind("keydown", function(event) {
		document.getElementById("total_result").innerHTML = 'works'; // this refers to textarea element

});
		</script> 
</body>

</html>