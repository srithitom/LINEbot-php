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
 				'originalContentUrl' => 'https://lh3.googleusercontent.com/27aWy_6DAMilWHuWnSazb8Znu-xSG_GDpgp6MIuwvT1NkoGFFPRB0Ohd-tO4TZvahGEy9SCPts2e1oU5GOfC1uzz87q-xfJgSCNEW0A8e2iSol_8VDq4fLekb-sbV8dcKrcu8NsQKEuxHZQ4ATHgcvrEErIQMc_tt1chJ78CVP8NPPaLs0qZwjzPAA-U4T1Y2V_sHEvG6-O6xQ4k5RnI33vQLFuv_BlLNoUoYKSaAbsV2lkqOkaIjqrCUw_XefEcS0C-c9BSEYQ_GJrFnLwjI_yKCu8eCs1CeHLClRrcmYwhRLYTGk6aqPympxt6VVZqRA0yg3OfmHwMWiSoRi2BTIGccdHgvVL6rMWicj7T8vbKDQ_LCYIi7K9MB_cFyBVawKT2Q83CF4PFeDgE1EGdredtXEBhzw0NJTN9A9AJ4MYbKRBwoT5Yi-NlloMaY-WHksKICAv5OxsRd0ZTL1k8bC8vONb9XLwfYhHBmZrIIZ-rk6Z3ytoIB3IajCpOlHUR156aH0A-vTwJujFoOgUwaKuxiWbgKGCknjPdUeVN72AzhA1v-81XKVHvSpCxsbFnkVCE14Wr26jMYqw08dVKKzg01fY-fjJr4KNJGf3MYYEbZsC5Y3zK=w540-h360-no',
  				'previewImageUrl' => 'https://lh3.googleusercontent.com/GGkjFtyfbURVbevcchCCCzqXB82WCLJVoDriTWJhRik82r--ZCSVdhVhWQcl058WgOpVNagXVjlzdFBYaXcS8B12jAuzh69RZ2_mWHWq1UmiH9jg_cBeM33kN3GYn-o_o35l6AfqILuDiKshDxmFtYaL3G6t-ODi9Vskj5jI-MPC0oqAesNTZAS6IKOSpF74FdGtZ_7MP8u0s-9V9jngGSdvvp54WaWpq6W_AvRQUx2Z60lgitbueumI9tm2C7T4Ku_4SIVn6sQxLZ3sfyve5HvRlOHxGCS3QLN7lJ_HxU1qzilRTwcqjQg0kSXgj4CSyLlO-u-9cTkcFsy4u1cIKxr0cxMIMRueEuUtSXx8R6eMgURYOJVL7ISsd_mRa_uAX8sI0fYdZDToTK-L5Ecl24nfofQifwhtJVHDfXEU7go6HwNrtzpfsaVp75e6R1hWtEc168f6p3X6A2hEArgN6p_wzhBR3hR2CPmgWGuc1UnCaE4WA72f4cXVB1EhSrFewMZFXaIMersScRZWn0vWa8x7BmeU6Wf32ReBEEqeahlK7DWvFtVnIbibdnaKNINWv2QyNvWPUX9O6UY67W834bAMcEeRGtPA6wjmMXz-bHuebmiUr-MO=w240-h180-no',
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
