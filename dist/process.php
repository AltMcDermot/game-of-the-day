<?php 
function callApi($key, $terms=null){
	$baseurl = 'https://www.giantbomb.com/api/games/?api_key=' . $key . '&format=json&limit=15&filter=original_release_date:' . date('Y-m-d');
	$opts = array(
		'http' => array(
			'method' => "GET",
			'header' => "User-Agent: api script\r\n"
		)
	);

	$context = stream_context_create($opts);
	$response = file_get_contents($baseurl, false, $context);

	return json_encode(json_decode($response));
}

/*
what are we doing here?
1 check if there is a file with data of the day.
2 if data exists and data is current, load data
3 if data is expired, or data does not exist, get new data and write file.
*/

$filename = 'data.json';
if(file_exists($filename) && strtotime('-1 day midnight') < filemtime($filename)):
	// open file:
	$file = fopen($filename, 'r');
else: 
	unlink($filename);
	// get new list and write to file:
	$fileOpen = fopen($filename, 'w');
	$txt = callApi('[add your api key here]');
	fwrite($fileOpen, $txt);
	fclose($fileOpen);
	$file = fopen($filename, 'r');
endif;

echo fread($file, filesize($filename));