<?php include "include/conxn.php";

function verification_text($shop_id)
{	include "include/conxn.php";
	$query = "SELECT type FROM verify WHERE shop_id = '$shop_id' LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['type'];
		 
		 if( $v_code >= 1)
		 { echo $verify_type = '<span class="text-success"> Verified </span>';}
		 
		 else if( $v_code == 0)
		 {echo  $verify_type = '<span class="text-warning"> Pending</span>';}
		 else 
		 {
		 echo '<span class="text-danger">Not Verified</span>';
		 }
		}
	}
	else 
		 {
		 echo ' <span class="text-danger">Not Verified</span>';
		 }
		 
}

function registration_date($shop_id)
{	include "include/conxn.php";
	$query = "SELECT datetime FROM shop WHERE shop_id = '$shop_id' LIMIT 1  ";
	;
if($query_runNew = mysqli_query($link,$query))
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $datetime = $query_run_verify['datetime'];
		 //$datetime = date( $v_code);
		echo $datetime_str =  strtotime( $datetime);
		
	   }
	}
	
}
function verification_date($shop_id)
{	include "include/conxn.php";
	$query = "SELECT datetime FROM verify WHERE shop_id = '$shop_id' AND type>=1 LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['datetime'];
		// $datetime = date( $v_code);
		 $datetime_str =  strtotime( $v_code);
		 $new_date = $datetime_str;
		 $datetime_2 = date("d M, Y H:i:s", $new_date);
		 echo $verify_type = '<span class="text-success"> '. $datetime_2.' </span>';
	   }
	}
	else 
		 {
		 echo ' <span class="text-danger">N/A</span>';
		 }
		 
}

function verification_expiry($shop_id)
{	include "include/conxn.php";
	$query = "SELECT datetime FROM verify WHERE shop_id = '$shop_id' AND type>=1 LIMIT 1  ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['datetime'];
		 $datetime = date( $v_code);
		 $datetime_str =  strtotime( $datetime);
		 $new_date = $datetime_str + 32900000;
		 $datetime_2 = date("d M, Y H:i:s", $new_date);
		 echo $verify_type = '<span class="text-success"> '. $datetime_2.' </span>';
	   }
	}
	else 
		 {
		 echo ' <span class="text-danger">N/A</span>';
		 }
		 
}

function hits_flow_bus($shop_id)
{	include "include/conxn.php";
	$query = "SELECT date,hits FROM hits WHERE shop_id = '$shop_id'  ORDER BY date DESC LIMIT 5 ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $v_code = $query_run_verify['date'];
		 $hits = $query_run_verify['hits'];
		
		 $datetime_str =  strtotime( $v_code);
		
		 $datetime_2 = date("D d M,y", $datetime_str);
		 echo $verify_type = '<span class="" style="font-size:0.7em;">'. $datetime_2.' <span><br>
		 
		   <div class=" no-padding bar" style="width:'.$hits.'px; max-width:240px;"></div> '.$hits.' Hits
		  
		</span></span><hr class="text-primary no-margin">';
	   }
	   echo '';
	}
	else 
		 {
		 echo ' <span class="text-danger">N/A</span>';
		 }
		 
}


function new_visitor($shop_id)
{	include "include/conxn.php";

  //  $current_date = date("y\-m\-d\ H:m:s");		
	$query = "SELECT datetime FROM views WHERE shop_id = '$shop_id' ORDER BY datetime DESC LIMIT 1 ";
	$query_runNew = mysqli_query($link,$query);
	if(mysqli_num_rows($query_runNew) >= 1)
	{
	  while ($query_run_verify = mysqli_fetch_array($query_runNew,MYSQLI_ASSOC))
	    {
		 $datetime = $query_run_verify['datetime'];
		//echo $hits = $query_run_verify['hits'];
		 $datetime_str =  strtotime( $datetime);
		 $current_date = date("y\-m\-d\ H:m:s");		
		echo $current_date_str =  strtotime( $current_date);
         echo $business_reg_date = registration_date($shop_id); 
         $business_reg_date_new = $current_date_str - $business_reg_date ; 
		$new_date = $business_reg_date_new / 8200;
		 $total_visitors = get_shop_views_no($shop_id);
		  $datetime_process = $current_date_str - $datetime_str ;
		 
		 
		 
		echo  $verify_type = '<span class="" style="font-size:0.7em;">'. $datetime_process.' days <span><br>
		 
		   <div class=" no-padding bar" style="width:'.$datetime_process.'0px; max-width:240px;"></div>past date '.$business_reg_date.' 
		  
		</span></span><hr class="text-primary no-margin">';
	   }
	   echo '';
	}
	else 
		 {
		 echo ' <span class="text-danger">N/A</span>';
		 }
		 
}

$query = "SELECT COUNT(product_id) FROM product WHERE shop_id = '$shop_id' AND mode >= 1";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$view_count = $query_count[0];


$query0 = "SELECT COUNT(product_id) FROM product WHERE shop_id = '$shop_id' AND mode < 1";
$query_data0 = mysqli_query($link,$query0);
$query_count0 = mysqli_fetch_row($query_data0);
$view_count0 = $query_count0[0];

 $date =  date('Y\-m\-d\ ');
