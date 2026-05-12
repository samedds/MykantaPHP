
function reev_next()
{
	var text_reev = $( '#comment-post-text' ).val();
	if(text_reev != "")
	 {
	   $('#text_area').html('<textarea rows="1" style="margin:-5px;" id="title_reev" class="form-control" placeholder="title your reev" required></textarea>'); 
	   $('#comment_box').html('<button id="comment-post-btn" onClick="reev_click()" value="Reev" class=" btn-primary ">Reev</button><br><br><button onclick="reev_cancel();" value="" class=" btn-default"><span class="hidden-xs hidden-sm">cancel</span><i class="fa fa-times hidden-lg hidden-md "></i></button><img id="comment_load" style=" display:none;"  class="pull-right" src="/img/loading.gif"/> ');
	   $( '#text_reev_hold_val' ).val( text_reev );
	      $('#text_area').css('border' , '1px solid white');
	 }
	else if(text_reev.length < 1 )
	 {
	    $('#text_area').css('border' , '1px solid red');
	 }	
}  

function reev_click()
{  
  
 $( '#mystatus' ).html  = '<div class=""><img src="/img/loading.gif" style="width:80px; height:auto;"/></div>'; 
$('#comment-post-btn').hide();
$('#comment_load').show();
//$('#comment-post-btn').addClass('loading_gif');  
//$('#comment-post-btn').addClass('loading_gif'); 

//text ithin textare which the person has entered
	 var text = $( '#text_reev_hold_val' ).val();
	 var title_reev = $( '#title_reev' ).val();
	 var user_id = $( '#user_id' ).val();
	 var owner_id = $( '#owner_id' ).val();
	 var myfile = $( '#myfile' ).val();
	 var myfile_total = $( '#myfile_total' ).val();
	 var url_link = $( '#url_link' ).val();
	 var user_name = $( '#username' ).val();
	 var datetime = $( '#datetime' ).val();
	 
	 //Put NULL in myfile variable if undefined
	 if(text != "")
	 {
		 if (myfile == undefined || myfile == 'NULL' || myfile == "")
		 {
			 $('#comment-post-text').css('border' , '1px solid #e1e1e1');
			 
			 $.post( "/ajax/reev_post.php " ,
			   {
				   comment_insert_text_only : "comment_insert_text_only",
				   _user_id : user_id,
				   _owner_id :owner_id,
				   comment : text ,
				   title_reev : title_reev ,
				   datetime : datetime,
				   cache: false,
			   }
			  )
			  .error( function( data )
			  {
			  $('#add_image').css('border' , '3px solid #ff0000');
			  $('#comment_load').hide();
				})
				  .success(function( data )
					   {
					    $('#add_image').html("");
					    $( '#gif_uplaod_box' ).html("");
						 $('#gif_3').removeClass('col-xs-3');
						 $('#gif_3').addClass('col-xs-12');
					   	 $('#mystatus').empty();
					     $('#add_image').css('border' , '3px solid white');
					  	 $('#comment_load').hide();
						 $('#add_image').html('<hr class="no-padding hidden-xs hidden-sm" style="margin-left:-10px; border:3px solid #e1e1e1; box-shadow:inset 1px 1px 1px 1px black; width:108%;"> <em class="hidden-xs hidden-sm text-muted">Capture<em class="hidden-xs hidden-sm  text-muted" > Experiences </em> in</em> <a id="upload_modal_btn" href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" class="hidden-xs hidden-sm btn btn-default " rel="tooltip"  title="Create from images"> <i class="fa fa-camera"></i> GIF <span class="hidden-xs hidden-sm"> Motion</span> </a> <em class="hidden-xs hidden-sm text-muted"> or </em> <a  href="javascript:void(0);" onClick="only_text_reev();" class="btn btn-default hidden-xs hidden-sm" rel="tooltip"  title="Share text only"> <i class="hidden-xs hidden-sm fa fa-pencil "></i> Text <span class="hidden-xs"> Only</span></a> <a href="javascript:void(0);" class="badge hidden-xs hidden-sm inbox-badge    pull-right "  rel="tooltip" title="To share your Experience, select GIF Motion to snap pictures from camera or gallery but select Text Only if you have no Pictures. " style="background-color:#5BC0DE;  "><i class="fa fa-info hidden-xs hidden-sm"></i></a> ');
						 $( '.comment-holder-ul' ).prepend( data );
						 var post_id = $("#not_id").val();
						  setTimeout( notification_post(post_id),1000);
					   } 
					   );
		 }
		 else
		 {
		 this.myfile2 = myfile;
		 this.mytext = text;

		  if( text.length > 0 && user_id !=null )
		   {  
			$('#add_image').empty();		
			//This makes the image div disappear after comment is posted

			 $('#comment-post-text').css('border' , '1px solid #e1e1e1');
			 
			 $.post( "/ajax/reev_post.php " ,
			   {
				   task : "comment_insert",
				   _user_id : user_id,
				   _owner_id :owner_id,
				   comment : text ,
				   title_reev : title_reev ,
				   datetime : datetime,
				   myfile : myfile,
				   myfile_total : myfile_total,
		           cache: false,
			   }
			  )
			  .error( function( data )
				 { //textarea is empty
			  $('#comment-post-text').css('border' , '3px solid #ff0000');
			  $('#comment-post-btn').show(); 
			  $('#comment_load').hide();
				})
				  .success(function( data )
					   {
						
					   	  $('#mystatus').empty();
					     // comment_insert( jQuery.parseJSON( data ) );
						 // console.log( "ResponseText: " + data );
						 //remove value after button
						 $( '#comment-post-text' ).val("");
						 $( '#gif_uplaod_box' ).html("");
						 $('#gif_3').removeClass('col-xs-3');
						 $('#gif_3').addClass('col-xs-12');
						 $( '#myfile' ).val("");
						 $( '#hiddenGifImg' ).val("");
						 //document.getElementById('comment_box').innerHTML = ''; 
                       //$('#comment-post-btn').show();
						 $('#comment_load').hide();
						 $('#add_image').html('<hr class="no-padding hidden-xs hidden-sm" style="margin-left:-10px; border:3px solid #e1e1e1; box-shadow:inset 1px 1px 1px 1px black; width:108%;"> <em class="hidden-xs hidden-sm text-muted">Capture<em class="hidden-xs hidden-sm  text-muted" > Experiences </em> in</em> <a id="upload_modal_btn" href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" class="hidden-xs hidden-sm btn btn-default " rel="tooltip"  title="Create from images"> <i class="fa fa-camera"></i> GIF <span class="hidden-xs hidden-sm"> Motion</span> </a> <em class="hidden-xs hidden-sm text-muted"> or </em> <a  href="javascript:void(0);" onClick="only_text_reev();" class="btn btn-default hidden-xs hidden-sm" rel="tooltip"  title="Share text only"> <i class="hidden-xs hidden-sm fa fa-pencil "></i> Text <span class="hidden-xs"> Only</span></a> <a href="javascript:void(0);" class="badge hidden-xs hidden-sm inbox-badge    pull-right "  rel="tooltip" title="To share your Experience, select GIF Motion to snap pictures from camera or gallery but select Text Only if you have no Pictures. " style="background-color:#5BC0DE;  "><i class="fa fa-info hidden-xs hidden-sm"></i></a> ');
						 $( '#my_gif_holder' ).prepend( data );
						 var post_id = $("#not_id").val();
						  setTimeout( notification_post(post_id),10000);

					   } 
					   );
				 
				 
				 //console.log( text + user_id + owner_id + datetime +myfile);
			  }
			  else
			  {
			  //textarea is empty
			  $('#comment-post-text').css('border' , '1px solid #ff0000');
			  $('#comment-post-btn').show();
			  $('#comment_load').hide();
			  }
		}
	 }
	 else{
	 	$('#text_area').css('border' , '1px solid #ff0000');
		$('#comment-post-btn').show();	
        $('#comment_load').hide();

		
	 }
//remove value after button 
	 //$( '#comment-post-text' ).val(""); 
}


