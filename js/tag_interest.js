$(window).load(function(){
      
	  $.post("/include/tag_interest.php", {check: 1})
	.error(function()
	   {
		 // console.log( "Error: " ); //sam commented this to check if the loading at the title will stop
	   })
  	.success(function( data )
	   {
			//console.log( "ResponseText: " + data );  //sam commented this to check if the loading at the title will stop
			if(data == "tags_needed")
			{	
			
			 $('#interest_tag').modal('show');
			 // $('#tags_holder').html(data);
			// res = data.split(",");
			//	$token = res[2];
				
				
			}
			else
			{
			 // $('#interest_tag').modal('hide');
			 // $('#tags_holder').html(data);
			//alert('you have tags added thanks : '+data );
			}
	   });
	   
	   
	   	//click send message

    });
	
	function tag_interest_button()
     {
  	  $.post("/include/tag_interest.php", {user_tags: 1})
	.error(function()
	   {
		 // console.log( "Error: " ); //sam commented this to check if the loading at the title will stop
	   })
  	.success(function( data )
	   {
	   
	   if(data == "tags_needed")
		 {
			 $('#interest_tag').modal('show');
			 
        }
		else{
		$('#ur_interest_tag').modal('show');
			  $('#ur_tags_holder').html(data);
		}
			// res = data.split(",");
			//	$token = res[2];
		});
     }
	function tag_continue()
     {
  	  $.post("/include/tag_interest.php", {user_tags_continue: 1})
	.error(function()
	   {
		 // console.log( "Error: " ); //sam commented this to check if the loading at the title will stop
	   })
  	.success(function( data )
	   {
	   
	     if(data == "tags needed")
		 {
		   //$('#ur_interest_tag').modal('show');
		 //  $('#ur_tags_holder').html(data);
			  $('#button_continue').html('<button type="button" onClick="tag_continue();" class="btn btn-default">Search People </button> <a href="/user"><button type="button" class="btn btn-primary"> Done</button> </a>');
		 }
		 else{
		    $('#tags_holder').html(data);
			  $('#button_continue').html('<button type="button" onClick="tag_continue();" class="btn btn-default">Reload</button><a href="/user"><button type="button" class="btn btn-primary">Done</button></a>');
		 }
			// $('#interest_tag').modal('show');
			  
			  
			// res = data.split(",");
			//	$token = res[2];
		});
     }
	function tag_search()
     {
  	  $.post("/include/tag_interest.php", {user_tags_continue: 1})
	.error(function()
	   {
		 // console.log( "Error: " ); //sam commented this to check if the loading at the title will stop
	   })
  	.success(function( data )
	   {
	   
		    $('#ur_tags_holder').html(data);
			  $('#button_continue').html('<button type="button" onClick="tag_continue();" class="btn btn-default">Search People</button><a href="/user"><button type="button" class="btn btn-primary">Done</button></a>');
		});
     }
	 function retag()
     {
  	  $.post("/include/tag_interest.php", {retag: 1})
	.error(function()
	   {
		 // console.log( "Error: " ); //sam commented this to check if the loading at the title will stop
	   })
  	.success(function( data )
	   {
	   $('#ur_interest_tag').modal('hide');
	   $('#interest_tag').modal('show');
	    // $('#tags_holder').html(data);
		// $('#retag_btn').html('Done');
			  
		});
     }
	