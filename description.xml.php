<?php
	
	//header('Content-type: text/xml; charset=utf-8');
	header('Content-type: application/opensearchdescription+xml;charset=UTF-8');
	
?><?xml version="1.0" encoding="UTF-8"?>
<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/">
	<ShortName>Unified Search</ShortName>
	<Description>Use unifysear.ch to search the Web.</Description>
	<Url type="text/html" template="http://unifysear.ch/?q={searchTerms}"/>
	<Url type="application/x-suggestions+json" template="http://unifysear.ch/suggestions.php?q={searchTerms}"/>
</OpenSearchDescription>