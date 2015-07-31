<?php
	
	$provider[] = array(
		"name" => "Amazon",
		"prefix" => "a",
		"url" => "http://www.amazon.com/exec/obidos/external-search/?field-keywords={searchTerms}&mode=blended",
        "suggestions" => "http://completion.amazon.co.uk/search/complete?method=completion&q={searchTerms}&search-alias=aps&mkt=4"
	);

    $provider[] = array(
        "name" => "Ebay",
        "prefix" => "e",
        "url" => "http://shop.ebay.de/?_nkw={searchQuery}",
        "suggestions" => "http://anywhere.ebay.com/services/suggest/?s=0&q={searchQuery}"
    );
	
?>