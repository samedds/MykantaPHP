<!-- IMPORTANT: Required at all pages -->
<script type= "text/javascript" src = "/js/user_info_mini.js"></script>
<script src="/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>
 <script type="text/javascript" src="/js/nicescroll/jquery.nicescroll.js"></script>
<!-- Start Alexa Certify Javascript -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-83580382-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-83580382-1');
</script>

<script>
   function logout()
{ 
		 $.post("/logout.php",  
				{
					logout : "logout",		  		
					cache: false,
				})
				.error(function( )
					  {
						  console.log( "Error: " );
					   })
					.success(function(response)
					{
						 
						console.log(response);
						localStorage.removeItem('email_user');
			            window.location="/home";
					});
	 
}
 
</script>
<!-- End Alexa Certify Javascript 

        <script type="text/javascript" src="/include/chat/chat.js" ></script>
		-->  
		<script src="/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="/js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="/js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="/js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="/js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="/js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

<!-- Demo purpose only
<script src="/js/demo.js"></script> -->

<!-- MAIN APP JS FILE -->
<script src="/js/app.js"></script>

<script type="text/javascript">
	
function s_otr_buttons() {
 //document.getElementById('search_search_button_show').innerHTML =  'yaaa';
// $('#product_search_button_show').show();
 // $('#business_search_button_show').show();
//$('#search_icon').style.display = 'none';
 //$('#search_icon').hide();


 document.getElementById('search_search_button_show').innerHTML =  '	<button class="btn btn-outline  padding-10 " name="search_product" id="search_product" style="height:32px;width:auto;border-radius: 12px; "  type="submit" title="Product search"><p style="margin-top:-5px;"> Product </p></button> <button class="btn btn-outline padding-10" name="search_shops" id="search_shops" style="height:32px;width:auto;border-radius: 12px; " type="submit"title="Business search" ><p style="margin-top:-5px;">Business</p></button>';
}
</script>

