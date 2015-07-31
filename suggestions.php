<?php
	
	if(!isset($_GET["q"])) { die(42); }
	
	ini_set('display_errors',1);
	error_reporting(E_ALL|E_STRICT);
	ini_set('error_log','script_errors.log');
	ini_set('log_errors','On');
	
	include_once("core.php");
	
	$query = preg_replace('/\s+/', ' ', trim($_GET["q"]) );
	
	if(strlen($query) > 512) { $query = substr($query, 0, 512); }
	
	
	$suggestions = array(
		$_GET["q"],
		array("test 42", "test awesome", "test static"),
		array("42","2x21","6x7"),
		array()
	);
	
	echo json_encode($suggestions);
	
?>