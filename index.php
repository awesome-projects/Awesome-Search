<?php
	
	if(!isset($_GET["q"])) {
		header("Location: about.php");
	}
	
	include_once("core.php");
	
	$query = preg_replace('/\s+/', ' ', trim($_GET["q"]) );
	
	if(strlen($query) > 512) { $query = substr($query, 0, 512); }
	
	$q_arr = BuildQueryArray($query);
	
	echo "Searching on " . $searches[ $q_arr["engine"] ]["name"] . " for '";
	echo $q_arr["query"];
	echo "'";
	
?>