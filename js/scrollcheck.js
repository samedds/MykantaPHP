
 $(document).ready(function(){
		var newbar = 0;
	
  var bar = document.getElementById("scrolltab");
          $(bar).scroll(function() {
 //  if($(document).height() - 400 <= document.getElementById("app-card-list-item").height() + document.getElementById("app-card-list-item").scrollTop()){
           // ajax call get data from server and append to the div
		    // - $(window).height()
			//alert('good');
			//$("#load_reev_button").click();
		//	document.getElementById("load_reev_button").click();
			//$(document).on("click", "#load_reev_button", function(){
			//do something
			var bartop = $(bar).scrollTop();
			//console.log('newbaer '+ newbar);
			//console.log('bartop '+bartop);
			if( newbar < bartop)
			{
			 newbar = bartop;	
			var usercard = document.getElementById("usercard"); 
			$(usercard).addClass('step');
			$(usercard).removeClass('show');
			
			var tabbar = document.getElementById("tabbar");
             $(tabbar).addClass('tabbartop');
             $(tabbar).removeClass('tabbardown');
			 
			var postBtn = document.getElementById("postBtn");
             $(postBtn).addClass('postBtnout');
             $(postBtn).removeClass('postBtnin');
		     
			 // $(tabbar).removeClass('tabbardown');
			// console.log('newbar < bartop ');
			}
			//console.log(bartop);
			if( bartop < newbar )
			{
			  newbar = bartop;	
			var usercard = document.getElementById("usercard");
             $(usercard).removeClass('step');
             $(usercard).addClass('show');
			 
			 var tabbar = document.getElementById("tabbar");
              $(tabbar).removeClass('tabbartop');
			     $(tabbar).addClass('tabbardown');
			 	// console.log('newbar > bartop ');
			var postBtn = document.getElementById("postBtn");
             $(postBtn).removeClass('postBtnout');
             $(postBtn).addClass('postBtnin');
			}
			// console.log('zoooooooooo');	
           // console.log(document.getElementById("app-card-list-item").scrollTop()+' + '+document.getElementById("app-card-list-item").height()+' = '+$(document).height()); 
  //  } 
	/*else {	alert($(window).scrollTop()+'  ---   '+$("body").scrollTop()+'  ---   '+$(document).height()+'  ----  '+$(window).height());
	}*/
	
	//if($(window).scrollTop() > 120   ){  $("#gif_mb_btn").fadeOut('slow'); }
	
	//if($(window).scrollTop() <= 120   ){  $("#gif_mb_btn").fadeIn('slow');}
	
	
	//if($(window).scrollTop() >= 125   ){  $("#the-sticky-div").addClass('sticky');}
	//if($(window).scrollTop() <= 124   ){  $("#the-sticky-div").removeClass('sticky');}
});
            
        });
		
