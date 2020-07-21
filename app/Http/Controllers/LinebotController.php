<?php namespace App\Http\Controllers;

class LinebotController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	public function autoreply()
	{
		$access_token = 'OrMfn7L7gBETHioI8fBCzEI+Z9uBnU6BShLM1pfvO6SomeFUsJtf3wuS9KcvLyObOkomjZT8Q8yvRLskNXmPotVhZnOJ1BiRK42YBbYr/+v77gxyOf/g4aVycuSxjyudf7MXlwzZqvkyUm1r16m6bwdB04t89/1O/w1cDnyilFU=';

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
					$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					$result = curl_exec($ch);
					curl_close($ch);

					//echo $result . "\r\n";
					file_put_contents("/test.txt", $result);
				}
			}
		}

		return view('line/autoreply');
	}

}
