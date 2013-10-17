$(document).ready(function() {
	$('a').tooltip();
	if ($('#summernote').length != 0) {
		$('#summernote').summernote({height: 300, focus: true, tabsize: 2});

		$('form').submit(function() {
			var content = $('input[name="content"]').val($('#summernote').code());
		});
	}

	if ($('#blogtags').length != 0) {
		var elt = $('#blogtags');
		elt.tagsinput();
		elt.tagsinput('input').typeahead({
		  prefetch: '/blog/cats.json'
		}).bind('typeahead:selected', $.proxy(function (obj, datum) {  
			this.tagsinput('add', datum.value);
			this.tagsinput('input').typeahead('setQuery', '');
		}, elt));
	}

	if ($('#portfoliotags').length != 0) {
		var elt = $('#portfoliotags');
		elt.tagsinput();
		elt.tagsinput('input').typeahead({
		  prefetch: '/portfolio/cats.json'
		}).bind('typeahead:selected', $.proxy(function (obj, datum) {  
			this.tagsinput('add', datum.value);
			this.tagsinput('input').typeahead('setQuery', '');
		}, elt));
	}
});