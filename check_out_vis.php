<?php 
ini_set('session.cookie_httponly',true);
ob_start();
@session_start();
include "include/funcxn_vis.php";
if(isset($_SESSION['vis_id']))
{
 //$_SESSION['vis_id'];
 $user_id = $_SESSION['vis_id'];
$account_id = $_SESSION['vis_id'];
}
else if(!isset($_SESSION['vis_id']))
{
$datetime = date('j F Y h:m:s a');
$hash_time = hash("sha256",$datetime);
$prduct_name_short = substr($hash_time, 0, 10);
$_SESSION['vis_id'] = $prduct_name_short;
 $user_id = $_SESSION['vis_id'];
}

include "include/check_out_process_vis.php";
?>
<html lang="en-us">
<meta charset="utf-8" />
<head>
  <title>Check Out</title>
  	<link rel="canonical" href=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" href="/img/mk.png" type="image/x-icon"/>
	<meta property="og:locale" content="en_US"/>
	    <meta property="og:type" content="article"/>
	    <meta property="og:title" content=""/>
	    <meta property="og:description" content=""/>
	    <meta property="og:url" content=""/>
	    <meta property="og:site_name" content="MyKanta"/>
	    <meta property="article:author" content="MyKanta"/>
	    <meta property="article:tag" content="image"/>
	    <meta property="article:section" content="Business"/>
	    <meta property="article:published_time" content=""/>
	    <meta property="og:image" content=""/>
		<meta name="description" content="">
		<meta name="author" content="">
	<noscript>
	   <meta http-equiv="refresh" content="0;URL=www.mykanta.com">
	</noscript>	<script type= "text/javascript" src = "/js/live_edit_cart_vis.js"></script>

	<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/add_to_cart_vis.js"></script>
	<style type="text/css"> 
	.loading_gif
	{
	background:url(/img/loading.gif) no-repeat 50% 50%;
	}
	.myscroll{
overflow: auto !important;
}
	</style>

	<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">
	<link rel="stylesheet" type="text/css" media="screen" href="/css/mykanta.css"/>
</head>
<body class="fixed-header ">
	<?php include "inc/visitor_header.php";?>
	<?php nav();?>
	
<div id="main" role="main">
	<div id="" style="">
    <div class="row padding-10"style="">
<div class="col-sm-12 " >
  <div class=""style="margin-left: 10px;">
    <div class="row ">
	<div class="col-sm-12 col-md-7 col-lg-7"id="box_check_1">
			<div class="row padding-10"> <ul class="bootstrapWizard form-wizard">
											<li class="active" data-target="#step1">
												<a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Your Cart</span> </a>
											</li>
											<li>
												<a> <span class="step">2</span> <span class="title">Billing info </span> </a>
											</li>
											<li>
												<a> <span class="step">3</span> <span class="title">Finish</span> </a>
											</li>
											<!--	<li>
												<a > <span class="step">4</span> <span class="title">Order </span> </a>
											</li> -->
										</ul> </div><br>
		 <table id="dt_basic" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Product Name</th>
			    <th class="hidden-xs hidden-sm">Business</th>
			    <th class="hidden-xs hidden-sm">Option</th>
				<th class="">Price</th>
				<th class="">Quantity</th>
				<th> Total </th>
				</th><th > 
				
			</tr>
		</thead>
				<tbody>
					<?php echo check_out_process(); ?>
				</tbody>
				<tbody>
					<th>Total </th>
					<th class="hidden-xs hidden-sm"> </th><th> </th><th class="hidden-xs hidden-sm" > </th><th > </th><th id="total_result">GHS <?php echo total_cost_items(); ?></th></th><th > 
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
												<a href="#tab1" data-toggle="tab"> <span class="step">2</span> <span class="title">Billing info </span> </a>
											</li>
											<li>
												<a> <span class="step">3</span> <span class="title">Finish</span> </a>
											</li>
											<!--	<li>
												<a > <span class="step">4</span> <span class="title">Order </span> </a>
											</li> -->
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
		
		</div>
		 <!-- delivery -->
		 <div class=" col-sm-12 col-md-11 col-lg-11 padding-10 "style="display:none;" id="box_check_3" >
			 <div class="row padding-10"> <ul class="bootstrapWizard form-wizard">
											<li>
												<a> <span class="step">1</span> <span class="title">Your Cart</span> </a>
											</li>
											 <li>
												<a><span class="step">2</span> <span class="title">Billing info </span> </a>
											</li>
											<li class="active" data-target="#step1">
												<a href="#tab1" data-toggle="tab"> <span class="step">3</span> <span class="title">Finish</span> </a>
											</li>
										<!--	<li>
												<a > <span class="step">4</span> <span class="title">Order </span> </a>
											</li> -->
										</ul> </div>
			 <br>
		     <hr>
			 <?php echo check_out_delivery(); ?>
			
			<input type="hidden" id="total_cost_hidden" value="<?php echo total_cost_items(); ?>" />
		</div>
    </div><div class="row no-padding margin-10">
		<div class="col-sm-12 col-md-7 col-lg-7 ">
		<button id="cart_btn" onclick="cart_btn();" class=" btn btn-success ">Cart</button> 
	<?php 
	  $query = "select cart_id FROM cart_vis WHERE account_id ='$user_id' AND order_code='0' LIMIT 1";
	  if($query4user_info = mysqli_query($link,$query))
		{
		while($allpalls_info = mysqli_fetch_array($query4user_info,MYSQLI_ASSOC))
			 {
			 echo '<button id="billing_info" style="display:none;" onclick="check_out_next();" class=" btn btn-success " value="">Billing Info</button>
		<button id="mail_invoice" style="" onclick="mail_invoice()" class=" btn btn-success " value="">Mail invoice to my mail</button>
		<p class="pull-right"id="check_out_btn">Proceed to Delivery <button  onclick="check_out_next();" class="btn btn-primary " value="">Confirm</button></p>
		<button id="save_deliver_btn" onclick="save_billing_info()" style="display:none;" class="btn btn-success pull-right" value="">Save and Deliver</button>		
			
		';
			 }
		}
	?></div>
		</div>
		<div class="col-md-6 padding-10" ><badge class="badge font-primary"><i class="fa fa-info"></i></badge> The price and availability of items on Mykanta are subject to change by the Business administrators themselves. Mykanta will make follow-ups on your behalf after completing the order. The Cart is a temporary place for keeping a list of your intend to purchase and reflects each item's most recent price.</div>
 
	
  </div><br>
</div>
</div>
	</div><?php  include "inc/footer.php"; ?>
</div> 


<?php chat_box(); ?>
<?php 
include("inc/scripts_vis.php"); 
//include("inc/google-analytics.php"); 
?>

<script type="text/javascript">
//$('#qty_cell').bind("keydown", function(event) {
	//	document.getElementById("total_result").innerHTML = 'works'; // this refers to textarea element
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
//});
		</script> 
<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div id="modal-body-prd" class="modal-body-prd padding-10 ">
			
			</div>
		</div>
	</div>
</div>
</body>
</html>