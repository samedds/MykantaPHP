$( document ).ready( function(){

  //this will fire once the page has been fully loaded
  
  $( '#subscribe_btn' ).click(function(){
     subscribe_btn_click();
      
  });
  $( '#unsubscribe_btn' ).click(function(){
     unsubscribe_btn_click();
      
  }); 
}); 


function subscribe_btn_click()
{
   //text ithin textare which the person has entered
	  document.getElementById('subscribe_box').innerHTML  = '<a class=""><img src="/img/loading.gif"/></a>'; 
	
	 var shop_id = $( '#shop_id' ).val();
	

	  if( shop_id !=null && user_id !=null )
	   {  
		
		 $.post( "/ajax/subscribe_insert.php" ,
		   {
			   task : "subscribe_insert",
			 
			   shop_id :shop_id
			
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
			     
 document.getElementById("subscribe_box").innerHTML ="";

document.getElementById("subscribe_box").innerHTML =data+'<a href="javascript:void(0);" class="text-primary" id="unsubscribe_btn" style=" " onClick="unsubscribe_btn_click()"> UnSubscribe</a>';
				  
//document.getElementById("subscribe_box").innerHTML =' <div class="well btn btn-default pull-right padding-5 text-primary" style="margin-top:-40px; margin-right:10px;"  id="disabled" >Unsubscribe</div>';
			   } 
			   );
	  }
	  else
	  {
	  //textarea is empty
	  $('#subscribe_btn').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }

}


function unsubscribe_btn_click()
{
   //text ithin textare which the person has entered
	 document.getElementById('subscribe_box').innerHTML  = '<a class=""><img src="/img/loading.gif"/></a>'; 
	 var user_id = $( '#user_id' ).val();
	 var shop_id = $( '#shop_id' ).val();
	 var datetime = $( '#datetime' ).val();

	  if( shop_id !=null && user_id !=null )
	   {  
		
		 $.post( "/ajax/subscribe_insert.php" ,
		   {
			   task : "subscribe_insert",
			   user_id : user_id,
			   shop_id :shop_id,
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
                document.getElementById("subscribe_box").innerHTML ="";
                
                document.getElementById("subscribe_box").innerHTML ='<a href="javascript:void(0);" class="text-primary" id="subscribe_btn" style=" " onClick="subscribe_btn_click()"> Subscribe</a>';
                			   } 
			   );
	  }
	  else
	  {
	  //textarea is empty
	  $('#unsubscribe_btn').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	  }
}
