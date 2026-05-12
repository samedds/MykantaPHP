<?php
include "include/conxn.php";
include "../sessionfile.php";
if(isset($_SESSION['id']))
{
if(isset($_POST['task']))
{
include "include/conxn.php";
include "../include/funcxn.php";
 
$new_string = array(); 
$datetime =  date('Y\-m\-d\ H:i:s');  
$user_id = $_SESSION['id'];
$comment_txt = mysqli_real_escape_string($link,($_POST['comment']));
$comment_txttt =htmlentities($comment_txt, ENT_QUOTES);
$string = safe_input($_POST['comment']);
//$single_tag = reveal_hashtags_level($string);
             $matches = array();
			 
				if (preg_match_all('/#([^\s]+)/', $string, $matches)) 
				 {  $count =count($matches[0]);
				//  print_r($matches[1][1]);
				   for ($x = 0;$x < $count ;$x++)
					{
					  $matches[1][$x];
					
					  array_push($new_string, $matches[1][$x]);
                     
					  //--------------------------
					}  
				 }
					
					  $countries = array_unique($new_string);
		              $count =count($countries);
					  for ($x = 0;$x < $count ;$x++)
			             {
							//here
							$new_string[$x];
							  
							  if($query_sub =  $link->prepare("SELECT amount FROM hashtag WHERE tag = ?;"))
								{   $query_sub->bind_param('s',$new_string[$x] );
								 if(  $query_sub->execute( ) )
								   {
									   $query_sub->store_result();
									   $query_sub->bind_result( $amount);
									 
									 if( $query_sub->fetch() )
									  {   
									      $row = array('amount'=> $amount);
                                        $amount =  $row['amount'];  
										  $new_amount = $amount + 1;
										// echo 'xxxxxxxxxxxxxxxx'. $new_string[$x];
										  
										  $querysatus4 =  "UPDATE hashtag SET amount = ? WHERE tag = ? LIMIT 1";
									    	$querysatus = $link->prepare($querysatus4);
											$querysatus->bind_param('is', $new_amount,$new_string[$x]);
											if( $querysatus->execute())
												{  
												 // echo 'updated';
												}
									  }
								   else 
									 { 
									// echo ' #'. $new_string[$x];
                                       
                                       $id = NULL;
                                       $amount = '1';
                                       $query_ = "INSERT INTO hashtag (id,amount,tag,datetime)VALUES( ?, ?, ?, ?)";
							           if( $query_reg = $link->prepare($query_))
							         	{ 
								         $query_reg->bind_param("iiss", $id,$amount,$new_string[$x],$datetime);
										 if($query_reg->execute())
										  {
                                              //echo 'inerted';
									      }
										}  
                                    

									}		


									
								   }else echo 'not execute';
							   }else echo 'not prepared';
							}
					  
 
$myfile = $_POST['myfile'];
$myfile_total = $_POST['myfile_total'];
$title_reev = safe_input($_POST['title_reev']);
//$datetime = $_POST['datetime'];
$id = 'NULL';
//collecting the owner of the reev
 $query_reg = "INSERT INTO account_comment (id, myfile_total, comment, title, image_loc, owner_id, account_id, commentDate) VALUES (?,?,?,?,?,?,?,?) ";	
 
 if( $querysa = $link->prepare($query_reg))
	{
	   $querysa->bind_param('iisssiis',$id, $myfile_total,$string,$title_reev,$myfile,$user_id,$user_id,$datetime);
	    $querysa->execute();
	
	 return get_status_commentol($user_id);
	}
	
	else echo 'naaaaaaaaaaa';

	
	
	
	
			 return get_status_commentol($user_id);
		//	}
	
}

if(isset($_POST['comment_insert_text_only']))
{
include "include/conxn.php";

include "../include/funcxn.php";
 $new_string = array(); 
$datetime =  date('Y\-m\-d\ H:i:s');  
$user_id = $_SESSION['id'];
$comment_txt = safe_input($_POST['comment']);

//$comment_txttt =htmlentities($comment_txt, ENT_QUOTES);

//$new_str  = preg_replace('  ', '\n', $comment_txt);
$title_reev = safe_input($_POST['title_reev']);
//$datetime = $_POST['datetime'];
$string = safe_input($_POST['comment']);
$matches = array();


if (preg_match_all('/#([^\s]+)/', $string, $matches)) 
				 {  $count =count($matches[0]);
				//  print_r($matches[1][1]);
				   for ($x = 0;$x < $count ;$x++)
					{
					  $matches[1][$x];
					
					  array_push($new_string, $matches[1][$x]);
                     
					  //--------------------------
					}  
				 }
					
					  $countries = array_unique($new_string);
		              $count =count($countries);
					  for ($x = 0;$x < $count ;$x++)
			             {
							//here
							$new_string[$x];
							  
							  if($query_sub =  $link->prepare("SELECT amount FROM hashtag WHERE tag = ?;"))
								{   $query_sub->bind_param('s',$new_string[$x] );
								 if(  $query_sub->execute( ) )
								   {
									   $query_sub->store_result();
									   $query_sub->bind_result( $amount);
									 
									 if( $query_sub->fetch() )
									  {   
									      $row = array('amount'=> $amount);
                                        $amount =  $row['amount'];  
										  $new_amount = $amount + 1;
										// echo 'xxxxxxxxxxxxxxxx'. $new_string[$x];
										  
										  $querysatus4 =  "UPDATE hashtag SET amount = ? WHERE tag = ? LIMIT 1";
									    	$querysatus = $link->prepare($querysatus4);
											$querysatus->bind_param('is', $new_amount,$new_string[$x]);
											if( $querysatus->execute())
												{  
												 // echo 'updated';
												}
									  }
								   else 
									 { 
									// echo ' #'. $new_string[$x];
                                       
                                       $id = NULL;
                                       $amount = '1';
                                       $query_ = "INSERT INTO hashtag (id,amount,tag,datetime)VALUES( ?, ?, ?, ?)";
							           if( $query_reg = $link->prepare($query_))
							         	{ 
								         $query_reg->bind_param("iiss", $id,$amount,$new_string[$x],$datetime);
										 if($query_reg->execute())
										  {
                                              //echo 'inerted';
									      }
										}  
                                    

									}		


									
								   }else echo 'not execute';
							   }else echo 'not prepared';
							}
					  


$date_now = date('Y\-m\-d\ H:i:s');
$datet = strtotime($date_now);
$image_loc_1 = hash("sha256",$datet);
$nopw = substr($image_loc_1, 4,8); 
$nopw2 = substr($image_loc_1,2, 4); 
$ready = $nopw.$user_id.$nopw2;
$myfile_total = '0';
$id = 'NULL';
//collecting the owner of the reev
 $query_reg = "INSERT INTO account_comment (id, myfile_total, comment, title, image_loc, owner_id, account_id, commentDate) VALUES (?,?,?,?,?,?,?,?) ";	
 
 if( $querysa = $link->prepare($query_reg))
	{
	   $querysa->bind_param('iisssiis',$id, $myfile_total,$comment_txt,$title_reev,$ready,$user_id,$user_id,$datetime);
	    $querysa->execute();
	
	 return get_status_commentol($user_id);
	}
	
	else echo 'naaaaaaaaaaa';
}


} else echo '  Please to Post';

			  

			function reveal_hashtags_level($string)
			{
			  $matches = array();
			 
				if (preg_match_all('/#([^\s]+)/', $string, $matches)) 
				 {  $count =count($matches[0]);
				//  print_r($matches[1][1]);
				   for ($x = 0;$x < $count ;$x++)
					{
					 print $matches[0][$x];
					 //  $rt[$x][$z] = $m[$z][$x];
					}  // echo 'meeeeee ';
				 }
			}
			 
