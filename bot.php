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
 				'originalContentUrl' => 'https://lh3.googleusercontent.com/gjoii3mMR8LlqDvjy2NN6X-BwkDvWV6AjaCpu0CEj5JltViy3Sm8KtuUubTu91OnarXgEwDKN_r9vWXGBJfeV-vMxwXA9maxaZxvAyvXQSSZweavSOe5E22sxNKhSMsHdMI1PQIc5oIRcX0SVNKXTz7BgHvrziEAY5aZRKSR9N_XP55BiQrekVvHQgggSZCsfIj3QyOFJlrK4ME4nyKv3SqLQVMO0Wp8XoSJC8v3F6rdxDNjdCFxJOwRuzsrVTBc3ktBBtiCFc4dvDmPGTxqm-ug0bbKBmZw6S-0FwUmzG_HMpkoVNU2cXYqnlwDPnCRR9bXFCAKab25qlZJHPYJq6knb1HVBU_LBphhVstWSySURF8JcNd7fCfmoDRWBB5yvtAYYyVUHe9IoazQ_f-ENc3GvwnvDNPKCn6n7JfPm3e50NU6LiKq_y1MdC4LcnhpgTUyaWm9uU7lGsD8Fw2WQwseQuTmxMcHz3_uUB6GLxVUEy877cKPJs5n71m-v4NYbc8hKn8C-rNxCW_7VD-J28x4ehrXhljynVEL4Je3zFJSjWQdMo69H-KIYDvRU4PE-exFiVcFyixfykaNWkGrH23utMPWelDOOY7d9TplooGi95oA1zd3=w931-h513-no',
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
