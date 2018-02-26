
<?php
//Get data from instagram api
$hashtag = $_GET['hashtag'];
if(!isset($_GET['count'])) $count = 20;
else $count = $_GET['count'];
 
//Query need client_id or access_token
$query = array(
	'access_token' => '',
);
$url = 'https://api.instagram.com/v1/tags/'.$hashtag.'/media/recent?'.http_build_query($query);
try {
	$curl_connection = curl_init($url);
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
	
	//Data are stored in $data
	//$data = json_decode(curl_exec($curl_connection), true);
	$data = curl_exec($curl_connection);
	curl_close($curl_connection);
	echo $data;
} catch(Exception $e) {
	return $e->getMessage();
}
?>