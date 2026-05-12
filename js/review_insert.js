function comment_post_btn_click()
{
   //text ithin textare which the person has entered
	 var review = $( '#product_review_text' ).val();
	 var user_id = $( '#user_id' ).val();
	 var product_id = $( '#product_id' ).val();
	 var productnum = $( '#productnum' ).val();
	 var url_link = $( '#url_link' ).val();
	 var datetime = $( '#datetime' ).val();
 console.log(productnum);
	  if( review.length > 0 && user_id !=null )
	   {  
		 $('#product_review_text').css('border' , '1px solid #e1e1e1');
		 
		 $.post( "/ajax/review_insert.php " ,
		   {
			   task : "product_review",
			   _user_id : user_id,
			   _product_id :productnum,
			   review : review ,
			   datetime : datetime
		   }
		  )
		  .error(
		  
			   function( )
			   {
				  console.log( "Error: " );
			   })
		  .success(
				 
			   function( data )
			   {
			      comment_insert( jQuery.parseJSON( data ) );
			 
			   } 
			   );
		 
		 
		 console.log( review + user_id + product_id + datetime);
	  }
	  else
	  {
	  //textarea is empty
	  $('#product_review_text').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }


	


//remove value after button 
	 $( '#product_review_text' ).val("");
}

function comment_insert( data )
{
  var t = '';

t += '<div class="  padding-10" >';
t +=  '<strong style="text-primary"> Reviewer</strong>';
t +=  '<p >'+data.comment+'</p>';
t +=  '<ul class="list-inline font-xs " >';
t +=  '<li>';
t +=  '<a href="javascript:void(0);" class="text-muted">'+data.datetime+'</a>';
t +=  '</li>';
t +=  '</ul>	';
t +=  '</div>';
t +=  '</div>';

$( '.comment-holder-ul' ).prepend( t );

}