<script type="text/javascript">
	 $(document).ready(
function() {
//$("html").niceScroll({cursorwidth:"14px"});
//$('.myscroll').niceScroll();
// $(".customs_croll").niceScroll({cursorcolor:"#5bc0de"});
 $(".customs_croll").niceScroll({cursorwidth:"10px",cursorcolor:"#C6C6C6"});
}
);
</script>
<script> 
function image_home(id)
{  
  var hiddenGifImg = $('#image_loc_'+id).val();
 if (id.lengthComputable){
 progressBar.value = id.loaded / id.total * 100;}
	
 $.post( "/ajax/load_more_reevs.php " ,
		   {
			   image_loc : "image_loc",
		   }
		  )
		  .error(
			   function( )
			   {
				
			   })
		 .success(function(response)
			{
			if(response > 00)
			{  
		          var num = Math.random();
				 // $('#gif_image_holder_'+id+'').fadeTo( "fast",1);
				  $('#gif_image_holder_'+id+'').removeClass('right-image');
				  $('#gif_image_holder_'+id+'').removeClass(' right-image-last');
				  
				  //$('#gif_image_holder_'+id+'').css("top", "0px");
				
			$('#pauser'+id+'').html('<div class="right-image right-image-last"id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:50px;margin-top:-35px;" src="/img/loader1.gif" ><img class="hidden-xs hidden-sm" style="width:50px; margin-left:50px;" src="/img/loader1.gif" ></div>'); 
			//$('#backer'+id+'').onClick('image_loc_pause('+id+')');
			setTimeout(function(){$('#pauser'+id+'').html('<div class="no-padding left-image"onClick="image_loc_pause('+id+');" style=""><img  class="img" src="/img/comments_images/'+hiddenGifImg+'.gif?v='+num+'" onClick="image_loc_pause('+id+');" style="margin-left:30px; top:20px;width:100%; height:auto;"/></div><div class="right-image right-image-last" id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:0px; z-index:1;" src="/img/loader_pause.png" onClick="image_loc_pause('+id+');"><img class="hidden-xs hidden-sm" style="width:70px; z-index:1;" src="/img/loader_pause.png" onClick="image_loc_pause('+id+');"></div>'); },3000);
				//$('#gif_image_holder_'+id+'').html('<div class="right-image-last"  ><img src="/img/comments_images/'+hiddenGifImg+'.gif" style=" top:0px;width:100%; height:auto;"/></div><div class=" right-image-last" id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px;" src="/img/loader_pause.png" onClick="image_loc_pause('+id+');"><img class="hidden-xs hidden-sm" style="width:70px;" src="/img/loader_pause.png" onClick="image_loc_pause('+id+');"></div>'); 
			
		// $('#backer'+id+'').html('<img class="img" id="image_'+id+'"  style="" src="/img/comments_images/mini/'+hiddenGifImg+'.jpg"  width="100%; height:auto;" style=" z-index:-1; " alt=""/>'); 
		  $('#gif_image_holder_'+id+'').addClass('right-image');
		  $('#gif_image_holder_'+id+'').addClass('right-image-last');
		  $('#play_pause'+id+'').html('<i class="fa fa-2x fa-pause"onClick="image_loc_pause('+id+');" ></i>');
				   $('#image_'+id+'').fadeTo( "slow", 0.05);
				}  else{
			   $('#play_pause'+id+'').html('<i class="fa fa-2x fa-pause"onClick="image_loc_pause('+id+');" ></i>');
			}
			
});







  }
  function image_loc(id)
{  

 if (id.lengthComputable){
 progressBar.value = id.loaded / id.total * 100;}
	
 $.post( "/ajax/load_more_reevs.php " ,
		   {
			   image_loc : "image_loc",
		   }
		  )
		  .error(
			   function( )
			   {
				
			   })
		 .success(function(response)
			{
			if(response > 00)
			{  
		          var num = Math.random();
				 // $('#gif_image_holder_'+id+'').fadeTo( "fast",1);
				  $('#gif_image_holder_'+id+'').removeClass('right-image');
				  $('#gif_image_holder_'+id+'').removeClass(' right-image-last');
				  
				  //$('#gif_image_holder_'+id+'').css("top", "0px");
				  var hiddenGifImg = $('#image_loc_'+id+'').val();
			$('#pauser'+id+'').html('<div class="right-image right-image-last"id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:50px;margin-top:-75px;" src="/img/loader1.gif" ><img class="hidden-xs hidden-sm" style="width:50px; margin-left:10px;" src="/img/loader1.gif" ></div>'); 
			//$('#backer'+id+'').onClick('image_loc_pause('+id+')');
			setTimeout(function(){$('#pauser'+id+'').html('<div class="no-padding left-image"onClick="image_loc_pause('+id+');" style=""><img  class="img" src="/img/comments_images/'+hiddenGifImg+'.gif?v='+num+'" onClick="image_loc_pause('+id+');" style="margin-left:30px; top:0px;width:100%; height:auto;"/></div><div class="right-image right-image-last" id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px; z-index:1;" src="/img/loader_pause.png" onClick="image_loc_pause('+id+');"><img class="hidden-xs hidden-sm" style="width:70px; z-index:1;" src="/img/loader_pause.png" onClick="image_loc_pause('+id+');"></div>'); },3000);
				//$('#gif_image_holder_'+id+'').html('<div class="right-image-last"  ><img src="/img/comments_images/'+hiddenGifImg+'.gif" style=" top:0px;width:100%; height:auto;"/></div><div class=" right-image-last" id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px;" src="/img/loader_pause.png" onClick="image_loc_pause('+id+');"><img class="hidden-xs hidden-sm" style="width:70px;" src="/img/loader_pause.png" onClick="image_loc_pause('+id+');"></div>'); 
			
		// $('#backer'+id+'').html('<img class="img" id="image_'+id+'"  style="" src="/img/comments_images/mini/'+hiddenGifImg+'.jpg"  width="100%; height:auto;" style=" z-index:-1; " alt=""/>'); 
		  $('#gif_image_holder_'+id+'').addClass('right-image');
		  $('#gif_image_holder_'+id+'').addClass('right-image-last');
		  $('#play_pause'+id+'').html('<i class="fa fa-2x fa-pause"onClick="image_loc_pause('+id+');" ></i>');
				   $('#image_'+id+'').fadeTo( "slow", 0.05);
				}  else{
			   $('#play_pause'+id+'').html('<i class="fa fa-2x fa-pause"onClick="image_loc_pause('+id+');" ></i>');
			}
			
});







  }

  function image_loc_home(id)
{var num = Math.random();
	  //$('#gif_image_holder_'+id+'').addClass('right-image');
	 // $('#gif_image_holder_'+id+'').addClass('right-image-last');
 $('#pauser'+id+'').html('<div class=" right-image right-image-last" id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('+id+');"> <img class="hidden-xs hidden-sm" style="width:70px;" src="/img/loader.png" onClick="image_loc('+id+');"></div>');

 setTimeout(function(){$('#pauser'+id+'').html('<div class=" right-image right-image-last" id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('+id+');"> <img class="hidden-xs hidden-sm" style="width:70px;" src="/img/loader.png" onClick="image_loc('+id+');"></div>'); },3000);
  var hiddenGifImg = $('#image_loc_'+id+'').val();
    $('#image_'+id+'').fadeTo( "slow", 1);
  $('#backer'+id+'').html('<img class="img" id="image_'+id+'" onClick="image_loc_pause('+id+');" style="" src="/img/comments_images/mini/'+hiddenGifImg+'.jpg?v='+num+'"  width="100%; height:auto;" style=" " alt=""/>');  
   $('#gif_image_holder_'+id+'').fadeTo( "fast", 1.00);
  $('#play_pause'+id+'').html('<i class="fa fa-2x fa-play"onClick="image_loc('+id+');" ></i>');
  
}
  function image_loc_pause(id)
{var num = Math.random();
	  //$('#gif_image_holder_'+id+'').addClass('right-image');
	 // $('#gif_image_holder_'+id+'').addClass('right-image-last');
 $('#pauser'+id+'').html('<div class=" right-image right-image-last" id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('+id+');"> <img class="hidden-xs hidden-sm" style="width:70px;" src="/img/loader.png" onClick="image_loc('+id+');"></div>');

 setTimeout(function(){$('#pauser'+id+'').html('<div class=" right-image right-image-last" id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px;" src="/img/loader.png" onClick="image_loc('+id+');"> <img class="hidden-xs hidden-sm" style="width:70px;" src="/img/loader.png" onClick="image_loc('+id+');"></div>'); },3000);
  var hiddenGifImg = $('#image_loc_'+id+'').val();
    $('#image_'+id+'').fadeTo( "slow", 1);
  $('#backer'+id+'').html('<img class="img" id="image_'+id+'" onClick="image_loc_pause('+id+');" style="" src="/img/comments_images/mini/'+hiddenGifImg+'.jpg?v='+num+'"  width="100%; height:auto;" style=" " alt=""/>');  
   $('#gif_image_holder_'+id+'').fadeTo( "fast", 1.00);
  $('#play_pause'+id+'').html('<i class="fa fa-2x fa-play"onClick="image_loc('+id+');" ></i>');
  
}

