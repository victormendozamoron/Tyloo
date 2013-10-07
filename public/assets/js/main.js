$(document).ready(function() {
	$('a').tooltip();
	$('.summernote').summernote({height: 300, focus: true, tabsize: 2});

	$('.blogpost_form').submit(function() {
		var content = $('textarea[name="content"]').val($('.summernote').code());
	});
});