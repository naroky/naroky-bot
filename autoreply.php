<?php 
//echo "I am a bot";

$tokken = "t/xNpwqsTKwcyJFWZ1EWncDEk4fOZ6sYPUXYKGapCCRkZRpd51BqoJD6znAlZMa4OkomjZT8Q8yvRLskNXmPotVhZnOJ1BiRK42YBbYr/+vkYXBeA1+ksR1zMGPpPr+28/iM5wVgruEPQgC/vD4xmAdB04t89/1O/w1cDnyilFU=";

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

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array(
				'Content-Type:application/json',	
			    'Authorization: Bearer '.$tokken,
			);		

			$ch = curl_init();  
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$post); 
			$output=curl_exec($ch);
			 
			curl_close($ch);
			echo $output . "\r\n";

		}
	}
}



echo "OK";

?>