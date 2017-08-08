<?php 
echo "I am a bot";

$tokken = "t/xNpwqsTKwcyJFWZ1EWncDEk4fOZ6sYPUXYKGapCCRkZRpd51BqoJD6znAlZMa4OkomjZT8Q8yvRLskNXmPotVhZnOJ1BiRK42YBbYr/+vkYXBeA1+ksR1zMGPpPr+28/iM5wVgruEPQgC/vD4xmAdB04t89/1O/w1cDnyilFU=";

$headers = array(
    'Authorization: Bearer '.$tokken,
    )
$url = 'https://api.line.me/v1/oauth/verify';

$ch = curl_init();  
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
curl_setopt($ch, CURLOPT_POST, 1);
	//curl_setopt($ch, CURLOPT_POSTFIELDS,$vars); 
$output=curl_exec($ch);
 
curl_close($ch);
echo $output;

?>