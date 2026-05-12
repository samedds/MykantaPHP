
//This does the file Uploads
$(document).ready(function()
{
	var myDate = Math.round(new Date().getTime()/1000);
	var myDate2 = Math.round(new Date().getTime()/100);
	var username = 'mykanta'+myDate2;
	var imageTag = myDate;
	var imgArray = [];
	var imgArrayWithTag = [];
	var uploaded_files_location = "img/temp";
	
	new AjaxUpload($('#upload_button'), 
	{
		action:'uploader.php',
		name: 'file_to_upload',
		data: {
			task111 : "task111",
		    imageTag : imageTag
		},
		onSubmit: function(file, file_extensions)
		{
			$('.wrapper').show(); //This is the main wrapper for the uploaded items which is hidden by default
			
			//Allowed file formats jpg|png|jpeg|gif|pdf|docx|doc|rtf|txt - You can add as more file formats or remove as you wish.
			if (!(file_extensions && /^(jpg|png|jpeg|gif|mpeg|avi|mkv|mp4|webm|m4v)$/.test(file_extensions)))
			{
				//If file format is not allowed then, display an error message to the user
				$('#vpb_uploads_error_displayer').html('<div class="vpb_error_info" align="left">Sorry, you can only upload the following file formats: JPG, PNG and or GIF. Thanks...</div>');
				return false;
			}
			else
			{
			  $('#vpb_uploads_error_displayer').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response === "file_uploaded_successfully")
			{
				$('#vpb_uploads_error_displayer').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = file.substring(file.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = file.substr(0, file.lastIndexOf('.')) || file;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				vpb_file_names = imageTag + "" + vpb_file_names;
				var file = imageTag + "" + file;
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
{
	imgArray.push(file);
	imgArrayWithTag.push('<div id="img_'+imgArray.length +'" class="padding-5 col-lg-3 col-xs-3 col-sm-3"><img src="'+uploaded_files_location+'/'+file+'" class="img-thumbnail" style="height:80px; width:auto; min-width:80px;"/><!--	--></div>');
	$('#hiddenGifImg').val(imgArray);
	//$('#vpb_uploads_pop').html('<button class="btn-default" id="img_del" type="" ><i class="fa fa-times"></i> delete </button>');
	//console.log(imgArray);
	//console.log(imgArrayWithTag);
//$('#vpb_uploads_displayer').html('<div class="  vpb_imag e_wrappers row padding-5 margin-5" id="fileID'+vpb_file_names+'" ><div class="col-md-3"><img src="'+uploaded_files_location+'/'+file+'" class="img-rounded" width="100"/></div>          <!--<div class="col-md-3"><button class=" btn btn-sm btn-default " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file_comment(\''+vpb_file_names+'\',\''+file+'\',\''+imgArray+'\');"><i class="glyphicon glyphicon-remove"></i></button></div>--> </div>         ');
				
$('#vpb_uploads_displayer').html(imgArrayWithTag);
$('#vpb_uploads_number').html('<b class="badge text-primary">'+imgArray.length+'</b>' );
}
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF")
				{+product_id+
$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF")
				{
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>PDF Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Text File Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else
				{
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else if(response === "file_upload_was_unsuccessful")
			{
				$('#add_image').html('<div class="vpb_error_info" align="left">Sorry, your file upload was unsuccessful. Please reduce the size of your file <strong>(<4mb)</strong> and try again or contact this site admin to report this error message if the problem persist. Thanks...</div>');
				console.log(response);
			}
			else if(response === "video_uploaded_successfully")
			{    file = file.replace(/\s+/g, '');
				$('#input_value').val('uploads/videos/temp/'+imageTag+''+file+'');
				$('#convert_button').show();
				 $('#myfile').val("");
				  $('#myfile_total').val("");
				  $("#gif_value").val("");  
				$('#vpb_uploads_error_displayer').html('<div class="row padding-10"><div class="col-xs-12 padding-5"><video controls="" width="500" id="videosource" autoplay="autoplay"><source type="video/mp4" src="uploads/videos/temp/'+imageTag+''+file+'"><embed src="uploads/videos/temp/'+imageTag+''+file+'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="auto" height="auto"></video></div></div>');
				 var vidElem = $("#input_value").val();  
										
						// sliders for editting the video to convert 
						$("#ex8").slider({});
						$("#ex2").slider({});
						// With JQuery
                         
						 /*z
						$("#ex8").on("slide", function(slideEvt) {
							
							var fresh_exv = $("#ex8SliderVal").val();
							$("#ex8SliderVal").val(slideEvt.value);
							
							$("#videosource").bind("timeupdate", function()
							{
									//this.play();
								this.currentTime = slideEvt.value;
								//this.play();
								//$("#ex8SliderVal").val(slideEvt.value);
								return;
							});
							
						});
						$("#ex2").on("slide", function(slideEvt) {
							$("#ex2SliderVal").text(slideEvt.value);
								$("#videosource2").val(slideEvt.value);
						});	
										
						*/				
										
						$("#videosource").bind("timeupdate", function(){
						   
								var ex8text = $("#ex8SliderVal").val();
							 $("#current_time_vid").val(this.currentTime);
								//this.play();
							
								var totalseconds = this.duration;
								var width = this.videoWidth;
								var height = this.videoHeight;
								
								if(    width >=  800  )
								{
									var width1 = width / 4;
									var height1 = height / 4;
									var rex =  width1+'x'+height1;
								} else
								if(    width < 800 )
									{
										var width1 = width / 2;
										var height1 = height / 2;
										var rex =  width1+'x'+height1;
									}
							
								 $("#video_rex").val(rex);

							   // var totalseconds2 = this.duration;
								//var hours = Math.floor(totalseconds / 3600);
								// totalseconds %= 3600;
								//var minutes = Math.floor(totalseconds / 60);
								//var seconds = totalseconds2 % 60;
								//console.log(('0'+hours).slice(-2)+':'+('0'+minutes).slice(-2)+':'+('0'+seconds));
								console.log(width+ ' x '+height);
								
						});
							
							$("#videosource2").bind("timeupdate", function(){
								var ex8text = $("#ex8SliderVal").val();
								 this.currentTime = ex8text + 10;	
							   // if(this.currentTime > 10)
								  //  this.currentTime = 0;	
								     var totalseconds = this.duration;
								   // var totalseconds2 = this.duration;
									//var hours = Math.floor(totalseconds / 3600);
									// totalseconds %= 3600;
									//var minutes = Math.floor(totalseconds / 60);
									//var seconds = totalseconds2 % 60;
									//console.log(('0'+hours).slice(-2)+':'+('0'+minutes).slice(-2)+':'+('0'+seconds));
									console.log(totalseconds);
									
							});
										
			}
			
			
			
			
			else if(response === "video_wrong_was_unsuccessful")
			{
				$('#vpb_uploads_displayer').html('<div class="vpb_error_info" align="left">Video not in array</div>');
				console.log(response);
			}
			else
			{
				$('#vpb_uploads_displayer').html('<div class="vpb_error_info" align="left">File size is large.</div>');
				console.log(response);
				
			}
		}
	});


	
	$('#use_gif').click(function(){
		//var AllGifImg = $('#hiddenGifImg').val();
	
	   
		//var user_id = $( '#no_code_an' ).val();
		 var gif_value = $( '#gif_value' ).val();
		//substr($string, 0, 15). '...'; 
		
		if(gif_value != "")
		{
			// $('#myfile').val("");
			  
			     $('#gif_uplaod_box').html(' '); 
				 $('#add_image').html('<hr class="no-padding" style="border:3px solid #e1e1e1; box-shadow:inset 1px 1px 1px 1px black; width:105%;"> <div class="col-xs-3 " ><img src="img/comments_images/'+gif_value+'.gif" class="img img-rounded" width="100" /><span class="  no-padding" id="gifImg" style="width:98%; margin-top:-10px;" > </div><div class="col-xs-7 padding-5" id="text_area"><textarea rows="2" style="margin:-5px;" id="comment-post-text" class="form-control" placeholder="share a reev" required></textarea><textarea rows="1" style="width:98%; margin:-5px; display:none; " id="title_reev" class="form-control" placeholder="title your reev" required></textarea></div> <div id="comment_box" class="col-xs-2 no-padding"> <button onclick="reev_next();" value="" class=" btn-primary ">Next</button><br><br><button onclick="reev_cancel();" value="" class=" btn-default"><span class="hidden-xs hidden-sm">cancel</span><i class="fa fa-times hidden-lg hidden-md "></i></button></div></span> ');
			     $('#hiddenGifImg').val("");
			     $('#vpb_uploads_displayer').html("");
			     $('#uploadModalCloseBtn').click();
				// console.log( "ResponseText: " + data );
			     $('#myfile').val(gif_value);
			     $('#myfile_total').val( 25 );
				  //imgArray.length = 0;
	              //imgArrayWithTag.length = 0;
			    
			 
		}
		else{
			console.log("Please upload an image");
		}
	});


	$('#saveGifBtn').click(function(){
		var AllGifImg = $('#hiddenGifImg').val();
		
	   if( document.getElementById('rane005').checked  )
		{ var rane = $('#rane005').val();} 
	
	   if( document.getElementById('rane01').checked  )
		{ var rane = $('#rane01').val();} 
    
       if( document.getElementById('rane02').checked  )
		{ var rane = $('#rane02').val();}
	   
	   if( document.getElementById('rane03').checked  )
		{ var rane = $('#rane03').val();}
		
	    if( document.getElementById('rane04').checked  )
		{ var rane = $('#rane04').val();}
		
	   if( document.getElementById('rane05').checked  )
		{ var rane = $('#rane05').val();}
		
		if( document.getElementById('rane06').checked  )
		{ var rane = $('#rane06').val();}
		
		if( document.getElementById('rane07').checked  )
		{ var rane = $('#rane07').val();}
		
		if( document.getElementById('rane08').checked  )
		{ var rane = $('#rane08').val();}
		
	   if( document.getElementById('rane09').checked  )
		{ var rane = $('#rane09').val();}
	
	   if( document.getElementById('rane10').checked  )
		{ var rane = $('#rane10').val();}
	 
		var myDate = Math.round(new Date().getTime()/10);
		//var user_id = $( '#no_code_an' ).val();
		var myDate2 = Math.round(new Date().getTime()/100);
	var user_id = 'mykanta';
		// var user_id = $( '#username' ).val();
		//substr($string, 0, 15). '...'; 
		var imageTag = user_id+""+myDate;
		var imageTagAndExt = imageTag+".gif";
		if(AllGifImg != "")
		{
			$.post( "uploader.php " ,
			   {
				   task222 : "task222",
				   rane : rane,
				   AllGifImg : AllGifImg,
				   imageTag : imageTag
			   })
			  .error(
				   function( )
				   {
					 // console.log( "Error: " );
				   })
			  .success(
			   function( data )
			   { 
			   
			   $('#myfile').val("");
			   //$('#gif_uplaod_box').fadeOut('slow');
			   $('#gif_3').removeClass('col-xs-3');
			   $('#gif_3').addClass('col-xs-12');
			   $('#gif_9').removeClass('col-xs-9');
			   $('#gif_9').addClass('col-xs-12');
			   $('#gif_uplaod_box').html(' '); 
				
				 $('#add_image').html('<div class="padding-10"  ><center><img src="img/comments_images/'+imageTag+'.gif" class="img img-rounded" width="500px;" style="width:500px;"/><span class="no-padding" id="gifImg" style="width:auto; margin-top:-10px;" ></span><br> <a href="img/comments_images/'+imageTag+'.gif"><br><button class="btn btn-success"> Download</button></a></center></div> ');
			     $('#hiddenGifImg').val("");
			     $('#vpb_uploads_displayer').html("");
			     $('#uploadModalCloseBtn').click();
				// console.log( "ResponseText: " + data );
			     $('#myfile').val(imageTag);
			     $('#myfile_total').val( imgArray.length);
				  imgArray.length = 0;
	              imgArrayWithTag.length = 0;
			  });
		}
		else{
			alert("Please upload an image");
		}
	});
	
$('#empty_gif').click(function(){
imgArray.length = 0;
imgArrayWithTag.length = 0;
  $('#vpb_uploads_displayer').html('<p class="text-success  pull-left">Emptied. </p>');
});

	
$('#img_del').click(function(){
imgArray.pop();
imgArrayWithTag.pop();
	$('#hiddenGifImg').val(imgArray);
	//$('#vpb_uploads_pop').html('<button class="btn-default" id="img_del" type="" ><i class="fa fa-times"></i> delete </button>');
$('#vpb_uploads_displayer').html(imgArrayWithTag);
$('#vpb_uploads_number').html('<b class="badge text-primary">'+imgArray.length+'</b>' );
});
	
$('#img_del_1').click(function(){
imgArray.length = 0;
imgArrayWithTag.length = 0;
  $('#vpb_uploads_displayer').html('<p class="text-success  pull-left">Emptied. </p>');
});

/*
$('#img_del_1').click(function(){
imgArray.length = 0;
//imgArrayWithTag.length = 0;
  $('#img_1').html('');
});
*/

});

function img_del(id)
{
var hiddenGifImg = $('#hiddenGifImg').val();
var vpb_uploads_displayer = $('#vpb_uploads_displayer').val();
//var imgArray = [];
//imgArray.push(hiddenGifImg);
var array = hiddenGifImg.split(","); 
var index = array.indexOf(array[id]);
var image_itself = array[id-1];

//array.splice(id, 1);
//delete array[image_itself];

	//$('#hiddenGifImg').val(imgArray);			
    //$('#vpb_uploads_displayer').html(imgArray.length +imgArrayWithTag );


$('#hiddenGifImg').val(array);
 //imgArrayWithTag.length = 0;
 //$GifImages = explode(',', $imgArray);
 $('#img_'+id+'').html(image_itself+'---- '+array+'---- '+id+'---- '+index);
 
 
}


//This removes all unwanted files
function display_product(image_loc)
{
$(".product_image").addClass('loading');
document.getElementById("product_image").innerHTML ="<img src='"+image_loc+"' width='450' class='img-rounded'>";
	
return false;	
}


function remove_unwanted_file_comment(file)
{
	if(confirm("If you are sure that you really want to remove the file "+file+" then click on OK otherwise, Cancel it."))
	{
	  	$.post("/ajax/comment_img_del.php",  
			{
				task : "task",
			  	filename : file,
				cache: false,
			})
		.error(function()
		   {
			//  console.log( "Error: " );
		   })
		.success(function(response)
		{
		    $('#gifImg').fadeOut('slow');
		    $('#add_image').html("");
			$("#myfile").val('');
			
			$('#hiddenGifImg').val("");
			 $('#gif_3').removeClass('col-xs-3');
			 $('#gif_3').addClass('col-xs-12');
			$('#hiddenGifImg').val("");
			 $('#add_image').html('<em class=" text-muted ">Capture<em class=" hidden-xs hidden-sm text-muted" > Experiences </em> in</em> <a id="upload_modal_btn" href="javascript:void(0);" data-target="#upload_modal" data-toggle="modal" class="btn btn-default " rel="tooltip"  title="Create from images"> <i class="fa fa-camera"></i> GIF <span class="hidden-xs"> Motion</span> </a> <em class=" text-muted"> or </em> <a  href="javascript:void(0);" onClick="only_text_reev();" class="btn btn-default" rel="tooltip"  title="Share text only"> <i class="fa fa-pencil "></i> Text <span class="hidden-xs"> Only</span></a> <a href="javascript:void(0);" class="badge inbox-badge    pull-right "  rel="tooltip" title="To share your Experience, select GIF Motion to snap pictures from camera or gallery but select Text Only if you have no Pictures. " style="background-color:#5BC0DE;  "><i class="fa fa-info"></i></a>');
		});
	}
	return false;
}

	function freemee()
{
			 $("#freemee").fadeIn('slow');
		//var tag =  $("#Food_input").val();
	 
	}	


/*
<input type="hidden" id="myfile" value="'+file+'" />*/