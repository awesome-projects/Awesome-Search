<?php
	
	//search engine data
	$searches = array(
		array(
			"name" => "Google",
			"prefix" => "g",
			"url" => "https://www.google.de/search?q={searchTerms}&ie=utf-8&oe=utf-8",
			"suggestions" => "https://www.google.com/complete/search?client=firefox&q={searchTerms}"
		),
		array(
			"name" => "Bing",
			"prefix" => "b",
			"url" => "https://www.bing.com/search?query={searchTerms}",
			"suggestions" => "https://www.bing.com/osjson.aspx?query={searchTerms}&form=OSDJAS"
		),
		array(
			"name" => "Yahoo",
			"prefix" => "y",
			"url" => "https://search.yahoo.com/yhs/search",
			"suggestions" => "https://search.yahoo.com/sugg/ff?output=fxjson&appid=ffd&command={searchTerms}"
		),
		array(
			"name" => "YouTube",
			"prefix" => "yt",
			"url" => "http://www.youtube.com/results?search_query={searchTerms}&utm_source=opensearch"
		)
	);
	
	$prefixs = array();
	
	//setting things up
	$max_len = 0;
	
	//converting
	$n = count($searches);
	
	for($i=0; $i<$n; $i++) {
		$prefixs[ $searches[$i]["prefix"] ] = $i;
		
		if(strlen($searches[$i]["prefix"]) > $max_len) {
			$max_len = strlen($searches[$i]["prefix"]);
		}
	}
	
	
	//functions
	function BuildQueryArray($queryString) {
		global $prefixs, $max_len;
		
		$prefix = trim( substr($queryString, 0, $max_len) );
		
		$result = array(
				"engine" => 0,
				"query" => ''
			);
		
		if($prefix == '') { return $result; }
		
		$prefix_end = strpos($prefix, ' ');
		if($prefix_end === false) { $prefix_end = strlen($prefix); }
		
		$prefix = substr($prefix, 0, $prefix_end);
		
		if(isset($prefixs[$prefix])) {
			$result["engine"] = $prefixs[$prefix];
			$result["query"] = trim( substr($queryString, strlen($prefix)) );
		} else {
			$result["query"] = $queryString;
		}
		
		return $result;
	}

?>