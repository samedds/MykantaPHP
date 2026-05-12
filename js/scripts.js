function gifmodal()
{
//setTimeout(resetbtnblock(),10000);
 	var	video = document.getElementById('video');

	if(gifshot.isSupported()){
			
//----this code bring camera to video div
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true })
       .then(stream => {
		$(video).removeClass('playboxhide'); 
         video.src = window.URL.createObjectURL(stream);
         video.play();
		 document.getElementById('videostop').addEventListener('click', function () {   stopStream(stream); }); 
		 
		// document.getElementById('gifholder').addEventListener('change', function () {   stopStream(stream); });
       })
}
else{
alert('navigator error');
}
//=--------------end of video camera div
}
else{
alert('gif cant work , need plugin');
}

 
}

function postbtnblock()
{
	//var gifshot = require('gifshot');
	var infiniteblockdiv = document.getElementById("infiniteblockdiv"); 
	$(infiniteblockdiv).addClass('infinitblockmoveleft');
	$(infiniteblockdiv).removeClass('infinitblockmoveright');
	 var	vidholder = document.getElementById('video');
	 var	gifholder = document.getElementById('gifholder');
	 $(gifholder).addClass('playboxhide'); 
 //$(gifholder).addClass('payboxhide');
 $(vidholder).removeClass('payboxhide');
	var postblockdiv = document.getElementById("postblockdiv"); 
	$(postblockdiv).addClass('infinitblockmoveleft');
	$(postblockdiv).removeClass('infinitblockmoveright');
	//$(infiniteblockdiv).removeClass('show');
	var postBtn = document.getElementById("postBtn");
       $(postBtn).addClass('postBtnout');
       $(postBtn).removeClass('postBtnin');		
	   var cancelBtn = document.getElementById("cancelBtn");
       $(cancelBtn).addClass('postBtnin');
       $(cancelBtn).removeClass('postBtnout');	
	   
	    var	video = document.getElementById('video');
	
	if(gifshot.isSupported()){
		alert('gif will work');
		
//----this code bring camera to video div
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true })
       .then(stream => {
		$(video).removeClass('playboxhide'); 
         video.src = window.URL.createObjectURL(stream);
         video.play();
		 document.getElementById('cancelBtn').addEventListener('click', function () {   stopStream(stream); }); 
		 
		// document.getElementById('gifholder').addEventListener('change', function () {   stopStream(stream); });
       })
}
else{
alert('navigator error');
}
//=--------------end of video camera div
}
else{
alert('gif cant work , need plugin');
}
	
	
	
	// document.body.appendChild(animatedImage); 
	//video.src = image;
	 /*let _video=this.video.nativeElement;
 */ 
}
function stopStream(stream) {
console.log('stop called from JS');
 var	video = document.getElementById('video');
 $(video).addClass('playboxhide'); 

stream.getVideoTracks().forEach(function (track) {
    track.stop();
	
});
}
function cancelbtnblock()
{
	
	
	var infiniteblockdiv = document.getElementById("infiniteblockdiv"); 
	$(infiniteblockdiv).removeClass('infinitblockmoveleft');
	$(infiniteblockdiv).addClass('infinitblockmoveright');
	
	var postblockdiv = document.getElementById("postblockdiv"); 
	$(postblockdiv).addClass('infinitblockmoveright');
	$(postblockdiv).removeClass('infinitblockmoveleft');
	var postBtn = document.getElementById("postBtn");
       $(postBtn).removeClass('postBtnout');
       $(postBtn).addClass('postBtnin');	
	//$(infiniteblockdiv).removeClass('show');
	  var cancelBtn = document.getElementById("cancelBtn");
       $(cancelBtn).removeClass('postBtnin');
       $(cancelBtn).addClass('postBtnout');	

}

function resetbtnblock()
{
  var	video = document.getElementById('video');
  var	gifholder = document.getElementById('gifholder');
  
  
 if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true })
                          .then(stream => {
							$(video).removeClass('playboxhide'); 
							$(gifholder).addClass('playboxhide'); 
                            video.src = window.URL.createObjectURL(stream);
                            video.play();
							 document.getElementById('videostop').addEventListener('click', function () {   stopStream(stream); }); 
							 
							
							 })
  }
}  
 
 
 
 