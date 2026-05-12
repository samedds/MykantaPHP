$( document ).ready( function(){

  //this will fire once the page has been fully loaded
  
  $( '#shop_comment-post-btn' ).click(function(){
     shop_comment_post_btn_click();
      
  }); 
}); 


function shop_comment_post_btn_click()
{
   //text ithin textare which the person has entered
	 var text = $( '#shop_comment-post-text' ).val();
	 var user_id = $( '#user_id' ).val();
	 var owner_id = $( '#owner_id' ).val();

	 var datetime = $( '#datetime' ).val();

	  if( text.length > 0 && user_id !=null )
	   {  
		 $('#shop_comment-post-text').css('border' , '1px solid #e1e1e1');
		 
		 $.post( "/ajax/shop_comment_insert.php " ,
		   {
			   task : "shop_comment_insert",
			   _user_id : user_id,
			   _owner_id :owner_id,
			   comment : text ,
			   datetime : datetime
		   }
		  )
		  .error(
		  
			   function( )
			   {
				  console.log( "Error: " );
			   })
		  .success(
				  //succes
				  //task insert into the ul / li
			   function( data )
			   {
			      shop_comment_insert( jQuery.parseJSON( data ) );
				 console.log( "ResponseText: " + data );
			   } 
			   );
		 
		 
		 console.log( text + user_id + owner_id + datetime);
	  }
	  else
	  {
	  //textarea is empty
	  $('#shop_comment-post-text').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }


	


//remove value after button 
	 $( '#shop_comment-post-text' ).val("");
}

function shop_comment_insert( data )
{
  var t = '';

t += '<li style="list-style:none;">';
t += '<input type="hidden" id="comment_id" value="'+data.comment.comment_id+'" /> ';
t += '<span class="timeline-seperator text-center"><span>'+data.comment.datetime+'</span>';
t += '<div class="btn-group pull-right">';
t += '<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle">';
t += '<span class="caret single"></span></a>';
t +=  '<ul class="dropdown-menu text-left">';
t +=  '<li>';
t +=  '<a href="include/delete_comment.php?id=6"class="text-danger">Delete Post</a>';
t +=  '</li>';
t +=  '</ul>';
t +=  '</div>';
t +=  '</span>';
t +=  '<div class="chat-body no-padding profile-message ">';
t +=  '<ul>';
t +=  '<li class="message">';
t +=  '<img class="img-thumbnail" src="'+data.pictures.image_loc+'" width="55" />';
t +=  '<strong style="padding-left:60px;" >';
t +=  '<a href="name link" style="margin-bottom:-140px;" class="text-primary">'+data.user.firstName+' '+data.user.secName+ '</a></strong>';
t +=  '<p style="padding-left:70px;">'+data.comment.comment+'</p>';
t +=  '</li>';
t +=  '<li class="message" style="margin-top:-10px; padding-left:70px;">';
t +=  '<ul class="list-inline font-xs " >';
t +=  '<li>';
t +=  '<a href="comment_like.php"class="text-primary"><i class="fa fa-thumbs-up"></i> Like</a>';
t +=  '</li>';
t +=  '<li>';
t +=  '<a href="javascript:void(0);" class="text-muted">Show All Comments (10)</a>';
t +=  '</li>';
t +=  '<li>';
t +=  '<a href="include/delete_comment.php"class="text-danger">Delete</a>';
t +=  '</li>';
t +=  '</ul>	';
t +=  '</li>  ';
t +=  '<br>  ';

t +=  '<li>						 ';
t +=  '<form action="reply_insert_friend_shop.php?post_id='+data.comment.comment_id+'&shop_id='+data.comment.owner_id +'&shopName='+data.shop.shopName+'" method="POST">';
t +=  '<div class="input-group wall-comment-reply">';
t +=  '<input type="hidden" value="hahahah" class="form-control" placeholder="Type your message here..."required>';
t +=  '<input type="text" name="reply"   class="input-xs form-control" placeholder="Type your message here..."required>';
t +=  '<span class="input-group-btn">';
t +=  '<button type="submit" class="btn btn-xs btn-primary" >';
t +=  '<i class="fa fa-reply"></i> Reply';
t +=  '</button> ';
t +=  '</span>';
t +=  '</div></form>	</li>		';

t +=  '</ul>';
t +=  '</div>';
t +=  '</li>';

$( '.comment-holder-ul' ).prepend( t );

}