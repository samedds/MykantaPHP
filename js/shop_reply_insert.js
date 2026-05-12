$( document ).ready( function(){

  //this will fire once the page has been fully loaded
  
  $( '#shop_reply-btn' ).click(function(){
     shop_reply_btn_click();
      
  }); 
}); 


function shop_reply_btn_click()
{
   //text ithin textare which the person has entered
	 var shop_reply = $( '#shop_reply-text' ).val();
	 var user_id = $( '#user_id' ).val();
	 var comment_id = $( '#comment_id' ).val();
	 var user_name = $( '#user_name' ).val();
	 var datetime = $( '#datetime' ).val();

	  if( shop_reply.length > 0 && user_id !=null )
	   {  
		 $('#shop_reply-text').css('border' , '1px solid #e1e1e1');
		 
		 $.post( "/ajax/shop_reply_insert.php " ,
		   {
			   task : "shop_reply_insert",
			   _user_id : user_id,
			   _comment_id :comment_id,
			   shop_reply : shop_reply ,
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
			      shop_reply_insert( jQuery.parseJSON( data ) );
				 console.log( "ResponseText: " + data );
			   } 
			   );
		 
		 
		 console.log( shop_reply + user_id + comment_id + user_name + datetime);
	  }
	  else
	  {
	  //textarea is empty
	  $('#shop_reply-text').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }


	


//remove value after button 
	 $( '#shop_reply-text' ).val("");
}

function shop_reply_insert( data )
{
  var t = '';
  
t += '<hr >'
t += '<li class="message" style=" padding-left:55px;  list-style:none;">'
t += '<img src="'+data.pictures.image_loc+'" class="img-circle" width="50px">'
t += '<a href="javascript:void(0);" class="username" style=" padding-left:55px;">'
t += ''+data.user.firstName+' '+data.user.secName+ '</a>'
t += '<p style=" padding-left:55px; margin-top:0px;">'+data.shop_reply.shop_reply+'</p>'
t += '<ul class="list-inline font-xs" style=" padding-left:55px; margin-top:-5px;">'
t += '<li><a href="javascript:void(0);" class="text-info">'
t += '<i class="fa fa-thumbs-up"></i> Like</a></li>'
t += '<li><a href="javascript:void(0);" class="text-muted">just now</a>'
t += '</li></ul></li>'




$( '#shop_reply-holder-ul' ).prepend( t );

}