/*!
 * JS for search using awesomplete
 */
// Use Awesomplete to send request for articles when the page loads
var ajax = new XMLHttpRequest();
var homeUrl = kb_data.home_url;
ajax.open("GET", homeUrl + 'wp-json/wp/v2/kb/search', true);
ajax.onload = function() {
	var list = JSON.parse(ajax.responseText).map(function(i) { return {label: i.title, value: i.link}; });
	new Awesomplete(document.querySelector("#query-kb"),{ list: list });
};
ajax.send();

// Send user to the page when autocomplete title is clicked
document.querySelector("#query-kb").addEventListener('awesomplete-select', function(e){
	e.preventDefault();
	var suggestion = e.text;
	window.location = suggestion.value;
});
