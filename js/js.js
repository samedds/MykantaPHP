$(document).ready(function()
{
	new AjaxUpload($('#convert'), 
	{
		action:'ajax/ajax_convert.php',
		name: 'file',
		data: {
			convert : "convert",
		},
		onSubmit: function(file, file_extensions)
		{
		$('#vpb_uploads_error_displayer').html('<div class="vpb_error_info" align="left">Please wait.....</div>');
		},
		onComplete: function(file, response)
		{
			if(response === "video_uploaded_successfully")
			{
			
	$('#vpb_uploads_error_displayer').html('<h2>Convert to GIF</h2><script type="text/javascript">$(document).ready(function(){new AjaxUpload($("#convert"),{action:"ajax/ajax_convert.php",name: "file",data: {convert :"convert",},onSubmit: function(file, file_extensions){},onComplete: function(file, response){if(response === "video_uploaded_successfully"){	}}});});</script> <form > <input type="hidden" name="convert" value="/uploads/videos/temp/'+file+'"id="convert"/><input type="submit" value="Convert to GIF"/></form><div id="output2"></div>';
			
	$('#vpb_uploads_error_displayer').html('<h2>Convert to GIF</h2><script type="text/javascript"> </script> <form > <input type="hidden" name="convert" value="/uploads/videos/temp/'+file+'"id="convert"/><input type="submit" value="Convert to GIF"/></form><div id="output2"></div>');
			}
			
		} 
		}
	});
	
	{
				$('#vpb_uploads_error_displayer').html('<div class="vpb_error_info" align="left">Video Working</div>');
				$('#vpb_uploads_error_displayer').html('<h2>Convert to GIF</h2><script type="text/javascript">$(document).ready(function(){new AjaxUpload($("#convert"),{action:"ajax/jax_convert.php",name: "file",data: {convert :"convert",},onSubmit: function(file, file_extensions){},onComplete: function(file, response){if(response === "video_uploaded_successfully"){console.log(response);	}console.log(response);}});});</script> <form> <input type="file" name="convert" value="'+imageTag+''+file+'"id="convert"/><input type="submit" value="Convert to GIF" id="convert1"/></form><video controls="" width="400"><source type="video/mp4" src="uploads/videos/temp/'+imageTag+''+file+'"><embed src="uploads/videos/temp/'+imageTag+''+file+'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="410" height="auto"></video> <div id="output2"></div');
				console.log(file);
			}
	
	
	
