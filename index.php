<?php
	
	ini_set('display_errors',1);
	error_reporting(E_ALL|E_STRICT);
	ini_set('error_log','script_errors.log');
	ini_set('log_errors','On');

	if(!isset($_GET["q"])) {
		header("Location: about.php");
	}
	
	include_once("core.php");
	
	$query = preg_replace('/\s+/', ' ', trim($_GET["q"]) );
	
	if(strlen($query) > 512) { $query = substr($query, 0, 512); }
	
	$q_arr = BuildQueryArray($query);
	
	echo "Searching on ";
	echo $searches[ $q_arr["engine"] ]["name"] . " for '";
	echo $q_arr["query"];
	echo "'";
	
?>