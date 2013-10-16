$(document).ready(function() {
	$('a').tooltip();
	if ($('#summernote').length != 0) {
		$('#summernote').summernote({height: 300, focus: true, tabsize: 2});

		$('.blogpost_form').submit(function() {
			var content = $('input[name="content"]').val($('#summernote').code());
		});
	}

	if ($('#tags').length != 0) {
		var elt = $('#tags');
		elt.tagsinput();
		elt.tagsinput('input').typeahead({
		  prefetch: '/blog/cats.json'
		}).bind('typeahead:selected', $.proxy(function (obj, datum) {  
			this.tagsinput('add', datum.value);
			this.tagsinput('input').typeahead('setQuery', '');
		}, elt));
	}
});