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
 				'originalContentUrl' => 'https://lh3.googleusercontent.com/n3I0SqN6-zLUEA7fa6gT9BVplB960OoR8RcdiR8PUi5iF2wkx3kN6u92DABUMhHk20Si1mkLnbN4-vaTbMbpTXd1X0292xqUjz2RtuHr_xGugqiJGHKFdMMx7YN5Qvht0UumaDy6vSuoCzRnVR28pxs164Sq-0RMYFiiG3Xx_vCbTECPLR54578viBp2w2kWyLvCi5iNAGAlv07-JUOTovXZnoDA2TUHsUk7i_8WoVZPf7_kvZUQSKXBZy2DvzuVXbwsbCAZviQdkuhVFuNozRN1jxSCierbrWrvnkSeH9_3BQQxn9924ySLGx1FVr1D_2A7LFot6OosGybQ74BDYM12g72xfMYmpX2WVOxxUpMyiLKJsuQYcODQLOCyTVq5p2Q9GW3xHYpZc7TEC4Uqrr41PpHaMdT7FaNDzFoqNZV6p93gTowAO74VNLnqCGcESjB7bgPaXneOzCYTcW_ojbtQWUnxtXaKF8eaBMmZdflrqDqMPpoxGAp4WEEgeM4_uJr0ZyHDou6NxV98yRdMHV2PksMJJcsng6w11o2IgmK2w-4IxbhHNHOrrXkTdq5GiUReFUlp_I-gCUeGft6hCTkiV88PiHYBd55ncdjc-Q0jnFFZpnc5=w931-h513-no',
  				'previewImageUrl' => 'https://lh3.googleusercontent.com/8w0KZnqAFMurK77oZGrrFI42wkOKqEACmKzx-fDzfp1BlSOjiYNzfrlJjizpo0CUDdqjvKd71RnIZEVrHYbTRRhIlsAdHBXSPAkvezuRw_rfCpNJbKRpgszd1E3R2ErYZB_E5GMU9MzYzUKAQHPRi_oHsiWn8zvxHJAIkGosY-yocWGsPZYanxDrKt0mwl2i64DB_qdj_a_g61XD2bKSMneBwtWVGkc3dDnf154S-BiUTfWjL1PDH3gzRGaoIlBmfXNpGlTGj-Ynf8oVp-GABLv7Go_M9zOubWBairfhmsTsiPgeqQzkTRMvgtqBfaGvZlKItgoppwboyCtHT2Guz4zuSVOFBM8taK-mPx9oBSHREP7JZIE-AzyO3grqyy8cQSABV4vUc-UcdLY6KqEsPXYxopQ_s0caAUXxNG84o7K3_X78uSvpnktv6jWzA77kLEvjKq8-l8uR8ETdF_LgA4-p97OclcUF4Gj_2iCdqs8yYDrHCaOAnoXUgpKprYpUZ6leb71Mo3P19suMdU9TQtADCfKPh_B99cHJ7imgfK4YvHHTAtWjrgiHNovrU4qP8Ki1qSfs9Zkh7AV94-SlRGrKLIfXOie_9kFG2R44z0pVdAaS=w240-h180-no',
  		 	];
			}
			
			else if ($text == 'Cartoon'){
			// Build message to reply back
			$messages = [
  			      'type' => 'image',
 				'originalContentUrl' => 'https://lh3.googleusercontent.com/C0tQphFWi7M9kZubBqnrQlJ6UOGuVesgYfsrQQEqtp8YDB_iXVBbpTeKQ5DsMD61ub3CFzmlbDpyPwDrXQ7ivThRG_3MtDHtZQ2mVegMMO1L74IcDA4TxZJqOomr3HFEy46db02rfzKeQIqX6AQ7d_9_lWbkb4cTPBtPfuRt6BArGK8JzCIFSiwTaEZ_2DoKgyfSw1EnG9RkQYQ7J6HxYEBjfjZcPso1KZOk7xVb4jrzwU3gVsjbGffDVWykpJjxBaVpS1nLH0sp7d9kAbmL1Lf_ll_KGVyOvynowAtzqdKQmaGNOkpdhmaYpgicGtfubTCfsTvwYgseffuDwe4BBdIkAO6i5sYq6h8WeIi9qpBRiIav2AhJGiuaQns8BeAcnpPszG_H-C7HWqufE9K50T2nFIq6e9kUsBJrskrmhP-qzaa0rwiHkFc8mja12yHPHAtpCW2P0GI5RCabVCuV4N5jy2nNXKLsJl1DCeO6H1VVCuSv5My2F6P3Tl5TFbF3tO6iXoQopd2GGG6tpkAZaMWMflSwpZq9Ztu87-8xkh5R0E5JxZETSKz0HLE3I9ZcS13XqNMGq4QpctGxwGRoXDvVqgdjbsG1Njlvvh5BNQkpvBX1=w1135-h638-no',
  				'previewImageUrl' => 'https://lh3.googleusercontent.com/8w0KZnqAFMurK77oZGrrFI42wkOKqEACmKzx-fDzfp1BlSOjiYNzfrlJjizpo0CUDdqjvKd71RnIZEVrHYbTRRhIlsAdHBXSPAkvezuRw_rfCpNJbKRpgszd1E3R2ErYZB_E5GMU9MzYzUKAQHPRi_oHsiWn8zvxHJAIkGosY-yocWGsPZYanxDrKt0mwl2i64DB_qdj_a_g61XD2bKSMneBwtWVGkc3dDnf154S-BiUTfWjL1PDH3gzRGaoIlBmfXNpGlTGj-Ynf8oVp-GABLv7Go_M9zOubWBairfhmsTsiPgeqQzkTRMvgtqBfaGvZlKItgoppwboyCtHT2Guz4zuSVOFBM8taK-mPx9oBSHREP7JZIE-AzyO3grqyy8cQSABV4vUc-UcdLY6KqEsPXYxopQ_s0caAUXxNG84o7K3_X78uSvpnktv6jWzA77kLEvjKq8-l8uR8ETdF_LgA4-p97OclcUF4Gj_2iCdqs8yYDrHCaOAnoXUgpKprYpUZ6leb71Mo3P19suMdU9TQtADCfKPh_B99cHJ7imgfK4YvHHTAtWjrgiHNovrU4qP8Ki1qSfs9Zkh7AV94-SlRGrKLIfXOie_9kFG2R44z0pVdAaS=w240-h180-no',
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
