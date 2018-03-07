<?php
$access_token = 'Bb80WnPZ0Gtp6Mu+P7IrcvgE5Hgfhim2bgG5EFZYhc3fSxaAs03zuCCrKH/2reCt+Ykplb3CsSuWIrG6lrtg8d5DUf8CL5G5H39qOuPI44//f9ypA57DnNbryDuRwhKS5tp2du/bQcze1dVmo/kf4wdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			if ($text == 'Hi'){
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'Hi, sir.'
			];
			}
			
			else if ($text == 'Who'){
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'I am a bot.'
			];
			}
			
			else if ($text == 'สมัคร'){
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => 'ต้องการเป็นสมาชิก?'
			];
			}
			
			else if ($text == 'Pic'){
			// Build message to reply back
			$messages = [
  			      'type' => 'image',
 				'originalContentUrl' => 'https://photos.app.goo.gl/f23Zj7ZyTKG2yp863',
  				'previewImageUrl' => 'https://www.img.in.th/images/af9972bd5adba50ca6098f6073e05899.jpg',
  		 	];
			}
			
			else if ($text == 'Img'){
			// Build message to reply back
			$messages = [
  			      'type' => 'image',
 				'originalContentUrl' => 'https://lh3.googleusercontent.com/8Sr3TCa5AT7hckLdHl9Ut_lMlfyqNpr4sd69xVMccf8Y0mJUk8CO2POENP64chxqBEcEG_WLNmFqZtkBZa03YPThFV4yZpWvWglkkesVSKksyYcOgDEZ1-owzTL89Tdz6d2Tb5Y08Zi0Mm5SnC8-3xTfK5UDXJULV5j3Jiqm6E4zjKfOinwnXjwj2kr-kzFENqAX2G2h62ErmEGbRig79-gPAGBQOMptaQKcy68IR4uBigTaoDJszx8dWQhxqJ8hWtSWspT57f62JcWYh-jvsLrcRuG9Sf5rsv1DKCRUzofC4aQFztLhUaHHeuf7Rd9h_l0zBu9iPte1U5jHxjRsOMeahHRxpfH7pnstf2XPQXfUFAzP--TSCS5rIHjTIdhhXAUQ7QW3aKp9nmcoKJ7nMMHYoEHVs20mGCO0Ltnv54RnaHbVUmppXsy1vVeFApoNCssk0R65caFYOV64D3f9ORU_mn746Dp3X9ycleXp6J0SKEgHQO2K-cvIOI5IIV0JCGcrvh_qrhB8v8ONT_FJygFh-wPnb1GvbFqcY4ViiClkHCHDmmRjqYv5nXBvZGyONDs-qp80NdHXsVlMKqBAgN0uCj3V5Mf64kTwU2HRjc1EAg-8TaIl=w1006-h629-no',
  				'previewImageUrl' => 'https://www.img.in.th/images/af9972bd5adba50ca6098f6073e05899.jpg',
  		 	];
			}
			
			
			else{
				$messages = [
				'type' => 'text',
				'text' => $text
			];
			}
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
