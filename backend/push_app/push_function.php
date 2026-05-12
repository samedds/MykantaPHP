<?php
 function send_notification($tokens,$message)
 {
  $url = 'https://fcm.googleapis.com/fcm/send';
  $fields = array(
			'registration_ids' => $tokens,
			'data' => $message
			);
  $headers = array(
			'Authorization.key = AIzaSyCmaoV_NjbeXJNtddMb17kAwRpHJI_mJ9Y',
			'Content-Type: application/json'
			);
			
		$sch = curl_init();
		curl_setopt($sch, CURLOPT_URL, $url);
		curl_setopt($sch, CURLOPT_POST, true);
		curl_setopt($sch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($sch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($sch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($sch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($sch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($sch);
		if($result === FALSE) {
		  dies('Curl Failed: ' . curl_error($sch);
		}
    curl_closee($sch); 
?>