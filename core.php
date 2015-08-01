<?php
	
	//search engine data (default pack)
	$provider = array(
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
			"url" => "https://search.yahoo.com/yhs/search?p={searchTerms}&ei=UTF-8",
			"suggestions" => "https://search.yahoo.com/sugg/ff?output=fxjson&appid=ffd&command={searchTerms}"
		),
		array(
			"name" => "Facebook",
			"prefix" => "fb",
			"url" => "https://www.facebook.com/search/str/{searchTerms}/keywords_users" //http://stackoverflow.com/questions/2263287/does-facebook-have-a-public-search-api-yet (suggestions)
		),
        array(
            "name" => "Wikipedia",
            "prefix" => "w",
            "url" => "https://en.wikipedia.org/wiki/Special:Search?search={searchTerms}",
            "suggestions" => "https://en.wikipedia.org/w/api.php?search={searchTerms}"
        ),
		array(
			"name" => "YouTube",
			"prefix" => "yt",
			"url" => "http://www.youtube.com/results?search_query={searchTerms}&utm_source=opensearch"
		),
		array(
			"name" => "Twitter",
			"prefix" => "t",
			"url" => "https://twitter.com/search?q={searchTerms}&source=desktop-search" //partner=Firefox
		),
		array(
			"name" => "Twitch",
            "prefix" => "tw",
            "url" => "http://www.twitch.tv/search?query={searchTerms}"
        )
	);
	
	$prefixs = array();
	$max_len = 0;
	
	//functions
	
	function AddPack($name) {
		global $provider;
		
		$filepath = __DIR__ . "/packs/" . $name . ".pack.php";
		
		if(file_exists($filepath)) {
			include_once($filepath);
		} else {
			//something went wrong
		}
	}
	
	function AddPackArray($arr) {
		
		if(is_array($arr)) {
			foreach($arr as $pack) {
				AddPack($pack);
			}
		}
		
	}
	
	function InitSearchPrefixs() {
		global $provider, $max_len, $prefixs;
		
		//converting
		$n = count($provider);
		
		for($i=0; $i<$n; $i++) {
			$prefixs[ $provider[$i]["prefix"] ] = $i;
			
			if(strlen($provider[$i]["prefix"]) > $max_len) {
				$max_len = strlen($provider[$i]["prefix"]);
			}
		}
	}
	
	function BuildQueryArray($queryString, $fallback=0) {
		global $prefixs, $max_len, $provider;
		
		if($fallback > count($provider)) { $fallback = 0; }
		
		$prefix = trim( substr($queryString, 0, $max_len) );
		
		$result = array(
				"engine" => $fallback,
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
	
	function GetSuggestions($provider, $query) {
		global $provider;
		
		$suggestions = array(
				$query,		//Query String
				array(),	//Completions
				array(), 	//Descriptions
				array()		//Query URLs
			);	
		
		$c = curl_init();
		
		curl_setopt($c, CURLOPT_URL, $url);
		curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 2);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		
		$raw = curl_exec($c);
		
		curl_close($c);
		
		$json = json_decode($raw);
		
		if(is_null($json) || !is_array($json) || count($json)!=4) { return $suggestions; }
		
		if(is_array($json[1]) && count($json[1])>0) {
			foreach($json[1] as $s) {
				$suggestions[1][] = $s;
			}
		}
		
		//TODO: support descriptions & query urls
		
		return $suggestions;
	}

?>