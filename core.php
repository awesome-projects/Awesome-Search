<?php
	
	//search engine data
	$searches = array(
		array(
			"name" => "Google",
			"prefix" => "g"
		),
		array(
			"name" => "YouTube",
			"prefix" => "yt"
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
			$max_len = strlen($searches[$i]["prefix"];
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