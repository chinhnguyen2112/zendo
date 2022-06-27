$(document).ready(function () {
	$.get('assets/skin', function (data) {
		$('#skinFilter').typeahead({source: data,});
	}, "json");
	$.get('assets/champion', function (data) {
		$('#champFilter').typeahead({source: data})
	}, "json");
});
