$( document ).ready( function(){

  //this will fire once the page has been fully loaded
  
  $( '#comment-post-btn' ).click(function(){
     comment_post_btn_click();
      
  }); 
}); 


function comment_post_btn_click()
{
   //text ithin textare which the person has entered
	 var text = $( '#comment-post-text' ).val();
	 var user_id = $( '#user_id' ).val();
	 var owner_id = $( '#owner_id' ).val();
	 var myfile = $( '#myfile' ).val();
	 var url_link = $( '#url_link' ).val();
	 var user_name = $( '#user_name' ).val();
	 var datetime = $( '#datetime' ).val();

	 //Put NULL in myfile variable if undefined
	 if (myfile == undefined)
	 {
		myfile = "NULL";
	 }
	 this.myfile2 = myfile;

	  if( text.length > 0 && user_id !=null )
	   { 
	   	 //$('#add_image').empty();			//This makes the image div disappear after comment is posted

		 $('#comment-post-text').css('border' , '1px solid #e1e1e1');
		 
		 $.post( "/ajax/comment_insert.php " ,
		   {
			   task : "comment_insert",
			   _user_id : user_id,
			   _owner_id :owner_id,
			   comment : text ,
			   datetime : datetime,
			   myfile : myfile
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
			      comment_insert( jQuery.parseJSON( data ) );
				// console.log( "ResponseText: " + data );
			   } 
			   );
		 
		 
		// console.log( text + user_id + owner_id + user_name + datetime +myfile);
	  }
	  else
	  {
	  //textarea is empty
	  $('#comment-post-text').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }


	


//remove value after button 
	 $( '#comment-post-text' ).val("");
}

function comment_insert( data )
{
  var t = '';

t += '<li style="list-style:none;">';
t += '<input type="hidden" id="comment_id" value="'+data.comment.comment_id+'" /> ';

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
t +=  '<li class="text-primary">';
t +=  ''+data.comment.datetime+'';
t +=  '</li>';
t +=  '<li>';
t +=  '<a href="javascript:void(0);" class="text-muted">Show All Comments (0)</a>';
t +=  '</li>';

t +=  '</ul>	';
t +=  '</li>  ';
t +=  '<br>  ';

t +=  '</ul>';
t +=  '</div>';
t +=  '</li>';

$( '.comment-holder-ul' ).prepend( t );

}