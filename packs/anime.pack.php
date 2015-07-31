<?php
	
	$provider[] = array(
		"name" => "AniSearch",
		"prefix" => "as",
		"url" => "http://en.anisearch.com/anime/index/?char=all&text={searchTerms}&q=true"
	);

    $provider[] = array(
        "name" => "MyAnimeList",
        "prefix" => "mal",
        "url" => "http://myanimelist.net/anime.php?q={searchTerms}"
    );

    $provider[] = array(
        "name" => "Anime News Network",
        "prefix" => "ann",
        "url" => "http://www.animenewsnetwork.com/search?q={searchTerms}"
    );
	
?>