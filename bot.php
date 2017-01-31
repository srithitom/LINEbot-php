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
			
			else if ($text == 'Pic'){
			// Build message to reply back
			$messages = [
  			      'type' => 'image',
 				'originalContentUrl' => 'https://i.ytimg.com/vi/eaaPW7NU45c/maxresdefault.jpg',
  				'previewImageUrl' => 'https://raw.githubusercontent.com/kittinan/Sample-Line-Bot/master/images/beer_preview.jpg',
  		 	];
			}
			
			else if ($text == 'Vid'){
			// Build message to reply back
			$messages = [
  			      'type' => 'image',
 				'originalContentUrl' => 'http://dc733.4shared.com/img/ae0HFE0ice/766d2347/dlink__2Fdownload_2Fae0HFE0ice_3Fsbsr_3D4a04fd9818ab21ce9ef0faf04f34be5e998_26bip_3DMTE4LjE3Mi4xNjUuMTc4_26lgfp_3D1000_26dsid_3D1eyb4q.3a707cdf75a1a86c9c5542118bdc8dcc_26bip_3DMTE4LjE3Mi4xNjUuMTc4_26bip_3DMTE4LjE3Mi4xNjUuMTc4/preview.mp4',
  				'previewImageUrl' => 'https://raw.githubusercontent.com/kittinan/Sample-Line-Bot/master/images/beer_preview.jpg',
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