//This removes all unwanted files
function only_text_reev()
{
   //$('#gif_9').addClass('col-xs-9');
 $('#gifImg').fadeOut('slow');
		   
			$("#myfile").val('');
			 $('#gif_3').removeClass('col-xs-3');
			 $('#gif_3').addClass('col-xs-12');
			$('#hiddenGifImg').val("");
 $('#add_image').html('<hr class="" style="border:3px solid #e1e1e1; margin-left:-10px; box-shadow:inset 1px 1px 1px 1px black; width:108%;"> 	 <div class="row padding-10" id="gifImg" style="margin-top:-10px;" > <div class="col-xs-10 padding-5" id="text_area"><textarea rows="2" style="margin:0px;" id="comment-post-text" class="form-control" placeholder="share a reev" required></textarea><textarea rows="1" style="margin:-5px; display:none;" id="title_reev" class="form-control" placeholder="title your reev (optional)" required></textarea></div> <div id="comment_box" class="col-xs-2 padding-5"> <button onclick="reev_next();" value="" class=" btn-primary ">Next</button><br><br><button onclick="reev_cancel();" value="" class=" btn-default"><span class="hidden-xs hidden-sm">cancel</span><i class="fa fa-times hidden-lg hidden-md "></i></button></div></div> ');
 
}

