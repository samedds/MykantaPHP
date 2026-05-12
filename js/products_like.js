$( document ).ready( function(){

  //this will fire once the page has been fully loaded
  
  $( '#like_btn_product' ).click(function(){
     like_btn_product_click();
      
  });

  $( '#unlike_btn_product' ).click(function(){
     unlike_btn_product_click();
      
  }); 
}); 

function like_btn_product_click()
{
   //text ithin textare which the person has entered
	 
	 var user_id = $( '#user_id' ).val();
	 var product_id = $( '#product_id' ).val();
	 var datetime = $( '#datetime' ).val();

	  if( product_id !=null && user_id !=null )
	   {  
		
		 $.post( "/ajax/product_like_insert.php " ,
		   {
			  user_id : user_id,
			  product_id :product_id,
			  datetime : datetime,
			  cache: false,
		   })
		   
		  .error(
		  
			   function( )
			   {
				  $('#like_btn_product').css('border' , '1px solid #ff0000');
			   })
		  .success(
		  
		        function( data )
			   {
		
			     like_insert_product( jQuery.parseJSON( data ) );
				 console.log( "ResponseText: " + data );
			   } 
			   );
		 
	 }
	  else
	  {
	  //textarea is empty
	  $('#like_btn_product').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }
}

function like_insert_product( data )
{
document.getElementById("like_product_cover").innerHTML ="";

document.getElementById("like_product_cover").innerHTML ='<button id="unlike_btn_product" type="button" class= "btn btn-primary btn-xs pull-right padding-right-10 " ><i class="glyphicon glyphicon-thumbs-up"></i> Unlike</button>';
	

document.getElementById("like_product_no").innerHTML ="";

document.getElementById("like_product_no").innerHTML = ' <strong class="text-primary pull-right"style="margin-top:0px; margin-right:5px;">'+data.update.like_no+' likes</strong>';

}

function unlike_btn_product_click()
{
   //text ithin textare which the person has entered
	 
	 var user_id = $( '#user_id' ).val();
	 var product_id = $( '#product_id' ).val();
	 var datetime = $( '#datetime' ).val();

	  if( product_id !=null && user_id !=null )
	   {  
		
		 $.post( "/ajax/product_un_like_insert.php " ,
		   {
			  user_id : user_id,
			  product_id :product_id,
			  datetime : datetime,
			  cache: false,
		   })
		   
		  .error(
		  
			   function( )
			   {
				  $('#like_btn_product').css('border' , '1px solid #ff0000');
			   })
		  .success(
		  
		        function( undata )
			   {
		
			      unlike_insert_product( jQuery.parseJSON( undata ) );
				 console.log( "ResponseText: " + undata );
			   } 
			   );
		 
	 }
	  else
	  {
	  //textarea is empty
	  $('#like_btn_product').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }
}
function unlike_insert_product( undata )
{
document.getElementById("like_product_cover").innerHTML ="";

document.getElementById("like_product_cover").innerHTML ='<button id="like_btn_product" type="button" class= "btn btn-primary btn-xs pull-right padding-right-10 " ><i class="glyphicon glyphicon-thumbs-up"></i> like</button>';
	
document.getElementById("like_product_no").innerHTML ="";

document.getElementById("like_product_no").innerHTML = ' <strong class="text-primary pull-right"style="margin-top:0px; margin-right:5px;">'+undata.update.like_no+' likes</strong>';

}