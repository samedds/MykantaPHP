<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
// $datetime_2 = date("D d M,y");
//$datetime =  date('D d M,y H:i:s A');
 
// This function uses a callback function. 
function doIt() 
{ 
    $data = "this is my data";
    $message = $_GET['message'];
    $status = $_GET['status'];
    $transaction_id = $_GET['transaction_id'];
	if( $status )
	{
		
	}
    myCallback($status,$message,$transaction_id); 
} 
// This is a sample callback function for doIt(). 
function myCallback($status,$message,$transaction_id) 
{ 
include "../include/conxn.php";

$query2 = "UPDATE place_order_vis SET mode = '$status' WHERE order_code = '$transaction_id'";
	if($new_q = mysqli_query($link,$query2))
	{
		print 'Database is: updated ' .  $status .  "\n".  $message .  "\n".  $transaction_id .  "\n"; 
$subject = "Mykanta-Korba Callback Success Trigger";
$message_user = "There was a trigger from Mykanta - Korba payment API with REF: '. $transaction_id.'";
$message_user_error = "There was a DB Connect Error on trigger from Mykanta - Korba payment API with REF: '. $transaction_id.'";
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type:text/html;charset=UTF-8'. "\r\n";
$headers .= 'From: Mykanta Product Order <no-reply@mykanta.com>'. "\r\n";
$mail_to_mykanta = 'support@mykanta.com';
//mail($mail_to_mykanta,$subject,$message_user,$headers);
	}else{
		echo "DB not updated / ".$transaction_id;
	}
 //mail($mail_to_mykanta,$subject,$message_user_error,$headers);
}


// Call doIt() and pass our sample callback function's name. 
doIt();
//$doc = new DomDocument();
//$doc->loadHTMLFile('/mykanta/check_out.php');
//$thediv = $doc->getElementById('result');
//echo $thediv->textContent;
// Create DOM from string
//$html = str_get_html('<div id="hello">Hello</div><div id="world">World</div>');

//$html->find('div', 1)->class = 'bar';

//$html->find('div[id=hello]', 0)->innertext = 'foo';

//echo $html;
   
?>