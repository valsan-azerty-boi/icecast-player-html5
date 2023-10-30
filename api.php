<?php

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
$streamingType = filter_input(INPUT_GET, 'streamtype', FILTER_SANITIZE_STRING);

if (!empty($url)) {
	if ($streamingType === 'icecast') {
		$url_explode = explode("/", $url);
		array_pop($url_explode);
		$url = implode("/", $url_explode);
		$url = $url . "/status-json.xsl";

		// $curl = curl_init($url);
		// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		// curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0');
		// $data = curl_exec($curl);
		// curl_close($curl);
		$data = file_get_contents($url);

		if (!empty($data)) {
			$ice_stats = json_decode($data, true);
			$ice_stats_source = $ice_stats["icestats"]["source"];
			$array['listenersPeak'] = $ice_stats_source["listener_peak"];
			$array['listeners'] = $ice_stats_source["listeners"];
			$array['currentSong'] = $ice_stats_source["title"];
			$array['currentArtist'] = $ice_stats_source["artist"];
		} else {
			$array = ['error' => 'Failed to fetch data'];
		}
	} else {
		$array = ['error' => 'STREAM_TYPE parameter not found'];
	}
} else {
	$array = ['error' => 'URL parameter not found'];
}

$urlHost = $_SERVER['HTTP_HOST'];

header('Access-Control-Allow-Origin: ' . $urlHost);
header('Content-type: application/json', true);

echo json_encode($array);
