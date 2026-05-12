<?php

if(isset($_POST['collexn_tab_btn']))
{	
include "include/sessionfile.php";	
include "../include/funcxn.php";
$user_id = $_SESSION['id']	;	

gallery_user($user_id); 

}else if(isset($_POST['connecxn_tab_btn']))
{	
include "include/sessionfile.php";	
include "../include/funcxn.php";
$user_id = $_SESSION['id']	;	

get_friendnames_of_friends($user_id); 
}
else if(isset($_POST['task']))
{	
include "include/conxn.php";
include "../include/funcxn.php";
include "include/sessionfile.php";	
$post_id=	$_POST['post_id']	;	 		 	 
$query = "SELECT * FROM account_comment where id = '$post_id' ORDER BY id DESC LIMIT 1
";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = $products['account_id'];
$post_user_id = $products['account_id'];
$comment4 = $products['comment'];
$comment =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
 
$nio_hash =   str_replace(['#'], "", $comment4);
$comment_twitter = substr($nio_hash, 0, 113). '...';
$image_loc = $products['image_loc'];
$myfile_total = $products['myfile_total'];
$datetime = strtotime($products['commentDate']);
$datetime = date("D,d M Y", $datetime);
$post_id = $products['id'];
if(strlen($comment)<149)
	{ $comment1 = substr($comment, 0, 150); $comment_short = convertHashtags($comment1);}
	else{$comment1 = substr($comment, 0, 180);$comment_short = convertHashtags($comment1). '<a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a>';  }
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$query = "SELECT COUNT(id) FROM reply WHERE post_id = $post_id     
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$comment_count = $query_count[0]; $comment_count;

echo '				
<div class="padding-10 margin-10 " id="mystatus">
<ul class="list-inline">
<li class="message">
';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 2 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				<input type="hidden" value="'.$image_loc.'" id="image_loc_'.$post_id.'"></input>
				<div class="row" >
					<div class="row" id="pauser_conn'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_conn'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc_conn('.$post_id.');">
							<img class="hidden-xs hidden-sm" style="width:70px;" src="/img/loader.png" onClick="image_loc_conn('.$post_id.');">
					   </div>
					</div>
					<div class="" id="backer_conn'.$post_id.'">
						<img id="image_conn'.$post_id.'"   onClick="image_loc_pause_conn('.$post_id.');" src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" >
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
			<p class="" style="margin-left:35px;font-size:1.2em; color:white;">'.ucwords($title).'</p> 
		 
		   <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
		 
		  <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
		</div>		
			
<div class="padding-10">
  <div class="text-default row "style="margin-left:0px;">
    <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
        <ul class="list-inline padding-10">
			   <li>' , myfile_total_conn($post_id),' </li>
				   <li>   ',smiles_reev_display_info_conn($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a></li>',seen_re_post($post_id),'<li class="pull-right"style="" > <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
								<li class="  " onClick="window.open(';
										echo"'https://twitter.com/share?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
										echo'); return false;" href="https://twitter.com/share?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
									 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
									</li>
									<li class=" hidden-sm hidden-md hidden-lg ">
									 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="share/whatsapp/share"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
									</li>
									<li class="  ">
									 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
									</li>
							</ul>
           </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
    </ul>	
  </div>

<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}

