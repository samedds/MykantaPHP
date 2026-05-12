
//This does the file Uploads
$(document).ready(function()
{
    var myDate = Math.round(new Date().getTime()/1000);
    var product_id = $( '#product_id' ).val();
//var user_id = $( '#user_id' ).val();
	var imageTag = product_id + "-" + myDate;
	//var actual_name = imageTag +  "-" + ;
	var uploaded_files_location = "/img/products_images/";
	new AjaxUpload($('#upload_button'), 
	{
		action: '/uploader_product.php',
		name: 'file_to_upload',
		data: {
		    imageTag : imageTag
	  },
		onSubmit: function(file, file_extensions)
		{
			$('.wrapper').show(); //This is the main wrapper for the uploaded items which is hidden by default
			
			//Allowed file formats jpg|png|jpeg|gif|pdf|docx|doc|rtf|txt - You can add as more file formats or remove as you wish.
			if (!(file_extensions && /^(jpg|png|jpeg|gif)$/.test(file_extensions)))
			{
				//If file format is not allowed then, display an error message to the user
				$('#vpb_uploads_error_displayer').html('<div class="vpb_error_info" align="left">Sorry, you can only upload the following file formats: JPG, PNG and GIF. Thanks...</div>');
				return false;
			}
			else
			{
			  $('#vpb_uploads_error_displayer').html('<div class="uplading_image"><img src="/img/ajax-loader.gif" height="50" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response = "file_uploaded_successfully")
			{
			    var new_up_name_of_product = response;
				$('#vpb_uploads_error_displayer').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = new_up_name_of_product.substring(new_up_name_of_product.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = new_up_name_of_product.substr(0, new_up_name_of_product.lastIndexOf('.')) || new_up_name_of_product;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
{
$('#vpb_uploads_displayer').html('<div class="  vpb_imag e_wrappers row padding-5 margin-5" id="fileID'+vpb_file_names+'" ><div class="col-md-2"><input type="hidden" id="myfile" value="'+new_up_name_of_product+'" /><img src="'+uploaded_files_location+'/'+new_up_name_of_product+'" class="img-thumbnail" width="100"/></div><div class="col-md-6 text-primary" id="">'+new_up_name_of_product+'</div>       <div class="col-md-2 btn btn-primary add_prdt_images "  onClick="insert_image_loc_to_db_and_count(\''+new_up_name_of_product+'\',\''+product_id+'\');"><i class="glyphicon glyphicon-upload"></i> Upload</div>          <div class="col-md-2"><button class=" btn btn-warning " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file_product(\''+vpb_file_names+'\',\''+new_up_name_of_product+'\');">Remove</button></div></div>         ');
				} 
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF")
				{+product_id+
$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF")
				{
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>PDF Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Text File Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else
				{
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else
			{
				$('#vpb_uploads_error_displayer').html(response);
			}
		}
	});
	
});

//This displays the clicked product image
function display_product(image_loc)
{
$(".product_image").addClass('loading');
document.getElementById("product_image").innerHTML ="<img src='/img/products_images/mini/"+image_loc+"' width='450' class='img-rounded'>";
	
return false;	
}
//This removes all unwanted files
function remove_unwanted_file_product(id,file)
{
	if(confirm("If you are sure that you really want to remove the file "+file+" then click on OK otherwise, Cancel it."))
	{
		$.post("/ajax/product_img_del.php",  
				{
					task : "task",
				  	filename : file,
					cache: false,
				})
		.error(function()
		   {
			  console.log( "Error: " );
		   })
		.success(function(response)
		{
		    $('div#fileID'+id).fadeOut('slow');
			$("#myfile").val('NULL');
		});
	}
	return false;
}