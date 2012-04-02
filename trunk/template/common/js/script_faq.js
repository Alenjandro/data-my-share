$(document).ready(function(){
	// for faq panel
	$('.faqSec .faqHead').each(function() {
		$(this).css('cursor', 'pointer');
		$(this).parents('.faqSec').addClass('close');
	}).hover(function() {
		$(this).css('backgroundColor', '#ebf6fe');
	}, function() {
		$(this).css('backgroundColor', '#ffffff');
	}).click(function() {
  	$parentSec = $(this).parents('.faqSec');
		$parentSec.find('.faqBody').toggle(0, function() {
			if ($(this).css('display') == 'none') {
				$parentSec.removeClass('open');
				$parentSec.addClass('close');
			} else {
				$parentSec.removeClass('close');
				$parentSec.addClass('open');
			}
		});
	});
});
