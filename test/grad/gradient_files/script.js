$(function(){
	$.maxCheck = function(val1, val2){
		var maxH = val1;
		if(val2>val1){maxH = val2}
		return maxH;
	}
	
	function kUp(valKey){
		valKey.keyup(function () { 
			var valueAll = $(this).val();
			var valEnd = $('#review').html(valueAll);
		}).keyup();
		return $('#review').html();
	}
	
	var se01 = $('#size01');
	
	var val01 = kUp(se01);
	$('.source pre').html('size01:' + val01);	
});