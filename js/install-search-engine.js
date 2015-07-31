//https://developer.mozilla.org/en-US/docs/Adding_search_engines_from_web_pages

function installSearchEngine(new_provider) {
  if (window.external && ("AddSearchProvider" in window.external)) {
    // Firefox 2 and IE 7, OpenSearch
    window.external.AddSearchProvider(new_provider);
  } else {
    // No search engine support (IE 6, Opera, etc).
    window.open(new_provider, '_self');
  }
}