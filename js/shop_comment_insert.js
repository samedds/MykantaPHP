function shop_comment_post_btn_click()
{
   //text ithin textare which the person has entered
	 var text = $( '#shop_comment-post-text' ).val();
	 var user_id = $( '#user_id' ).val();
	 var shop_id = $( '#shop_id' ).val();
	 var myfile = $( '#myfile' ).val();
	 var datetime = $( '#datetime' ).val();
	 
	 //Put NULL in myfile variable if undefined
	 if (myfile == undefined)
	 {
		myfile = "NULL";
	 }
	 this.myfile2 = myfile;
	 this.mytext = text;

	  if( text.length > 0 && user_id !=null )
	   {
		$('#add_image2').empty();
		
		 $('#shop_comment-post-text').css('border' , '1px solid #e1e1e1');
		 
		 $.post( "/ajax/shop_comment_insert.php " ,
		   {
			   task : "shop_review",
			   _user_id : user_id,
			   shop_id :shop_id,
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
				      shop_comment_insert( jQuery.parseJSON( data ) );
					// console.log( "ResponseText: " + data );
				   } 
			   );
		 
		 
		
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

t += '<div class="row padding-10" >';
t +=  '<strong style="text-primary"> Reviewer</strong>';
t +=  '<p >'+data.comment+'</p>';
t +=  '<ul class="list-inline font-xs " >';
t +=  '<li>';
t +=  '<a href="javascript:void(0);" class="text-muted">'+data.datetime+'</a>';
t +=  '</li>';
t +=  '<li>';
t +=  '<a href="include/delete_comment.php"class="text-danger">Delete</a>';
t +=  '</li>';
t +=  '</ul>	';
t +=  '</div>';
t +=  '</div>';

$( '.comment-holder-ul' ).prepend( t );

}