<?php 
echo "I am a bot";

$tokken = "XeUuwvrwWUW0jEVCRJ/awcN/LSgVw0nrSM8cw/3u6ZTTBMLv9vNEeTeZdvax38qkOkomjZT8Q8yvRLskNXmPotVhZnOJ1BiRK42YBbYr/+tiBzAaH9SwnjGIkpqySjhkVp0RIXhvj5g0KfX6Ie6LgQdB04t89/1O/w1cDnyilFU=";

$headers = array(
    'Authorization: Bearer '.$tokken,
    );
$url = 'https://api.line.me/v1/oauth/verify';

$ch = curl_init();  
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
//curl_setopt($ch, CURLOPT_POST, 1);
	//curl_setopt($ch, CURLOPT_POSTFIELDS,$vars); 
$output=curl_exec($ch);
 
curl_close($ch);
echo $output;

?>