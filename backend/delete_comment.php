<?php
// register shop processor file for logged in user

if(isset($_POST['id']))
{

include "./conxn.php";
ob_start();
session_start();
 $me = $_SESSION['id'];
 $id = $_POST['id'];

	$sqlimageloc = "SELECT * FROM account_comment WHERE id = '$id' ";
	$queryimageloc = mysqli_query($link, $sqlimageloc);
	while ($thisImage = mysqli_fetch_assoc($queryimageloc))
	{
		include "../include/conxn.php";
		$actualimage = $thisImage['image_loc'];

		$query = "UPDATE account_comment SET owner_id ='400' WHERE id = '$id' ";
		if($doquery = mysqli_query($link, $query))
         {
		if(($actualimage != NULL) AND ($actualimage != "NULL"))
		{
			//rename('/img/comments_images/'.$actualimage.'.gif','/img/trash/'.$actualimage.'.gif');
			//echo'<script>alert("yes");</script>';
			
			echo get_status_commentol($me);
		}
		else {
	        echo get_status_commentol($me);
		}
		}
		else echo 'naaaa';
	}	
}

if(isset($_POST['id_con']))
{

include "./conxn.php";
ob_start();
session_start();
 $me = $_SESSION['id'];
 $id = $_POST['id_con'];

	$sqlimageloc = "SELECT * FROM account_comment WHERE id = '$id' ";
	$queryimageloc = mysqli_query($link, $sqlimageloc);
	while ($thisImage = mysqli_fetch_assoc($queryimageloc))
	{
		include "../include/conxn.php";
		$actualimage = $thisImage['image_loc'];

		$query = "UPDATE account_comment SET owner_id ='400' WHERE id = '$id' ";
		$doquery = mysqli_query($link, $query);
		echo 'deleted';
	}	
}


function get_status_commentol($owner_id)
{
 
include "./conxn.php";
//include "./funcxn.php";
$query = "SELECT * FROM account_comment where owner_id = $owner_id AND account_id = $owner_id  ORDER BY id DESC  LIMIT 1
";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = $products['account_id'];
$post_user_id = $products['account_id'];
$comment = $products['comment'];
$myfile_total = $products['myfile_total'];
$title_null = $products['title'];
if( $title_null != "" OR $title_null != 'NULL')
{
  $title = $products['title'];
}
$comment_twitter = substr($comment, 0, 113). '...';
$image_loc = $products['image_loc'];
$datetime = strtotime($products['commentDate']);
$datetime = date("D,d M Y", $datetime);
$post_id = $products['id'];

echo '				
<div class="no-padding" id="mystatus">
  <ul class="list-inline no-padding"  style=" margin-left:10px;">
     <li class="message ">
      ';
       //Check if image location is defined						 
       if(($image_loc != NULL) || ($image_loc != "") || (!empty($image_loc)))
			{
			echo'
			<li class="padding-10">
			<p class="text-muted"> Recent Reev</p>
				<p class="no-padding" id="gif_image_holder_'.$post_id.'"><a class="fancybox" href="/img/comments_images/'.$image_loc.'.gif" >
				<img class="img img-rounded pull-left padding-5" src="/img/comments_images/mini/'.$image_loc.'.jpg" width="50%" height="auto" alt=""/></a><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p> '. $comment.'
				</p><span class="text-muted pull-right font-xs">
				'.$datetime.'
				</span> 	
			</li>
			<div class="padding-5" style="margin-left:13px;">
			  <div class="text-default row "style=" ">
                 <div class=" col-xs-12 col-sm-12 col-md-12 padding-10 "id="load_comments'.$post_id.'" >
				   <ul class="list-inline">
				   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:30px; margin-top:-18px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm ">comment(s)</span>
						</span></a>
				  </li>	
                  <li><a href="javascript:void(0);" onclick="show_share('.$post_id.');"  style="color:black;"  >  <img  class=" font-sm" src="/img/site_img/reev_icons/reev_sh.png" ;" style="height:30px; margin-top:-18px;" />
					 <span class="hidden-xs hidden-sm ">share</span> </li>
				 <li>
						<span class="">
						 <ul class="no-padding post-share-box-social-networks social-icons"id="share_'.$post_id.'" style="margin-right:0px !important;display:none;">
								
										<li class="twitter"><a class="ttip" title="twitter" onClick="window.open(';
									echo"'http://twitter.com/share?url=http://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="http://twitter.com/share?url=http://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
											<i class="fa fa-twitter"></i></a>
										</li>
										
										<li class="google"style="margin-top:-44px;" >
											<a class="ttip hidden-md hidden-lg" href="whatsapp://send?text='.$comment_twitter.' ->   http://mykanta.com/reev_load/'.$post_id.'" data-action="share/whatsapp/share"><img src="/img/site_img/whatsapp.png" height="35"/></a>
										</li>	
								</ul>
						 </span>
					 </li>
		<li class="pull-right"style="margin-right:15px;" >			
	     <span>
			<ul style="list-style:none;">
				<li class="no-padding">
					<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-ellipsis-v " style="" ></i></a>
				
					<ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
						<li class="pull-left">
							 <p onClick="de_c('.$post_id.');"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Delete</span></p>
                <p onClick="report_abuse('.$post_id.');"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></p>
             	</li>
					</ul>
				</li>
			 </ul>
		</span>
	</li>
</ul>
	</a>
   
    
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  </ul>
</div>
<hr class="no-margin" style="margin-top:-30px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">
';
}
else {echo '<li class=" padding-10 ">
<div class="row padding-10 ">
<p class="text-muted"> Recent Reev</p>
<p class="" ><p class="no-margin" style="font-size:1.2em; color:black;">'.ucwords($title).'</p>'. $comment.'<span class="text-muted pull-right font-xs">'.$datetime.' </span></p>	

<div class="">
<div class="row no-padding">
</li>
<div class="no-padding">
<div class="text-default row padding-5"style="">

   <div class=" col-xs-12 col-sm-12 col-md-12 no-padding" id="load_comments'.$post_id.'" >
     <ul class="list-inline">
				   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:30px; margin-top:-18px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm ">comment(s)</span>
						</span></a>
				  </li>	
	
	
	<li class="pull-right" style="margin-right:20px;">	
     <span>
	<ul class="pull-right" style="list-style:none;">
		<li class="no-padding">
			<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-ellipsis-v " style="" ></i></a>
		
			<ul class="dropdown-menu no-padding pull-right " style="margin-top:-48px;" >
				<li class="pull-left">
                  	 <p onClick="de_c('.$post_id.');"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Delete</span></p>
                <p onClick="report_abuse('.$post_id.');"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></p>
             	
             	  </li>
			</ul>
		</li>
	 </ul>
    </span>
	</li>
</ul>
   </div>
   <div class=" padding-5" id="loading_reev'.$post_id.'"></div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
  </ul>	
</div>
<hr class="no-margin" style="margin-top:-30px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;">
';  
}
}
}
else
{echo '<div class="row margin-10 padding-10"><center style="padding-10" ><p class="headline " style="color:black; font-size:1.6em;"> Welcome to mykanta</p><p class="font-sm" style="color:grey; font-size:1.0em;">Mykanta social is all about Sharing Experiences in Motion Pictures we call "Reev" with people around the world.</p> <a id="upload_modal_btn" href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" class="btn btn-default " rel="tooltip"  title="Create from images"> <i class="fa fa-camera"></i> Create your First Reev </a>  </center></div>

';
}
}

