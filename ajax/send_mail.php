<?php
	/*------------------------------------------
	// post parameters: {sender, object, message}
	------------------------------------------*/
	$sender = $_POST["sender"];
	$object = "Mail submission via www.referendumcostituzionale2016.it - " . $_POST["object"];
	$message = $_POST["message"];
	
	mail("lorenzo.baldacci@gmail.com, e.gallinucci@gmail.com", $object, $message, 
		"From: " . $sender . "\r\n" .
		"Reply-To: " . $sender . "\r\n" .
		"X-Mailer: PHP/" . phpversion()
	);
	
	$res = array(result => "OK");
	print json_encode($res);
?>