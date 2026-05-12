<!-- IMPORTANT: Required at all pages -->

<script src="/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>
<!-- <script type= "text/javascript" src = "/js/user_info_mini.js"></script>
	 <script type="text/javascript" src="/js/nicescroll/jquery.nicescroll.js"></script>
 Start Alexa Certify Javascript -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83580382-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript">
	
function s_otr_buttons() {
  $('#product_search_button_show').show();
  $('#business_search_button_show').show();
  $('#search_search_button_show').hide();
}

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
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<!-- End Alexa Certify Javascript -->  
		<!-- BOOTSTRAP JS -->
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
	 $(document).ready(
function() {
//$("html").niceScroll({cursorcolor:"grey",cursorwidth:"14px"});
//$('.myscroll').niceScroll();
 //$(".customs_croll").niceScroll({cursorwidth:"10px",cursorcolor:"#C6C6C6"});
 //$(".myscroll").niceScroll({cursorwidth:"10px",cursorcolor:"#C6C6C6"});
 //$(".customs_croll").niceScroll({cursorwidth:"14px"});
}
);
</script>

</script> 
		<!-- MAIN APP JS FILE 
		<script src="js/app.min.js"></script>	-->	

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin 
		<script src="js/speech/voicecommand.min.js"></script>	

		
		<script src="/js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="/js/smart-chat-ui/smart.chat.manager.min.js"></script>-->	
       