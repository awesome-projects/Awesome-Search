<?php
	
	ini_set('display_errors',1);
	error_reporting(E_ALL|E_STRICT);
	ini_set('error_log','script_errors.log');
	ini_set('log_errors','On');

	if(!isset($_GET["q"])) {
		header("Location: about.php");
		die("42");
	}
	
	include_once("core.php");
	
	$query = preg_replace('/\s+/', ' ', trim($_GET["q"]) );
	
	if(strlen($query) > 512) { $query = substr($query, 0, 512); }
	
	AddSearchPack("shopping");
	
	InitSearchPrefixs();
	
	$q_arr = BuildQueryArray($query);
	
	$url = $searches[ $q_arr["engine"] ]["url"];
	
	$url = str_replace("&", "&amp;", $url);
	
	$urlQueryString = urlencode($q_arr["query"]);
	
	$url = str_replace('{searchTerms}', $urlQueryString, $url);
	
	header("Location: ".$url);
	//echo $url;
	
?>