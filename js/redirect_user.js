$( document ).ready( function(){
	 	
var user_id = $( '#user_id' ).val();	 
var url = "index.php";
 if(user_id >= 1)
{
   alert(user_id);
}
else if(user_id == "")
{
 if (navigator.userAgent.match(/MSIE\s(?!9.0)/))
    {
        var referLink = document.createElement("a");
        referLink.href = url;
        document.body.appendChild(referLink);
        referLink.click();
    }
    else {
        // All other browsers
        window.location.replace(url);
    }
}
});
