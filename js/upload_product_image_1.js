
//This does the file Uploads
$(document).ready(function()
{
	var myDate = Math.round(new Date().getTime()/1000);
	var shop_id = $( '#shop_id' ).val();
	var imageTag = myDate + "-" + shop_id + "1";
	var uploaded_files_location = "/img/products_images";
	//Start of upload button 1
	new AjaxUpload($('#upload_button1'), 
	{
		action: '/uploader_product_multiple.php',
		name: 'file_to_upload',
		data: {imageTag : imageTag},
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
			  $('#vpb_uploads_error_displayer').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response = "file_uploaded_successfully")
			{
				$('#vpb_uploads_error_displayer').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = file.substring(file.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = file.substr(0, file.lastIndexOf('.')) || file;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				vpb_file_names = imageTag + "-" + vpb_file_names;
				var file = imageTag + "-" + file;
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
				{
					$('#vpb_uploads_displayer').html('<div class="  vpb_imag e_wrappers row padding-5 margin-5" id="fileID'+vpb_file_names+'" ><div class="col-md-6"><img src="'+uploaded_files_location+'/'+file+'" class="img-thumbnail" width="100"/></div> <div class="col-md-2"><button class=" btn btn-warning " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file_product_1(\''+vpb_file_names+'\',\''+file+'\');">Remove</button></div></div>         ');
					$('#myfile1').val(file);
					$('#upload_button1').hide();
				} 
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF")
				{+shop_id+
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_1(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF")
				{
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>PDF Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_1(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Text File Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_1(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else
				{
					$('#vpb_uploads_displayer').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_1(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else
			{
				$('#vpb_uploads_error_displayer').html(response+'<div class="vpb_error_info" align="left">upload_image_1 Sorry, your file upload was unsuccessful. Please reduce the size of your file <strong>(<1mb)</strong> and try again or contact this site admin to report this error message if the problem persist. Thanks...</div>');
			}
		}
	});
	//End Upload button 1
	//Start of upload button 2
	new AjaxUpload($('#upload_button2'), 
	{
		action: '/uploader_product_multiple.php',
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
				$('#vpb_uploads_error_displayer2').html('<div class="vpb_error_info" align="left">Sorry, you can only upload the following file formats: JPG, PNG and GIF. Thanks...</div>');
				return false;
			}
			else
			{
			  $('#vpb_uploads_error_displayer2').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response = "file_uploaded_successfully")
			{
				$('#vpb_uploads_error_displayer2').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = file.substring(file.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = file.substr(0, file.lastIndexOf('.')) || file;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				vpb_file_names = imageTag + "-" + vpb_file_names;
				var file = imageTag + "-" + file;
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
				{
					$('#vpb_uploads_displayer2').html('<div class="  vpb_imag e_wrappers row padding-5 margin-5" id="fileID'+vpb_file_names+'" ><div class="col-md-6"><img src="'+uploaded_files_location+'/'+file+'" class="img-thumbnail" width="100"/></div> <div class="col-md-2"><button class=" btn btn-warning " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file_product_2(\''+vpb_file_names+'\',\''+file+'\');">Remove</button></div></div>         ');
					$('#myfile2').val(file);
					$('#upload_button2').hide();
				} 
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF")
				{+shop_id+
					$('#vpb_uploads_displayer2').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_2(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF")
				{
					$('#vpb_uploads_displayer2').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>PDF Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_2(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{
					$('#vpb_uploads_displayer2').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Text File Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_2(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else
				{
					$('#vpb_uploads_displayer2').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_2(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else
			{
				$('#vpb_uploads_error_displayer2').html('<div class="vpb_error_info" align="left">Sorry, your file upload was unsuccessful. Please reduce the size of your file <strong>(<1mb)</strong> and try again or contact this site admin to report this error message if the problem persist. Thanks...</div>');
			}
		}
	});
	//End Upload button 2
	//Start of upload button 3
	new AjaxUpload($('#upload_button3'), 
	{
		action: '/uploader_product_multiple.php',
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
				$('#vpb_uploads_error_displayer3').html('<div class="vpb_error_info" align="left">Sorry, you can only upload the following file formats: JPG, PNG and GIF. Thanks...</div>');
				return false;
			}
			else
			{
			  $('#vpb_uploads_error_displayer3').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response = "file_uploaded_successfully")
			{
				$('#vpb_uploads_error_displayer3').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = file.substring(file.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = file.substr(0, file.lastIndexOf('.')) || file;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				vpb_file_names = imageTag + "-" + vpb_file_names;
				var file = imageTag + "-" + file;
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
				{
					$('#vpb_uploads_displayer3').html('<div class="  vpb_imag e_wrappers row padding-5 margin-5" id="fileID'+vpb_file_names+'" ><div class="col-md-6"><img src="'+uploaded_files_location+'/'+file+'" class="img-thumbnail" width="100"/></div> <div class="col-md-2"><button class=" btn btn-warning " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file_product_3(\''+vpb_file_names+'\',\''+file+'\');">Remove</button></div></div>         ');
					$('#myfile3').val(file);
					$('#upload_button3').hide();
				} 
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF")
				{+shop_id+
					$('#vpb_uploads_displayer3').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_3(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF")
				{
					$('#vpb_uploads_displayer3').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>PDF Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_3(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{
					$('#vpb_uploads_displayer3').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Text File Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_3(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else
				{
					$('#vpb_uploads_displayer3').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_3(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else
			{
				$('#vpb_uploads_error_displayer3').html('<div class="vpb_error_info" align="left">Sorry, your file upload was unsuccessful. Please reduce the size of your file <strong>(<1mb)</strong> and try again or contact this site admin to report this error message if the problem persist. Thanks...</div>');
			}
		}
	});
	//End Upload button 3
	//Start of upload button 4
	new AjaxUpload($('#upload_button4'), 
	{
		action: '/uploader_product_multiple.php',
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
				$('#vpb_uploads_error_displayer4').html('<div class="vpb_error_info" align="left">Sorry, you can only upload the following file formats: JPG, PNG and GIF. Thanks...</div>');
				return false;
			}
			else
			{
			  $('#vpb_uploads_error_displayer4').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response = "file_uploaded_successfully")
			{
				$('#vpb_uploads_error_displayer4').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = file.substring(file.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = file.substr(0, file.lastIndexOf('.')) || file;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				vpb_file_names = imageTag + "-" + vpb_file_names;
				var file = imageTag + "-" + file;
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
				{
					$('#vpb_uploads_displayer4').html('<div class="  vpb_imag e_wrappers row padding-5 margin-5" id="fileID'+vpb_file_names+'" ><div class="col-md-6"><img src="'+uploaded_files_location+'/'+file+'" class="img-thumbnail" width="100"/></div> <div class="col-md-2"><button class=" btn btn-warning " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file_product_4(\''+vpb_file_names+'\',\''+file+'\');">Remove</button></div></div>         ');
					$('#myfile4').val(file);
					$('#upload_button4').hide();
				} 
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF")
				{+shop_id+
					$('#vpb_uploads_displayer4').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_4(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF")
				{
					$('#vpb_uploads_displayer4').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>PDF Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_4(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{
					$('#vpb_uploads_displayer4').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Text File Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_4(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else
				{
					$('#vpb_uploads_displayer4').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_4(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else
			{
				$('#vpb_uploads_error_displayer4').html('<div class="vpb_error_info" align="left">Sorry, your file upload was unsuccessful. Please reduce the size of your file <strong>(<1mb)</strong> and try again or contact this site admin to report this error message if the problem persist. Thanks...</div>');
			}
		}
	});
	//End Upload button 4
	//Start of upload button 5
	new AjaxUpload($('#upload_button5'), 
	{
		action: '/uploader_product_multiple.php',
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
				$('#vpb_uploads_error_displayer5').html('<div class="vpb_error_info" align="left">Sorry, you can only upload the following file formats: JPG, PNG and GIF. Thanks...</div>');
				return false;
			}
			else
			{
			  $('#vpb_uploads_error_displayer5').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response = "file_uploaded_successfully")
			{
				$('#vpb_uploads_error_displayer5').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = file.substring(file.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = file.substr(0, file.lastIndexOf('.')) || file;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				vpb_file_names = imageTag + "-" + vpb_file_names;
				var file = imageTag + "-" + file;
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
				{
					$('#vpb_uploads_displayer5').html('<div class="  vpb_imag e_wrappers row padding-5 margin-5" id="fileID'+vpb_file_names+'" ><div class="col-md-6"><img src="'+uploaded_files_location+'/'+file+'" class="img-thumbnail" width="100"/></div> <div class="col-md-2"><button class=" btn btn-warning " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file_product_5(\''+vpb_file_names+'\',\''+file+'\');">Remove</button></div></div>         ');
					$('#myfile5').val(file);
					$('#upload_button5').hide();
				} 
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF")
				{+shop_id+
					$('#vpb_uploads_displayer5').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_5(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF")
				{
					$('#vpb_uploads_displayer5').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>PDF Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_5(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{
					$('#vpb_uploads_displayer5').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Text File Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_5(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else
				{
					$('#vpb_uploads_displayer5').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_5(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else
			{
				$('#vpb_uploads_error_displayer5').html('<div class="vpb_error_info" align="left">Sorry, your file upload was unsuccessful. Please reduce the size of your file <strong>(<1mb)</strong> and try again or contact this site admin to report this error message if the problem persist. Thanks...</div>');
			}
		}
	});
	//End Upload button 5
	//Start of upload button 6
	new AjaxUpload($('#upload_button6'), 
	{
		action: '/uploader_product_multiple.php',
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
				$('#vpb_uploads_error_displayer6').html('<div class="vpb_error_info" align="left">Sorry, you can only upload the following file formats: JPG, PNG and GIF. Thanks...</div>');
				return false;
			}
			else
			{
			  $('#vpb_uploads_error_displayer6').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response = "file_uploaded_successfully")
			{
				$('#vpb_uploads_error_displayer6').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = file.substring(file.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = file.substr(0, file.lastIndexOf('.')) || file;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				vpb_file_names = imageTag + "-" + vpb_file_names;
				var file = imageTag + "-" + file;
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
				{
					$('#vpb_uploads_displayer6').html('<div class="  vpb_imag e_wrappers row padding-5 margin-5" id="fileID'+vpb_file_names+'" ><div class="col-md-6"><img src="'+uploaded_files_location+'/'+file+'" class="img-thumbnail" width="100"/></div> <div class="col-md-2"><button class=" btn btn-warning " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file_product_6(\''+vpb_file_names+'\',\''+file+'\');">Remove</button></div></div>         ');
					$('#myfile6').val(file);
					$('#upload_button6').hide();
				} 
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF")
				{+shop_id+
					$('#vpb_uploads_displayer6').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_6(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF")
				{
					$('#vpb_uploads_displayer6').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>PDF Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_6(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{
					$('#vpb_uploads_displayer6').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Text File Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_6(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else
				{
					$('#vpb_uploads_displayer6').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_6(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else
			{
				$('#vpb_uploads_error_displayer6').html('<div class="vpb_error_info" align="left">Sorry, your file upload was unsuccessful. Please reduce the size of your file <strong>(<1mb)</strong> and try again or contact this site admin to report this error message if the problem persist. Thanks...</div>');
			}
		}
	});
	//End Upload button 6
	//Start of upload button 7
	new AjaxUpload($('#upload_button7'), 
	{
		action: '/uploader_product_multiple.php',
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
				$('#vpb_uploads_error_displayer7').html('<div class="vpb_error_info" align="left">Sorry, you can only upload the following file formats: JPG, PNG and GIF. Thanks...</div>');
				return false;
			}
			else
			{
			  $('#vpb_uploads_error_displayer7').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response = "file_uploaded_successfully")
			{
				$('#vpb_uploads_error_displayer7').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = file.substring(file.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = file.substr(0, file.lastIndexOf('.')) || file;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				vpb_file_names = imageTag + "-" + vpb_file_names;
				var file = imageTag + "-" + file;
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
				{
					$('#vpb_uploads_displayer7').html('<div class="  vpb_imag e_wrappers row padding-5 margin-5" id="fileID'+vpb_file_names+'" ><div class="col-md-6"><img src="'+uploaded_files_location+'/'+file+'" class="img-thumbnail" width="100"/></div> <div class="col-md-2"><button class=" btn btn-warning " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file_product_7(\''+vpb_file_names+'\',\''+file+'\');">Remove</button></div></div>         ');
					$('#myfile7').val(file);
					$('#upload_button7').hide();
				} 
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF")
				{+shop_id+
					$('#vpb_uploads_displayer7').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_7(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF")
				{
					$('#vpb_uploads_displayer7').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>PDF Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_7(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else if(type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{
					$('#vpb_uploads_displayer7').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Text File Document<br><br>Click here to view it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_7(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				else
				{
					$('#vpb_uploads_displayer7').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file_product_7(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else
			{
				$('#vpb_uploads_error_displayer7').html('<div class="vpb_error_info" align="left">Sorry, your file upload was unsuccessful. Please reduce the size of your file <strong>(<1mb)</strong> and try again or contact this site admin to report this error message if the problem persist. Thanks...</div>');
			}
		}
	});
	//End Upload button 7
	
});


//This removes all unwanted files
function display_product(image_loc)
{
$(".product_image").addClass('loading');
document.getElementById("product_image").innerHTML ="<img src='"+image_loc+"' width='450' class='img-rounded'>";
	
return false;	
}
function remove_unwanted_file_product_1(id,file)
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
			$("#myfile1").val('');
			$('#upload_button1').show();
		});
	}
	return false;
}
function remove_unwanted_file_product_2(id,file)
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
			$("#myfile2").val('');
			$('#upload_button2').show();
		});
	}
	return false;
}
function remove_unwanted_file_product_3(id,file)
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
			$("#myfile3").val('');
			$('#upload_button3').show();
		});
	}
	return false;
}
function remove_unwanted_file_product_4(id,file)
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
			$("#myfile4").val('');
			$('#upload_button4').show();
		});
	}
	return false;
}
function remove_unwanted_file_product_5(id,file)
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
			$("#myfile5").val('');
			$('#upload_button5').show();
		});
	}
	return false;
}
function remove_unwanted_file_product_6(id,file)
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
			$("#myfile6").val('');
			$('#upload_button6').show();
		});
	}
	return false;
}
function remove_unwanted_file_product_7(id,file)
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
			$("#myfile7").val('');
			$('#upload_button7').show();
		});
	}
	return false;
}
