$(function() {
	$('#signature').signature();

	$('#clear').click(function() {
		$('#signature').signature('clear');
	});

	$('#save').click(function(e) {
		e.preventDefault();
		$('textarea[name=json]').val($('#signature').signature('toJSON'));
		if ($('input[name=password]').val()!='')
			$('form[name=signature]').submit();
		else
			alert('Пароль не введён');
	});

	if ($('input[name=id]').val() != '0') {
		$('#signature').signature('draw', $('textarea[name=json]').val());
	}
});