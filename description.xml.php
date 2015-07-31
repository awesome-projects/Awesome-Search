<?php
	//header('Content-type: text/xml; charset=utf-8'); //Firefox Addon Store
	header('Content-type: application/opensearchdescription+xml;charset=UTF-8'); //Apple Discussions Forum
?><?xml version="1.0" encoding="UTF-8"?>
<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/">
	<ShortName>Awesome Search</ShortName>
	<Description>Use awesome-projects.eu to search the Web.</Description>
	<Url type="text/html" template="http://search.awesome-projects.eu/?q={searchTerms}"/>
</OpenSearchDescription>