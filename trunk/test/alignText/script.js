$(function(){
	$('.fieldButton button').click(function(){
		$('button').removeClass('active');
		$(this).addClass('active');
	})
	
	$('button.alignL').click(function(){
		var alignL = $(this).val();
		$('.review').css('text-align',alignL);
	})
	
	$('button.alignR').click(function(){
		var alignR = $(this).val();
		$('.review').css('text-align',alignR);
	})
	
	$('button.alignC').click(function(){
		var alignC = $(this).val();
		$('.review').css('text-align',alignC);
	})
});