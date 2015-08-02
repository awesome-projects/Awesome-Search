<?php
	
	/*ini_set('display_errors',1);
	error_reporting(E_ALL|E_STRICT);
	ini_set('error_log','script_errors.log');
	ini_set('log_errors','On');*/

	if(!isset($_GET["q"])) {
		header("Location: /");
		die();
	}
	
	include_once("core.php");
	
	include_once("url-param-parser.php");
	
	AddPackArray($packs); //defined in url-param-parser.php
	
	InitSearchPrefixs();
	
	$q_arr = BuildQueryArray($query, $fallback);
	
	$url = $provider[ $q_arr["engine"] ]["url"];
	
	$urlQueryString = urlencode($q_arr["query"]);
	
	$url = str_replace('{searchTerms}', $urlQueryString, $url);
	
	if(trim($url) != '') { header("Location: ".$url); }
	
?>