function reev_cancel()
{
             $('#gifImg').fadeOut('slow');
		    //$('#add_image').html("");
			$("#myfile").val('');
			 $('#gif_3').removeClass('col-xs-3');
			 $('#gif_3').addClass('col-xs-12');
			 $('#hiddenGifImg').val("");
			 $('#add_image').html('<hr class="no-padding hidden-xs hidden-sm" style="margin-left:-10px; border:3px solid #e1e1e1; box-shadow:inset 1px 1px 1px 1px black; width:108%;"> <em class="hidden-xs hidden-sm text-muted">Capture<em class="hidden-xs hidden-sm  text-muted" > Experiences </em> in</em> <a id="upload_modal_btn" href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" class="hidden-xs hidden-sm btn btn-default " rel="tooltip"  title="Create from images"> <i class="fa fa-camera"></i> GIF <span class="hidden-xs hidden-sm"> Motion</span> </a> <em class="hidden-xs hidden-sm text-muted"> or </em> <a  href="javascript:void(0);" onClick="only_text_reev();" class="btn btn-default hidden-xs hidden-sm" rel="tooltip"  title="Share text only"> <i class="hidden-xs hidden-sm fa fa-pencil "></i> Text <span class="hidden-xs"> Only</span></a> <a href="javascript:void(0);" class="badge hidden-xs hidden-sm inbox-badge    pull-right "  rel="tooltip" title="To share your Experience, select GIF Motion to snap pictures from camera or gallery but select Text Only if you have no Pictures. " style="background-color:#5BC0DE;  "><i class="fa fa-info hidden-xs hidden-sm"></i></a>');

}
function comment_insert( data )
{
  var t = '';
if(myfile2 == '')
{
	t += '<li style="list-style:none;">';
	t += '<input type="hidden" id="comment_id" value="'+data.comment.comment_id+'" /> ';
	t +=  '<div class="chat-body no-padding profile-message ">';
	t +=  '<ul>';
	t +=  '<li class="message">';
	//t +=  '<img class="img-thumbnail" src="'+data.pictures.image_loc+'" width="55" />';
	//t +=  '<strong style="padding-left:45px;" >';
	//t +=  '&nbsp;&nbsp;&nbsp;&nbsp;<a href="fp.php?friend_id='+data.comment.owner_id +'&username='+data.user.username+'" class="text-primary">'+data.user.firstName+' '+data.user.secName+ '</a></strong>';
	t +=  '<p style="padding-left:10px;">'+mytext+'</p>';
	t +=  '</li>';
	t +=  '<li class="message" style="margin-top:-10px; padding-left:10px;">';
	t +=  '<ul class="list-inline font-xs " >';
	t +=  '<li class="text-primary">';
	t +=  ''+data.comment.datetime+'';
	t +=  '</li>';
	t +=  '<li>';
	//t +=  '<a href="javascript:void(0);" class="text-muted">Show All Comments (0)</a>';
	t +=  '</li>';

	t +=  '</ul>	';
	t +=  '</li>  ';
	t +=  '<br><br>  ';

	t +=  '</ul>';
	t +=  '</div>';
	t +=  '</li>';
}
else
{
t += '<li style="list-style:none;">';
	t += '<input type="hidden" id="comment_id" value="'+data.comment.comment_id+'" /> ';
	t +=  '<div class="chat-body no-padding profile-message ">';
	t +=  '<ul>';
	t +=  '<li class="message">';
	t +=  '<li style="padding-left:10px; padding-top:5px; margin-bottom:10px;">';
	t +=  '		<div class="row"><div class="col-md-5"><a class="fancybox" href="img/comments_images/mini/'+data.comment.image_loc+'.jpg" />';
	t +=  '<img class="img-thumbnail" src="img/comments_images/'+data.comment.image_loc+'.gif" width="100%"/></a></div><div class="col-md-7 well-light"style=""><span style="margin-top:-30px;" >'+data.comment.comment +'</span></div></div>';
	t +=  '</li>';
	t +=  '<li class="message" style="margin-top:-10px; padding-left:60px;">';
	t +=  '<ul class="list-inline font-xs " >';
	t +=  '<li class="text-primary">';
	t +=  ''+data.comment.datetime+'';
	t +=  '</li>';


	t +=  '</ul>	';
	t +=  '</li>  ';
	t +=  '<br><br>  ';

	t +=  '</ul>';
	t +=  '</div>';
	t +=  '</li>';
}

$( '.comment-holder-ul' ).prepend( t );

}


function notification_post(post_id)
	{
		console.log('notification - comment ont post ');
		
		//send notification
		$.post("/api/notification.php", 
		{
		postnew : "postnew",
		post_id: post_id,
		cache: false,
		}).error(function()
			{
			
			}).success(function()
			{ 
				
			});
	}