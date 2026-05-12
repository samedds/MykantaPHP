var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
    var xmlHttp;
	if(window.ActiveXObject){
	   try{
	       xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		   }
		   catch(e){
		   xmlHttp = false;
		   }
	}else{
	   try{
	   xmlHttp = new XMLHttpRequest();
	    }
		   catch(e){
		   xmlHttp = false;
		   }
		}
		if(!xmlHttp)
		alert("something went wrong");
		else 
		    return xmlHttp;
	}		
	
function process(){
if(xmlHttp.readyState==0 || xmlHttp.readyState==4 ){
	username = encodeURIComponent(document.getElementById("username").value);
	xmlHttp.open("GET","include/usernamevalid.php?username="+ username,true);
	xmlHttp.onreadystatechange = handleServerResponse;
	xmlHttp.send(null);
}else{
    setTimeOut('process()',1000);
	} 
	}
	
function handleServerResponse(){
    if(xmlHttp.readyState==4){
	    if(xmlHttp.status==200){
		xmlResponse = xmlHttp.responseXML;
		xmlDocumentElement = xmlResponse.documentElement;
		message = xmlDocumentElement.firstChild.data;
		document.getElementById("useroutput").innerHTML = '<span style="color:blue">' + message + '</span>' ;   
		setTimeout('process()',5000);
  }else{
  alert('something went woof');
  }
  }
  }
		