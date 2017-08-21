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
 				'originalContentUrl' => 'https://lh3.googleusercontent.com/dpT-KTanH_2mJdOI3-qnDIhlNzPngIdGk-_lGw2A8U3CVcMsJyaauUQLDvebjp0XB6QCQC6OgHJ1Or0tqeewup7bCKlNgoBU7OsWht-QSfA4yWGkg1urq3ySLZYpmyxIO9nk4Ezsw4_ohGFyuoB1VwMwWb-8KUQqQkj66WNGQ4tSD1-QIcgGXm4tGWgLzBofPYEraYQwhbPk7dOIRtrxiZhqJg_17_Fv9365Ct8zI4zjxCbtNNYhhomvWgEaqVBiLmcCM2GBiinj9nfvYL4t88dfx1cYWJN21y9Quyakpr-s4Koew8kvRpC4mUcq8lDmH2V1zH6FNtHzJmVVp93qK81zZhga2ObL6KOH1276LSMW8OB7hgsSfFpPcCk_zPrnlz6ArqnBIS0VVrNUVf0X9nxQsqwTAdjoT0YyBlpD9ggHYy6aIeO6CMNfmoqdHh1nsTetT8AxC1s4W5XfkCVP8rPS4EgKKzIr1w22-NYaZq2lIVrTRMoFSFpY09pGqOUAngaXPbMdJOSrESwYAGrpPqWfJ_3Fh5jEpDRJgnlGKGH7nok6VFN9N84ElJwYJ0-2L0wvTOB18QC_hZdhNMxfNcNQ3yXbC8JCadcIoAQxtDz0V_nD49YK=w660-h396-no',
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