function myfile_total($post_id)
{
include "./conxn.php";

$thisUser = $_SESSION['id'];
//selecting all of reev
$queryq = "SELECT * FROM account_comment WHERE id = '$post_id'";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser) >= 1)
	{
	while($flik_info = mysqli_fetch_assoc($queryuser))
		{
		$number_of_smiles =$flik_info['myfile_total'];
		$image_loc =$flik_info['image_loc'];
		$id =$flik_info['id'];
		
		if($image_loc == NULL OR $image_loc == '' OR $image_loc == 'NULL' OR $image_loc == "" )
		{
		 echo '';
		}else if($number_of_smiles >= '2' OR $number_of_smiles >= 2 )
		{
		 echo '<span class="" id="play_pause'.$id.'"><img  class="text-muted font-sm" src="/img/site_img/reev_icons/reev_p.png" onClick="image_loc('.$id.');" style="height:30px; margin-top:-18px;" /></span><span class="">+'. $number_of_smiles.'</span><input type="hidden" id="image_loc_'.$id.'" value="'.$image_loc.'" />  ';
		}else
		{
		 echo '<span class=""><img  class="text-muted font-sm" src="/img/site_img/reev_icons/reev_ca.png"  style="height:30px; margin-top:-18px;" /></span><span class="">+1</span> ';
		}
		}
	}
		
}
function smiles_reev_display_info($post_id)
{
include "./conxn.php";

$thisUser = $_SESSION['id'];
//selecting all of reev
$queryq = "SELECT number_of_smiles FROM smiles_reev
WHERE reev_id = '$post_id' ORDER BY id DESC LIMIT 1";
$queryuser = mysqli_query($link,$queryq);
if($query_q = mysqli_num_rows($queryuser)>=1)
	{
	while($flik_info = mysqli_fetch_array($queryuser,MYSQLI_ASSOC))
		{
		 $number_of_smiles =$flik_info['number_of_smiles'];
		 
		//checking if user smiled at reev
		$queryc = "SELECT id FROM smiles_reev
		WHERE user_id = '$thisUser' AND reev_id = '$post_id'";
		$queryuser1 = mysqli_query($link,$queryc);
		if($query_c = mysqli_num_rows($queryuser1)>=1)
			{
			 echo '<span id="smile_box'.$post_id.'"><img  class="" src="/img/site_img/smiles/smile_3.png" style="height:30px; margin-top:-18px;"/> '. $number_of_smiles.' <span class="hidden-xs hidden-sm "> smile(s)</span></span>';
			}
			else
			{
			echo '<span id="smile_box'.$post_id.'"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:30px; margin-top:-18px;"onClick="smile_ico('.$post_id.');" /> '. $number_of_smiles.' <span class="hidden-xs hidden-sm "> smile(s)</span></span>';
			}
		}
	}
	else
			{
			echo '<span id="smile_box'.$post_id.'"><img  class="" src="/img/site_img/smiles/smile_1.png" style="height:30px; margin-top:-18px;"onClick="smile_ico('.$post_id.');" /> 0<span class="hidden-xs hidden-sm "> smile(s)</span></span>';
			}
}


function get_reply_no($post_id)
{include "./conxn.php";

$query = "SELECT COUNT(id) FROM reply WHERE post_id = $post_id     
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$comment_count = $query_count[0];
echo $comment_count;
}

?>