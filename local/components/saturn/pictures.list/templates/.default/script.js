$(function() {
	$('.pictures .signature').each(function(k, v){
		$(v).signature()
			.signature('draw', $(v).data('json'))
			.signature('disable');
	});
});