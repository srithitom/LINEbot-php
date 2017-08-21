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
 				'originalContentUrl' => 'https://lh3.googleusercontent.com/xh7P8uFc4MzYaYpzgDC8eguUbkRELqqdrOCqjTHsgtAw-G9OY1poRliRgqRx6lZ4ecuKsML3sLFA_xFEiAJ5116ufH93Gllh6XX1wtn2ITunZniYdgN5q1g66_reg60BZeyjZG7c9eqjYHimquSxW3cDAUlFuGyNM9WqpR1t-hG9BY9UPO5TF3Y_PfuZ0TXiNIfLZSKb3wWKXIbDIFZ5lseu8pOgTUxKpxcLKtfHJpftILwNZMnYRFOM_nW1_qV0BM7jUL9RpXhYkJZNyyI7HzgUBcSdpVHCSicqZQk8Ygd91Zk52ekuC-5dfRUGfTxYlUpGb6iqrbIikQfA8eL5Eo38l5N5I-loF32YZFRkRvkjpT6hBqBx9MeOB4ue5KTOaqT2Fa-l6L4zXkwAILwFmM3NObzLwCianHJACmN3J4_llo__Ff78jWl-nxszxtJpr_Hn7KLob2iK7Nuy8mD6VNcq9D3IjlMNBN8Wo1Q8woCCPLfEoL2MEdJcTkUAwLlOgJqIeK79u9PIgAsY1JLC9VgqF99ditIjVy7wOLUmDDi0H_ieBEvy3cWVcKSV0nVZGyPWhamM40GrxHA8T9-LhscMdigEUlBvACsk37ktylR0OV_4gAF_=w500-h401-no',
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
