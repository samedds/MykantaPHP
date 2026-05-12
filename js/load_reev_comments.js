function load_reev_comments(post_id)
{document.getElementById('loading_reev'+post_id+'').innerHTML = ' <div class="btn btn-default"><img src="/img/loading.gif"/></div>'; 

//document.getElementById('hide_reev_box'+post_id+'').innerHTML = '<a href="#" class=" padding-5 "style="height:30px; width:auto;" onclick="hide_reev_comments('+post_id+')" alt="hide comment"><i class="fa fa-arrow-up">  </i>  Hide comments </a>'; 

//document.getElementById('load_comments'+post_id+'').innerHTML = ""; 
	
		$.post("/ajax/load_reev_comments.php",  
		{
		 task1 : "task1",
		post_id: post_id,
			cache: false,
			})
			.error(function( )
			   {
			    $('#load_comments'+post_id+'').css('border' , '1px solid #ff0000');
			   })
			.success(function(response)
			{
		
document.getElementById('loading_reev'+post_id+'').innerHTML =response;	
});
}
function load_reev_text_more(post_id)
{document.getElementById('load_reev_text_more'+post_id+'').innerHTML = ' <div class="btn btn-default"><img src="/img/loading.gif"/></div>'; 

//document.getElementById('hide_reev_box'+post_id+'').innerHTML = '<a href="#" class=" padding-5 "style="height:30px; width:auto;" onclick="hide_reev_comments('+post_id+')" alt="hide comment"><i class="fa fa-arrow-up">  </i>  Hide comments </a>'; 

//document.getElementById('load_comments'+post_id+'').innerHTML = ""; 
	
		$.post("/ajax/load_reev_comments.php",  
		{
		 load_reev_text_more : "task_reev_more",
		post_id: post_id,
			cache: false,
			})
			.error(function( )
			   {
			    $('#load_reev_text_more'+post_id+'').css('border' , '1px solid #ff0000');
			   })
			.success(function(response)
			{
		
 	
$('#load_reev_text_more'+post_id+'').delay(6200).fadeIn('slow').html(response);
});
}

function load_reev_comments_collection(post_id)
{document.getElementById('loading_reev_collection'+post_id+'').innerHTML = ' <div class="btn btn-default"><img src="/img/loading.gif"/></div>'; 

//document.getElementById('hide_reev_box_c'+post_id).innerHTML = '<div class="well btn well-light well-muted padding-5 "style="height:30px; width:auto;" onclick="hide_reev_comments('+post_id+')" alt="hide comment"><i class="fa fa-arrow-up">  </i>  Hide comments </div>'; 

//document.getElementById('load_comments_c'+post_id+'').innerHTML = ""; 
	
		$.post("/ajax/load_reev_comments.php",  
		{
		 task_collection : "task1",
		post_id: post_id,
			cache: false,
			})
			.error(function( )
			   {
			  //  $('#load_comments_c'+post_id+'').css('border' , '1px solid #ff0000');
			   })
			.success(function(response)
			{
			//document.getElementById('collxn'+post_id+'').innerHTML ='';	
document.getElementById('loading_reev_collection'+post_id+'').innerHTML =response;	
});
}

function load_reev_comments_collection_friend(post_id)
{document.getElementById('loading_reev_collection'+post_id+'').innerHTML = ' <div class="btn btn-default"><img src="/img/loading.gif"/></div>'; 

//document.getElementById('hide_reev_box_c'+post_id).innerHTML = '<div class="well btn well-light well-muted padding-5 "style="height:30px; width:auto;" onclick="hide_reev_comments('+post_id+')" alt="hide comment"><i class="fa fa-arrow-up">  </i>  Hide comments </div>'; 

document.getElementById('load_comments_c'+post_id+'').innerHTML = ""; 
	
		$.post("/ajax/load_reev_comments.php",  
		{
		 task_collection_friend : "task1",
		post_id: post_id,
			cache: false,
			})
			.error(function( )
			   {
			    $('#load_comments_c'+post_id+'').css('border' , '1px solid #ff0000');
			   })
			.success(function(response)
			{

document.getElementById('loading_reev_collection'+post_id+'').innerHTML =response;	
});
}

function hide_reev_comments(post_id)
{
document.getElementById('loading_reev'+post_id+'').innerHTML = ""; 

//document.getElementById('hide_reev_box'+post_id+'').innerHTML = ""; 

//document.getElementById('load_comments'+post_id+'').innerHTML = '<div class="well btn well-light padding-5"  style="height:30px;" onclick="load_reev_comments('+post_id+')"><i class="fa fa-arrow-down"></i> Load comments</div>'; 

	
}
