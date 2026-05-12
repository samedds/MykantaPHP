//This does the file Uploads
$(document).ready(function()
{
	var myDate = Math.round(new Date().getTime()/1000);
	var user_id = $( '#user_id' ).val();
	var imageTag = user_id + "-" + myDate;
	var uploaded_files_location = "img/avatars/";
	new AjaxUpload($('#upload_user_pic'), 
	{
		action: '/uploader_user_pic.php',
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
				$('#pic').html('<div class="hover pic " id="pic"><p class="text-danger" align="left">Sorry, you can only upload the following file formats: JPG, PNG and GIF. Thanks...</p><div class="hover-toggle padding-10"><button class="btn  btn-default btn-sm "  id="upload_user_pic" style="opacity:0.5;">Change Profile Pic</button></div></div>');
				return false;
			}
			else
			{
			  $('#pic').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
			  return true;
			}
		},
		onComplete: function(file, response)
		{
			if(response === "file_uploaded_successfully")
			{
				$('#pic').html(''); //Empty the error message box
				
				
				//Check the type of file uploaded and display it rightly on the screen to the user and that's cool man
				var type_of_file_uploaded = file.substring(file.lastIndexOf('.') + 1); //Get files extensions
				
				var files_name_without_extensions = file.substr(0, file.lastIndexOf('.')) || file;
				vpb_file_names = files_name_without_extensions.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '');
				vpb_file_names = imageTag + "-" + vpb_file_names;
				var file = imageTag + "-" + file;
				
				if(type_of_file_uploaded == "gif" || type_of_file_uploaded == "GIF" || type_of_file_uploaded == "JPEG" || type_of_file_uploaded == "jpeg" || type_of_file_uploaded == "jpg" || type_of_file_uploaded == "JPG" || type_of_file_uploaded == "png" || type_of_file_uploaded == "PNG")
{
$('#pic').html('<div class="row" id="file_accept" >      <div class="col-md-2">                                      <button class=" btn btn-sm btn-default " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="accept_file(\''+vpb_file_names+'\',\''+file+'\');"><i class="glyphicon glyphicon-check"></i></button>                                                                                <button class=" btn btn-sm btn-default " id="vpb_remove_button'+vpb_file_names+'" class="vpb_remove_button" onclick="remove_unwanted_file(\''+vpb_file_names+'\',\''+file+'\');"><i class="glyphicon glyphicon-remove"></i></button></div>                                                                         <div class="col-md-10 pull-right"><input type="hidden" id="myfile" value="'+file+'" /><img src="'+uploaded_files_location+'/'+file+'" class="img-thumbnail" width="400"height="500"/></div>          </div>         ');
				} 
				else if(type_of_file_uploaded == "doc" || type_of_file_uploaded == "docx" || type_of_file_uploaded == "rtf" || type_of_file_uploaded == "DOC" || type_of_file_uploaded == "DOCX" || type_of_file_uploaded == "RTF" ||
				type_of_file_uploaded == "pdf" || type_of_file_uploaded == "PDF" ||
				type_of_file_uploaded == "txt" || type_of_file_uploaded == "TXT")
				{+user_id+
$('#pic').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:60px;padding-bottom:70px;' align='center'><span class='ccc'><a href='"+uploaded_files_location+"/"+file+"' target='_blank'>Microsoft Word Document<br><br>Click here to download it</a></span><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
				
				else
				{
					$('#pic').html("<div class='vpb_image_wrappers' id='fileID"+vpb_file_names+"' style='padding-top:80px;padding-bottom:90px;' align='center'>"+file+" uploaded<br clear='all'><div id='vpb_remove_button"+vpb_file_names+"' class='vpb_remove_button' onclick='remove_unwanted_file(\""+vpb_file_names+"\",\""+file+"\");'>Remove</div></div>");
				}
			} 
			else
			{
				$('#pic').html(response);
			}
		}
	});
	
});


function accept_file(id,file)
{
	var dataString =file;
		 $.post( "/ajax/profile_pic_proc.php " ,
		   {
			   task : "accept_im",
			   name : dataString
		   }
		  )
		  .error(
		  
			   function( )
			   {
				  console.log( "Error:");
			   })
		  .success(				 
			   function( data )
			   {
			    $('#pic').html('<div class="uplading_image"><img src="img/loading.gif" align="absmiddle" /></div>');
				
				$('#pic').html('');
				
			  $('#newpic').html('<div class="hover pic padding-10" id="pic"> <img src="img/avatars/'+file+'" class= "img-thumbnail" width="500" height="500"/> </div>');
			   
				
			    } 
			   );
	
	
}

function remove_unwanted_file(id,file)
{
	if(confirm("If you are sure that you really want to remove the file "+file+" then click on OK otherwise, Cancel it."))
	{
	    var get_profile_pic = $( '#get_profile_pic' ).val();
		
		  $('#newpic').html('<div class="hover pic padding-10" id="pic"> <img src="'+get_profile_pic+'" class= "img-thumbnail" width="500" height="500"/> </div>');
		  $('div#fileID'+id).fadeOut('slow');		
	}
	return false;
}