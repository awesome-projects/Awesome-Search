<?php
	
	//defaults:
	$query = '';
	$fallback = 0;
	$remap = array();
	$packs = array("anime","programming","shopping");
	
	//inputs:
	if(isset($_GET["q"])) {
		
		$query = preg_replace('/\s+/', ' ', rtrim($_GET["q"]) );
	
		if(strlen($query) > 512) { $query = substr($query, 0, 512); }
		
	}
	
	if(isset($_GET["fb"]) && is_numeric($_GET["fb"])) {
		$fallback = abs( intval($_GET["fb"]) );
	}
	
?>