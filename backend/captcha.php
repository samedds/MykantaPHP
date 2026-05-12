<?php 
//put file names in an array
$a=array("54azxc","59gub","231dmb","ama341","bc876","ekyz51","ftpd32","grow24","hip756","jhbv92","kan191","tan546","wde43","biz978");
$captca = $a[array_rand($a)];
//echo file name + .png
echo '<center>

<img id="'.$captca.'" src="/img/captcha/'.$captca.'.png" height="60px"/>
      <input type="hidden" id="captcha_img" value="'.$captca.'" /> 
      <input type="text" style="width:175px;height:33px; border-radius:8px;" id="captcha" placeholder=" Captcha text here" required />
	  </center>';
?>