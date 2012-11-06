<?php
if(isset($_POST['long_url']) && !empty($_POST['long_url'])){
	$input_url = strip_tags(trim($_POST['long_url']));
 
	//Ensure that the url is valid, php 5+ required 
	if(!filter_var($input_url, FILTER_VALIDATE_URL)){
		echo 'Invalid URL.';
	}
	else{
		$url_enc = urlencode($input_url);
		$version = '2.0.1';
		$login = 'thisandthat';
		$api_key = 'R_0cc50908f42d4d8fefb67fa25bd96b34';
		$format = 'json';
		$data = file_get_contents('http://api.bit.ly/shorten?version='.$version.'&login='.$login.'&apiKey='.$api_key.'&longUrl='.$url_enc.'&format='.$format);
		$json = json_decode($data, true);
 
		foreach($json['results'] as $val){
			echo $val['shortUrl'];
		}
	}
}
else {
	echo 'Null or empty URL given.';
}
?>