$(function(){
	if ( $.browser.msie && $.browser.version < 9 ) {
		$('.shadow_text').each(function(index) {
			var colorText = "#888";
			$(this).css('position','relative');
			$(this).find('span').css({'position':'relative','z-index':'10'});
			var ObjectText = $(this).html();
			$(this).append('<span class="shadow" style="color:'+ colorText+ '; position:absolute; left:0; top:1px; z-index:0;">'+ObjectText+'</span>');
			if ($.browser.msie && parseInt($.browser.version, 10) === 8) {
				$('.shadow_text .shadow').css('top','-1px');
			} else $('.shadow_text .shadow').css('top','2px');
		});
		
		$('.shadow_text01').each(function(index) {
			var colorText = "#888";
			$(this).css('position','relative');
			$(this).find('span').css({'position':'relative','z-index':'10'});
			var ObjectText = $(this).html();
			$(this).append('<span class="shadow" style="color:'+ colorText+ '; position:absolute; left:0; top:1px; z-index:0;">'+ObjectText+'</span>');
			if ($.browser.msie && parseInt($.browser.version, 10) === 8) {
				$('.shadow_text01 .shadow').css('top','-1px');
			} else $('.shadow_text01 .shadow').css('top','3px');
		});
	}
});