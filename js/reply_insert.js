$( document ).ready( function(){

  //this will fire once the page has been fully loaded
  
  $( '#reply-btn' ).click(function(){
     reply_btn_click();
      
  }); 
}); 


function reply_btn_click()
{
   //text ithin textare which the person has entered
	 var reply = $( '#reply-text' ).val();
	 var user_id = $( '#user_id' ).val();
	 var comment_id = $( '#comment_id' ).val();
	 var user_name = $( '#user_name' ).val();
	 var datetime = $( '#datetime' ).val();

	  if( reply.length > 0 && user_id !=null )
	   {  
		 $('#reply-text').css('border' , '1px solid #e1e1e1');
		 
		 $.post( "/ajax/reply_insert.php " ,
		   {
			   task : "reply_insert",
			   _user_id : user_id,
			   _comment_id :comment_id,
			   reply : reply ,
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
			      reply_insert( jQuery.parseJSON( data ) );
				 console.log( "ResponseText: " + data );
			   } 
			   );
		 
		 
		 console.log( reply + user_id + comment_id + user_name + datetime);
	  }
	  else
	  {
	  //textarea is empty
	  $('#reply-text').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }


	


//remove value after button 
	 $( '#reply-text' ).val("");
}

function reply_insert( data )
{
  var t = '';
  
t += '<hr >'
t += '<li class="message" style=" list-style:none;">'
t += '<img src="/img/avatars/mini/'+data.pictures.image_loc+'" class="img-circle" width="50px">'
t += '<a href="/connection-auth/'+data.user.username+ '" class="username" style=" padding-left:10px;">'
t += ''+data.user.username+ '</a>'
t += '<p style=" padding-left:55px; margin-top:0px;">'+data.reply.reply+'</p>'
t += '<ul class="list-inline font-xs" style=" padding-left:55px; margin-top:-5px;">'
t += '<li><a href="javascript:void(0);" class="text-info">'
t += '<i class="fa fa-thumbs-up"></i> Like</a></li>'
t += '<li><a href="javascript:void(0);" class="text-muted">just now</a>'
t += '</li></ul></li>'




$( '#reply-holder-ul' ).prepend( t );

}