function get_status_commentol($owner_id)
{
include "./conxn.php";
//include "./funcxn.php";
$query = "SELECT * FROM account_comment where owner_id = $owner_id   ORDER BY id DESC  LIMIT 1
";
$query_add = mysqli_query($link,$query);
if( mysqli_num_rows($query_add)>0)
{
while($products = mysqli_fetch_assoc($query_add))
{
$account_id = $products['account_id'];
$post_user_id = $products['account_id'];
$comment4 = $products['comment'];
$post_id = $products['id'];
$comment =   str_replace(['\r\n', '\r', '\n'], "<br/>", $comment4);
$comment_twitter = substr($comment4, 0, 113). '...';
if(strlen($comment)<149)
	{ $comment1 = substr($comment, 0, 150); $comment_short = convertHashtags($comment1);}
	else{$comment1 = substr($comment, 0, 180);$comment_short = convertHashtags($comment1). '<a style="font-size:0.8em;cursor:pointer;" onclick="load_reev_text_more('.$post_id.');" > Read more..</a>';  }
$myfile_total = $products['myfile_total'];
$title_n= $products['title'];
$title_null =   str_replace(['\r\n', '\r', '\n'], " ", $title_n);
if( $title_null != "" OR $title_null != 'NULL')
{
$title = stripslashes(convertHashtags($title_null));
}
$comment_twitter = substr($comment_short, 0, 113). '...';
$image_loc = $products['image_loc'];
$datetime = strtotime($products['commentDate']);
$datetime = date("D,d M Y", $datetime);


echo '				
<div class="no-padding" id="mystatus">
  <ul class="list-inline no-padding"  style=" margin-left:10px;">
     <li class="message ">
      ';
       //Check if image location is defined						 
  if(($myfile_total != NULL && $myfile_total >= 2 ))
{
echo'<li class="no-padding" style=" width:100%; height:auto;" >
				
				<div class="row" >
					<div class="row" id="pauser'.$post_id.'">
						<div class=" right-image right-image-last" id="gif_image_holder_'.$post_id.'">
							<img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('.$post_id.');">
							<img class="hidden-xs hidden-sm" style="width:70px;" src="/img/loader.png" onClick="image_loc('.$post_id.');">
					   </div>
					</div>
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"   onClick="image_loc_pause('.$post_id.');" src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" >
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
			<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
		 
		   <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
		 
		  <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
		</div>		
			
<div class="padding-10">
  <div class="text-default row "style="margin-left:0px;">
    <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
        <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
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
					<div class="" id="backer'.$post_id.'">
						<img id="image_'.$post_id.'"  src="/img/comments_images/mini/'.$image_loc.'.jpg" style=" width:100%; height:auto; z-index:-1;" >
					</div>
				</div>
	</li>
		<div class="row padding-10" style=" ">
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
			
<div class="padding-10">
<div class="text-default row "style="margin-left:0px;">

   <div class=" col-xs-12 col-sm-12 col-md-12 "id="load_comments'.$post_id.'" >
    <ul class="list-inline padding-10">
			   <li>' , myfile_total($post_id),' </li>
				   <li>   ',smiles_reev_display_info($post_id),' </li>
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
		<p class="" style="margin-left:35px;font-size:1.2em; color:black;">'.ucwords($title).'</p> 
	 
	 <p id="load_reev_text_more'.$post_id.'" class="padding-5" style="margin-left:30px;margin-right:30px;">'. $comment_short.'</p>
	 
	 <span class="text-muted pull-right font-xs" style="margin-right:30px;">'.$datetime.'</span> 
	</div>		
<div class="row" style="margin-left:0px;margin-top:0px;margin-left:15px;">
   <div class=" col-xs-12 col-sm-12 col-md-12 padding-10"id="load_comments'.$post_id.'" >
       <ul class="list-inline">
				   <li>   ',smiles_reev_display_info($post_id),' </li>
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
{echo '<div class="row margin-10 padding-10"><center style="padding-10" ><p class="headline " style="color:black; font-size:1.6em;"> Welcome to mykanta</p><p class="font-sm" style="color:grey; font-size:1.0em;">Mykanta social is all about Sharing Experiences in Motion Pictures we call "Reev" with people around the world.</p> <a id="upload_modal_btn" href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" class="btn btn-default " rel="tooltip"  title="Create from images"> <i class="fa fa-camera"></i> Create your First Reev </a>  </center></div>

';
}
}

?>
				 