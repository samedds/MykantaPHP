$( document ).ready( function(){

  
  $( '#like_btn' ).click(function(){
     like_btn_click();
      
  });

  $( '#unlike_btn' ).click(function(){
     unlike_btn_click();
      
  }); 

}); 

function like_btn_click()
{
   
	 var user_id = $( '#user_id' ).val();
	 var shop_id = $( '#shop_id' ).val();
	 var datetime = $( '#datetime' ).val();

	  if( shop_id !=null && user_id !=null )
	   {  
		
		 $.post( "/ajax/shop_like_insert.php" ,
		   {
			  user_id : user_id,
			  shop_id :shop_id,
			  datetime : datetime,
			  cache: false,
		   })
		   
		  .error(
		  
			   function( )
			   {
				  $('#like_btn').css('border' , '1px solid #ff0000');
			   })
		  .success(
		  
		        function( data )
			   {
		
			      like_insert( jQuery.parseJSON( data ) );
				 console.log( "ResponseText: " + data );
			   } 
			   );
		 
	 }
	  else
	  {
	  //textarea is empty
	  $('#like_btn').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }
}

function like_insert( data )
{
document.getElementById("top_like_btn").innerHTML ="";

document.getElementById("top_like_btn").innerHTML =' <div class="well btn btn-default pull-right padding-5 text-primary" style="margin-top:-40px; margin-right:10px;" id="unlike_btn" type="submit"><i class="glyphicon glyphicon-thumbs-up"></i> Unlike Shop</div>	';
	
document.getElementById("like_no").innerHTML ="";

document.getElementById("like_no").innerHTML ='<span class=" text-primary"> <strong> '+data.update.like_no+' Likes </strong> </span>';


document.getElementById("like_no_phone").innerHTML ="";

document.getElementById("like_no_phone").innerHTML ='<span class=" text-primary"> <strong> '+data.update.like_no+' Likes </strong> </span>';
}

function unlike_btn_click()
{
   //text ithin textare which the person has entered
	 
	 var user_id = $( '#user_id' ).val();
	 var shop_id = $( '#shop_id' ).val();
	 var datetime = $( '#datetime' ).val();

	  if( shop_id !=null && user_id !=null )
	   {  
		
		 $.post( "/ajax/shop_un_like_insert.php" ,
		   {
			  user_id : user_id,
			  shop_id :shop_id,
			  datetime : datetime,
			  cache: false,
		   })
		   
		  .error(
		  
			   function( )
			   {
				  $('#like_btn').css('border' , '1px solid #ff0000');
			   })
		  .success(
		  
		        function( undata )
			   {
		
			      unlike_insert( jQuery.parseJSON( undata ) );
				 console.log( "ResponseText: " + undata );
			   } 
			   );
		 
	 }
	  else
	  {
	  //textarea is empty
	  $('#like_btn').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }
}
function unlike_insert( undata )
{
document.getElementById("top_like_btn").innerHTML ="";

document.getElementById("top_like_btn").innerHTML =' <button class="well btn btn-default pull-right padding-5 text-primary" type="submit" style="margin-top:-40px; margin-right:10px;" id="like_btn" ><i class="glyphicon glyphicon-thumbs-up"></i> like Shop</button>	';
	
document.getElementById("like_no").innerHTML ="";

document.getElementById("like_no").innerHTML ='<span class=" text-primary"><strong>  '+undata.update.like_no+' Likes </strong> </span>';

document.getElementById("like_no_phone").innerHTML ="";

document.getElementById("like_no_phone").innerHTML ='<span class=" text-primary"><strong>  '+undata.update.like_no+' Likes </strong> </span>';
}