else if(($myfile_total != NULL && $myfile_total == 1 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="" id="backer_conn'.$post_id.'">
						<img id="image_conn'.$post_id.'"  src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" >
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:white;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total_conn($post_id),' </li>
				   <li>   ',smiles_reev_display_info_conn($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	'
                 ,seen_re_post($post_id),'
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/share?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/share?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="share/whatsapp/share"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else 
{
	echo '<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:white;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
<div class="row" style="margin-left:0px;margin-top:0px;margin-left:15px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>   ',smiles_reev_display_info_conn($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	

				  <li class="pull-right"  style="margin-top:-10px;margin-right:20px;">			
			     <span>
				<ul style="list-style:none;">
					<li class="padding-10">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey"></i></a>
						<ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  ">
							  <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
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
</div><hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';  

}



 
}
}
else
{
echo '
<strong style="" ><a href="name link" style="" class="text-primary">Thank you for joining Mykanta</a></strong>
<p style="">Take a picture of something worth reviewing for others to know.
</p>
'; 
}
}
else if(isset($_POST['task_friend']))
{
include "include/conxn.php";	
include "../include/funcxn.php";
	include "include/sessionfile.php";
$post_id=	$_POST['post_id']	;	 		 	 
$query = "SELECT * FROM account_comment where id = '$post_id' ORDER BY id DESC LIMIT 1
";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = $products['account_id'];
$post_user_id = $products['account_id'];
$comment4 = $products['comment'];
$comment =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
 
$nio_hash =   str_replace(['#'], "", $comment4);
$comment_twitter = substr($nio_hash, 0, 113). '...';
$image_loc = $products['image_loc'];
$myfile_total = $products['myfile_total'];
$datetime = strtotime($products['commentDate']);
$datetime = date("D,d M Y", $datetime);
$post_id = $products['id'];

	if(strlen($comment)<149)
{ $comment_short = substr($comment, 0, 150); $comment1 = convertHashtags($comment_short);}
	else{$comment_short = substr($comment, 0, 180);$comment1 = convertHashtags($comment_short). '<a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a>';  }
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$query = "SELECT COUNT(id) FROM reply WHERE post_id = $post_id     
";
$query_data = mysqli_query($link,$query);
$query_count = mysqli_fetch_row($query_data);
$comment_count = $query_count[0]; $comment_count;

echo '				
<div class="padding-10 margin-10 " id="mystatus">
<ul class="list-inline">
<li class="message">
';
//Check if image location is defined						 
if(($myfile_total != NULL && $myfile_total >= 2 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="row" id="pauser_conn'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_conn'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:70px;" src="/img/loader.png" onClick="image_loc_conn('.$post_id.');">
							<img class="hidden-xs hidden-sm" style="width:70px;margin-top:100px;" src="/img/loader.png" onClick="image_loc_conn('.$post_id.');">
					   </div>
					</div>
					<div class="" id="backer_conn'.$post_id.'">
						<img id="image_conn'.$post_id.'"   onClick="image_loc_pause_conn('.$post_id.');" src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; " >
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
			<p class="" style="margin-left:15px;font-size:1.2em; color:white;">'.ucwords($title).'</p> 
		 
		   <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:10px;margin-right:30px;">'. $comment_short.'</p>
		 
		  <span class="text-muted pull-right font-xs" style="margin-right:10px;">'.$datetime.'</span> 
		</div>		
			
<div class="padding-10">
  <div class="text-default row "style="margin-left:0px;">
    <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
        <ul class="list-inline padding-10">
			   <li>' , myfile_total_conn($post_id),' </li>
				   <li>   ',smiles_reev_display_info_conn($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a></li>',seen_re_post($post_id),'<li class="pull-right"style="" > <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
								<li class="  " onClick="window.open(';
										echo"'https://twitter.com/share?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
										echo'); return false;" href="https://twitter.com/share?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
									 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
									</li>
									<li class=" hidden-sm hidden-md hidden-lg ">
									 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="share/whatsapp/share"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
									</li>
									<li class="  ">
									 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
									</li>
							</ul>
           </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
    </ul>	
  </div>

<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}

else if(($myfile_total != NULL && $myfile_total == 1 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="" id="backer_conn'.$post_id.'">
						<img id="image_conn'.$post_id.'"  src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" >
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:white;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total_conn($post_id),' </li>
				   <li>   ',smiles_reev_display_info_conn($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-12px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em; ">comment(s)</span>
						</span></a>
				  </li>	'
                 ,seen_re_post($post_id),'
				 
					<li class="pull-right"style=" " >			
					  <a href="#"data-toggle="dropdown"style="color:grey"><i class="dropdown-toggle fa fa-reorder "  ></i></a>
							 <ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  " onClick="window.open(';
									echo"'https://twitter.com/share?url=https://mykanta.com/reev_load/".$post_id."&amp;text=".$comment_twitter."',
										'Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''";
									echo'); return false;" 
											href="https://twitter.com/share?url=https://mykanta.com/reev_load/'.$post_id.'&amp;text='.$comment_twitter.'">
							 <a href="Twitter;" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Twitter</span></a>
							</li>
							<li class=" hidden-sm hidden-md hidden-lg ">
							 <a href="whatsapp://send?text='.$comment_twitter.' > ->   https://mykanta.com/reev_load/'.$post_id.'" data-action="share/whatsapp/share"> <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Share to Whatsapp</span></a>
							</li>
							<li class="  ">
							 <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
							</li>
					</ul>
   </div><div class=" padding-5" id="loading_reev'.$post_id.'"> </div>
</div>
   <div class="col-xs-12 col-sm-12 col-md-12" id="hide_reev_box'.$post_id.'" ></div>
</ul>	
</div>
<hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';
}
else 
{
	echo '<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:white;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
<div class="row" style="margin-left:0px;margin-top:0px;margin-left:15px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>   ',smiles_reev_display_info_conn($post_id),' </li>
				   <li><a href="javascript:void(0);" style="color:black;"  onclick="load_reev_comments('.$post_id.');"><span class="padding-10"> <img  class="text-default font-sm" src="/img/site_img/reev_icons/reev_c.png" style="height:22px; margin-top:-13px;" /> ',get_reply_no($post_id),'
						<span class="hidden-xs hidden-sm text-muted" style="font-size:0.9em;">comment(s)</span>
						</span></a>
				  </li>	

				  <li class="pull-right"  style="margin-top:-10px;margin-right:20px;">			
			     <span>
				<ul style="list-style:none;">
					<li class="padding-10">
						<a href="#"data-toggle="dropdown"><i class="dropdown-toggle fa fa-reorder " style="color:grey"></i></a>
						<ul class="dropdown-menu  pull-right " style="margin-top:-48px;" >
							<li class="  ">
							  <a href="/feedback/'.$post_id.'" > <span class="text-muted padding-10" style="font-size:0.9em; cursor:pointer;" >Report Abuse</span></a>
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
</div><hr class="no-margin" style="margin-left:-20px; border:3px solid #e1e1e1; box-shadow:inset 2px 2px 2px 2px #e1e1e1; width:105%;"> ';  

}
 
}
}
else
{
echo '
<strong style="" ><a href="name link" style="" class="text-primary">Thank you for joining Mykanta</a></strong>
<p style="">Take a picture of something worth reviewing for others to know.
</p>
'; 
}
}
else
if(isset($_POST['use_gif_1']))
{
include "include/conxn.php";
include "../include/funcxn.php";
include "include/sessionfile.php";	
  $post_id=$_POST['post_id'];	
   $user_id = $_SESSION['id'];
  $use_gif = $_POST['use_gif'];	

//$query1 = "UPDATE profile_pic SET gif_as_pic = ? WHERE account_id = ?";
 if($query_mail = $link->prepare("UPDATE profile_pic SET gif_as_pic = ? WHERE account_id = ?"))
							        {
									
							        //$query_mail->bind_param('s', $email);
                                     $query_mail->bind_param('si', $use_gif,$user_id);
                                     $query_mail->execute();
									 }
}
 if(isset($_POST['download_file']))
{
include "include/conxn.php";
include "../include/funcxn.php";

  $post_id=$_POST['post_id'];	

  $image_loc_raw = $_POST['image_loc'];	

  if($query_mail = $link->prepare("SELECT image_loc FROM account_comment where id = ? "))
	 {
		//$query_mail->bind_param('s', $email);
		 $query_mail->bind_param('i', $post_id);
		 $query_mail->execute();
		 $query_mail->store_result();
		 $query_mail->bind_result( $image_loc);
		 if( $query_mail->fetch()){
				$row = array( 'image_loc'=> $image_loc );
		  $image_loc =  $row['image_loc'];
		
		if($image_loc == $image_loc_raw ){
		
		$full_path = '../img/comments_images/'.$image_loc.'.gif';
		download_file($full_path);
		}
		
		else{
		}
	 }
}
}
 function download_file( $fullPath ){
header_remove(); 
  // Must be fresh start
  if( headers_sent() )
    die('Headers Sent');

  // Required for some browsers
  if(ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');

  // File Exists?
  if( file_exists($fullPath) ){

    // Parse Info / Get Extension
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);

    // Determine Content Type
    switch ($ext) {
   /*   case "pdf": $ctype="application/pdf"; break;
      case "exe": $ctype="application/octet-stream"; break;
      case "zip": $ctype="application/zip"; break;
      case "doc": $ctype="application/msword"; break;
      case "xls": $ctype="application/vnd.ms-excel"; break;
      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;*/
      case "gif": $ctype="image/gif"; break;
      case "png": $ctype="image/png"; break;
      case "jpeg":
      case "jpg": $ctype="image/jpg"; break;
      default: $ctype="application/force-download";
    }

    header("Pragma: public"); // required
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); // required for certain browsers
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    savefile( $fullPath );

  } else
    die('File Not Found');

}
?>