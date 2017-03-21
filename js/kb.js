// Use Awesomplete to send request for articles when the page loads
var ajax = new XMLHttpRequest();
var siteUrl = ajaxurl.substr(0, ajaxurl.indexOf('wp-admin/admin-ajax.php'))
ajax.open("GET", siteUrl + 'wp-json/wp/v2/kb/search', true);
ajax.onload = function() {
	var list = JSON.parse(ajax.responseText).map(function(i) { return {label: i.title, value: i.link}; });
	new Awesomplete(document.querySelector("#s"),{ list: list });
};
ajax.send();

// Send user to the page when autocomplete title is clicked
document.querySelector("#s").addEventListener('awesomplete-select', function(e){
	e.preventDefault();
	var suggestion = e.text;
	window.location = suggestion.value;
});