<!-- IMPORTANT: Required at all pages -->
<script src="/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>
 <!--   <script type= "text/javascript" src = "/js/user_info_mini.js"></script>
  <script type="text/javascript" src="/include/chat/chat.js" ></script>
 Start Alexa Certify Javascript -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83580382-1', 'auto');
  ga('send', 'pageview');

</script>
 
<!-- End Alexa Certify Javascript -->  
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

<script> 
function image_loc(id)
{  
 $('#gif_image_holder_'+id+'').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
  var hiddenGifImg = $('#image_loc_'+id+'').val();
  $('#gif_image_holder_'+id+'').html('<a class="fancybox" href="/img/comments_images/'+hiddenGifImg+'.gif" ><img class="img img-rounded pull-left padding-5" src="/img/comments_images/'+hiddenGifImg+'.gif" width="50%" height="auto" alt=""/></a>');  
  $('#play_pause'+id+'').html('<img  class="text-muted font-sm" src="/img/site_img/reev_icons/reev_pa.png" onClick="image_loc_pause('+id+');" style="height:30px; margin-top:-18px;" />');
  }

  function image_loc_pause(id)
{
   $('#gif_image_holder_'+id+'').html('<div class="uplading_image">Uploading <img src="img/loading.gif" align="absmiddle" /></div>');
  var hiddenGifImg = $('#image_loc_'+id+'').val();
  $('#gif_image_holder_'+id+'').html('<a class="fancybox" href="/img/comments_images/'+hiddenGifImg+'.gif" ><img class="img img-rounded pull-left padding-5" src="/img/comments_images/mini/'+hiddenGifImg+'.jpg" width="50%" height="auto" alt=""/></a>');  
  $('#play_pause'+id+'').html('<img  class="text-muted font-sm" src="/img/site_img/reev_icons/reev_p.png" onClick="image_loc('+id+');" style="height:30px; margin-top:-18px;" />');
  
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

//setInterval(badge_notifier,15000);

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
			    document.getElementById('badge_notifier').innerHTML ='<b class="badge" style="color:white; background:red;">'+response+'</b>';
				
			}
			console.log(response);
			
			
           
});
}
</script> 
		<!-- MAIN APP JS FILE 
		<script src="js/app.min.js"></script>	-->	

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin 
		<script src="js/speech/voicecommand.min.js"></script>	-->	

		 
       