$query01 = "SELECT hits FROM hits WHERE shop_id = '$shop_id' AND date = '$date'";
$query_data01 = mysqli_query($link,$query01);
$query_count01 = mysqli_fetch_array($query_data01);
$view_count01 = $query_count01['hits'];


 $date =  date('Y\-m\-d\ ');
$query012 = "SELECT hits FROM hits_items WHERE shop_id = '$shop_id' AND date = '$date'";
$query_data012 = mysqli_query($link,$query012);
$query_count012 = mysqli_fetch_array($query_data012);
$view_count012 = $query_count012['hits'];


echo  '<div class="row padding-10 " style="background-color:#e4e4e4; border-radius:10px;"> 
   <div class="col-md-6 "> 
     <div class="row "> 
       <div class="col-xs-5 col-md-4 "> 
		<img src="/img/site_img/verified_overview.png" width="110" class="padding-5"/>
	   </div>
	   <div class="col-xs-7 col-md-8 " >
        <p><strong class="text-primary" style="font-size:1.0em;"> Verification </strong></p>	   
		 <p class="text-muted" style="font-size:0.9em;">
		 Status :
		 <span > ',verification_text($shop_id),'</span>
		</p>
		<p class="text-muted" style="font-size:0.9em;">Verified Date : ',verification_date($shop_id),'
		</p>
		<p class="text-muted" style="font-size:0.9em;">
		Expiring Date : ',verification_expiry($shop_id),'
		</p>	
		<!--<a href="" class="text-success">
				<img src="/img/site_img/approved.png" style="height:15px;"/> Verify Now
		</a>-->		
	  </div>
	 </div>
	 </div>
	 <div class="col-md-6  "> 
     
		
		
		 <div class="row "> 
       <div class="col-xs-5 col-md-4 "> 
		<img src="/img/site_img/product_overview.png" width="100" class=""/>
	   </div>
	   <div class="col-xs-7 col-md-8  " >
          <p><strong class="text-primary" style="font-size:1.0em;"> Product/Service </strong></p>
		 <p class="" style="font-size:0.9em;">
		 <span class="text-muted" >  Number of Items :</span>
		<span class="text-default" > '.$view_count.'</span>
		</p>
		<p style="font-size:0.9em;">
		    <span class="text-muted" >  Hidden Items :</span>
		<span class="text-default" > '.$view_count0.'</span>
		</p>
			
	  </div>
	 </div>
     </div>
</div><br>
       <div class="row padding-10" style=" background-color:#e4e4e4; border-radius:10px; ">

	<div class="col-xs-5 col-md-2  "> 
		<img src="/img/site_img/hits_overview.png" width="100"class=""/>
	   </div>
	    <div class="col-xs-7 col-md-4 " >
 	      <p><strong class="text-primary strong" style="font-size:1.1em;"> Hits</strong></p>
		 <p style="font-size:0.9em;">
		   <span class="text-muted">Business page Hits :</span>
		 <span class="text-default"> ',hits_business($shop_id),'</span>
		</p>
		<p style="font-size:0.9em;">
		   <span class="text-muted">Product/Service pages Hits :</span>
		 <span class="text-default"> ',hits_products($shop_id),'</span>
		</p>
		<p style="font-size:0.9em;">
		   <em class="text-muted">Today Business page Hits :</em>
		 <span class="text-default">  '.$view_count01.'</span>
		</p>
		
        <p style="font-size:0.9em;">
		   <em class="text-muted">Today Product/Service page Hits :</em>
		 <span class="text-default">  '.$view_count012.'</span>
		</p>	
        <p class="text-default" style="font-size:0.9em;"><a href="javascript:void(0);" class="badge inbox-badge" style="background-color:#5BC0DE;  "> <i class="fa fa-info"></i>	 </a> Promote your business page and get more hits.</p>		
	  </div>
	  <div class="col-md-6">
	  <p><strong class="text-primary strong"> Previous Daily Hits</strong></p>
		  ',hits_flow_bus($shop_id),'
	 </div>
	 </div>
	 <br>
	
<div class="row " >
  <div class="col-md-6 padding-10" style="  background-color:#e4e4e4; border-radius:10px; ">
     <div class="row padding-10" >  <div class="col-xs-5 col-md-4 "> 
		<img src="/img/site_img/visitors_overvew.png"width="100" class=""/>
	   </div>
	   <div class="col-xs-7 col-md-8  " >
         <p><strong class="text-primary style="font-size:1.2em;"">Unique Visitors</strong></p>	   
		 <p style="font-size:0.9em;">
		  <span class="text-muted" >Unique Visitors : </span>
		 <span style="font-color:black" > ',get_shop_views_no($shop_id),' people</span>
		</p>
		 <p style="font-size:0.9em;">
		  <span class="text-muted" >User Visit :</span>
		 <span style="font-color:black" > ',get_shop_views_myknata($shop_id),' people</span>
		</p> <p style="font-size:0.9em;">
		  <span class="text-muted" >Public Visitors :</span>
		 <span style="font-color:black" > ',get_shop_views_public($shop_id),' people</span>
		</p>
		<p class="text-default" style="font-size:0.9em;"><a href="javascript:void(0);" class="badge inbox-badge" style="background-color:#5BC0DE;  "> <i class="fa fa-info"></i>	 </a> Promote your business page to get more visitors and subscribers.</p>			
	  </div>
	</div>
	</div>
	  
	 </div>

';
?>