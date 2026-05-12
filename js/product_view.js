$( document ).ready( function(){

  //this will fire once the page has been fully loaded
  
  $( '#product' ).click(function(){
    product_btn_click();
      
  }); 
}); 


function product_btn_click()
{
   //text ithin textare which the person has entered
	 
	 var product_id = $( '#product_id' ).val();
	 var user_id = $( '#user_id' ).val();
	 var shop_id = $( '#shop_id' ).val();
	 var datetime = $( '#datetime' ).val();

	  if( shop_id !=null && user_id !=null && product_id !=null )
	   {  
		
		 $.post( "/ajax/product_view_insert.php " ,
		   {
			   task : "product_view_insert",
			   product_id : product_id,
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
			      product_view_insert( jQuery.parseJSON( data ) );
				 console.log( "ResponseText: " + data );
			   } 
			   );
		 
		 //remove value after button 
	 $( '#product' ).val("");
	 
		 console.log( product_id +user_id + shop_id + datetime);
		 
		   $('#product').css('border' , '1px solid #ff0000');
		   

	  }
	  else
	  {
	  //textarea is empty
	  $('#product').css('border' , '1px solid #ff0000');
	   console.log( "empty" );
	    console.log( product_id +user_id + shop_id + datetime);
	  }


	



}

function product_view_insert( data )
{
  var t = '';



var t = '	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">';
var t = '		&times;';
var t = '	</button>';
var t = '	<h4 class="modal-title" id="myModalLabel">Product</h4>';

var t = '<div class="modal-body no-padding ">';
var t = '<form  action=""  method="POST" >';
var t = '	<div class=" row padding-10  well"style="">';
		
var t = '		<div class=" col-md-6 no-margin   " >';
var t = '				<button id="subscrib e_btn" type="button " class= "btn btn-primary btn-xs  padding-right-10 " value= "Subscribesss"><i class="glyphicon glyphicon-thumbs-up"></i> Like</button>';
var t = '		</div>';
			
var t = '			<div class=" col-md-6 " >';
var t = '<ul class="list-inline pull-right ">	';
var t = '				<li>';
var t = '			<a href src="#" class="" style="padding-left:10px; padding-bottom:-10px; " >	Edit Product</a>';
var t = '				</li>';
var t = '				<li>';
var t = '				<button id="subscrib e_btn" type="button " class= "btn btn-success btn-xs   "><i class="glyphicon glyphicon-plus"></i> Buy Now</button>';
var t = '				</li>';
var t = '				</ul>';
var t = '			</div>';
var t = '			</div>             ';
var t = '	<div class="row">';
var t = '		<div class="  col-md-7" style="height:250px;">';
			
				
var t = '			<img src="" />	';
				
var t = '		</div>';
var t = '		<div class=" col-md-5" style="height:250px;">';
var t = '			<span class="text-primary no-padding no-margin">details	</span>';
var t = '			<hr> ';
var t = '			<p>foh fo ih doih doi hvd';
var t = '			fohfo ihdoih doio i  hvd';
var t = '			fohf oih doih doihvd';
var t = '			fohfoihd oihdoihvd';
var t = '			fohfo ihdoi   h doihvd';
var t = '			fohf oih doihdoihvd';
var t = '			fohfoih doihd   o   ihvd</p>';
			
var t = '		</div>';
var t = '	</div>';
var t = '</div>';

var t = '	<div class="row padding-10">';
var t = '		<div class=" well col-md-12" style="height:60px;">';
			
				
			
				
var t = '		</div>';
		
	
var t = '</div>';
t = 'd</button>	';

$( '.modal-content' ).append( t );

}