function image_loc_conn(id)
{  

 if (id.lengthComputable){
 progressBar.value = id.loaded / id.total * 100;}
	
 $.post( "/ajax/load_more_reevs.php " ,
		   {
			   image_loc : "image_loc",
		   }
		  )
		  .error(
			   function( )
			   {
				
			   })
		 .success(function(response)
			{
			if(response > 00)
			{  
		         // $('#gif_image_holder_'+id+'').fadeTo( "fast",1);
				  $('#gif_image_holder_conn'+id+'').removeClass('right-image');
				  $('#gif_image_holder_conn'+id+'').removeClass(' right-image-last');
				   var num = Math.random();
				  //$('#gif_image_holder_'+id+'').css("top", "0px");
				  var hiddenGifImg = $('#image_loc_'+id+'').val();
			$('#pauser_conn'+id+'').html('<div class="right-image right-image-last"id="gif_image_holder_conn'+id+'"><img class="hidden-md hidden-lg" style="width:50px;margin-top:100px;" src="/img/loader1.gif" ><img class="hidden-xs hidden-sm" style="width:50px;margin-top:100px; margin-left:10px;" src="/img/loader1.gif" ></div>'); 
			//$('#backer'+id+'').onClick('image_loc_pause('+id+')');
			setTimeout(function(){$('#pauser_conn'+id+'').html('<div class=" left-image"onClick="image_loc_pause_conn('+id+');" style=""><img  class="img" src="/img/comments_images/'+hiddenGifImg+'.gif?v='+num+'" onClick="image_loc_pause_conn('+id+');" style="margin-left:-5px; top:0px;width:100%; height:auto;"/></div><div class="right-image right-image-last" id="gif_image_holder_conn'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:100px; z-index:1;" src="/img/loader_pause.png" onClick="image_loc_pause_conn('+id+');"/><img class="hidden-xs hidden-sm" style="width:70px; margin-top:100px;  z-index:1;" src="/img/loader_pause.png" onClick="image_loc_pause_conn('+id+');"/></div>'); },3000);
				//$('#gif_image_holder_'+id+'').html('<div class="right-image-last"  ><img src="/img/comments_images/'+hiddenGifImg+'.gif" style=" top:0px;width:100%; height:auto;"/></div><div class=" right-image-last" id="gif_image_holder_'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:-70px;" src="/img/loader_pause.png" onClick="image_loc_pause_conn('+id+');"><img class="hidden-xs hidden-sm" style="width:70px;" src="/img/loader_pause.png" onClick="image_loc_pause_conn('+id+');"></div>'); 
			
		// $('#backer'+id+'').html('<img class="img" id="image_'+id+'"  style="" src="/img/comments_images/mini/'+hiddenGifImg+'.jpg"  width="100%; height:auto;" style=" z-index:-1; " alt=""/>'); 
		  $('#gif_image_holder_conn'+id+'').addClass('right-image');
		  $('#gif_image_holder_conn'+id+'').addClass('right-image-last');
		  $('#play_pause_conn'+id+'').html('<i class="fa fa-2x fa-pause"onClick="image_loc_pause_conn('+id+');" ></i>');
				   $('#image_conn'+id+'').fadeTo( "slow", 0.05);
				}  else{
			   $('#play_pause_conn'+id+'').html('<i class="fa fa-2x fa-pause"onClick="image_loc_pause_conn('+id+');" ></i>');
			}
			
});







  }

  function image_loc_pause_conn(id)
{
	   var num = Math.random();
	   //$('#gif_image_holder_'+id+'').addClass('right-image');
	 // $('#gif_image_holder_'+id+'').addClass('right-image-last');
 $('#pauser_conn'+id+'').html('<div class=" right-image right-image-last" id="gif_image_holder_conn'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:100px;" src="/img/loader.png" onClick="image_loc_conn('+id+');"> <img class="hidden-xs hidden-sm" style="width:70px;margin-top:100px;" src="/img/loader.png" onClick="image_loc_conn('+id+');"></div>');

 setTimeout(function(){$('#pauser_conn'+id+'').html('<div class=" right-image right-image-last" id="gif_image_holder_conn'+id+'"><img class="hidden-md hidden-lg" style="width:70px;margin-top:100px;" src="/img/loader.png" onClick="image_loc_conn('+id+');"> <img class="hidden-xs hidden-sm" style="width:70px; margin-top:100px;" src="/img/loader.png" onClick="image_loc_conn('+id+');"></div>'); },3000);
  var hiddenGifImg = $('#image_loc_'+id+'').val();
    $('#image_conn'+id+'').fadeTo( "slow", 1);
  $('#backer_conn'+id+'').html('<img class="img" id="image_conn'+id+'" onClick="image_loc_pause_conn('+id+');" style="" src="/img/comments_images/mini/'+hiddenGifImg+'.jpg?v='+num+'"  width="100%; height:auto;" style=" " alt=""/>');  
   $('#gif_image_holder_conn'+id+'').fadeTo( "fast", 1.00);
  $('#play_pause_conn'+id+'').html('<i class="fa fa-2x fa-play"onClick="image_loc_conn('+id+');" ></i>');
}

function notifier_update()
{

document.getElementById('notification1').innerHTML  = '<div class=""><img src="/img/loading.gif"/></div>'; 

	 $.post( "/include/notifier.php " ,
		   {
			   notifier : "notifier",
		   }
		  )
		  .error(
			   function( )
			   {
				
			   })
		 .success(function(response)
			{
			document.getElementById('notification1').innerHTML =response;
			
});
}

</script>
	<script> 

setInterval(badge_notifier,100000);

function badge_notifier()
{
	 $.post( "/include/badge_notifier.php " ,
		   {
			   badge_notifier : "badge_notifier",
		   }
		  )
		  .error(
			   function( )
			   {
				
			   })
		 .success(function(response)
			{
			if(response > 00)
			{
			    document.getElementById('badge_notifier').innerHTML ='<b class="badge" style="color:white; background:#a90329;">'+response+'</b>';
				
			}
			//console.log(response);
			
			
           
});
}
</script> 
		<!-- MAIN APP JS FILE 
		<script src="js/app.min.js"></script>	-->	

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin 
		<script src="js/speech/voicecommand.min.js"></script>	

		
		<script src="/js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="/js/smart-chat-ui/smart.chat.manager.min.js"></script>-->	
       