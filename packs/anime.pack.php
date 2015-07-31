<?php
	
	$provider[] = array(
		"name" => "AniSearch",
		"prefix" => "as",
		"url" => "http://www.anisearch.com/anime/index/?char=all&sort=rank&q=true&text={searchQuery}"
	);

    $provider[] = array(
        "name" => "MyAnimeList",
        "prefix" => "mal",
        "url" => "http://myanimelist.net/anime.php?q={searchQuery}"
    );

    $provider[] = array(
        "name" => "Anime News Network",
        "prefix" => "ann",
        "url" => "http://www.animenewsnetwork.com/search?q={searchQuery}"
    );
	
?>