$(function(){
	var maxChar = 10000;
	$('.inputText textarea').live('keyup change', function() {
		var textL = $('.inputText textarea').val().length;
		if(($('.result').length > 0) && (textL < maxChar)) {
			$('.result').text(textL + ' ký tự');
		}else{
			alert('Text được nhập không được nhiều hơn 10000 ký tự');
		}
	});
});