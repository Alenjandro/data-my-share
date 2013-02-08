$(function() {
	//global nav
	
	
	//count area
	var $fmCountArea = $('form textarea.fmCountArea');
	var maxLen = 1000;
	
	$fmCountArea.each(function() {
		var $_self = $(this);
		$_self.after(
			$('<p/>')
				.addClass('fmCountTxt')
			);
	}).live('keyup change', function() {
		var $_cnt = $(this).next('.fmCountTxt');
		if($_cnt.length > 0) {
			var cntTxt = maxLen - $(this).attr('value').length;
			if(cntTxt >= 0) {
				$_cnt.removeClass('over');
			} else {
				$_cnt.addClass('over');
			}
			$_cnt.text(($(this).attr('value').length) + ' ky tu');
		}
	}).live('focus', function() {
		var $_self = $(this);
		var _timer = setInterval(function() {
			$_self.trigger('keyup');
		}, 600);
		$.data(this, 'timer', _timer);
	}).live('blur', function() {
		clearInterval($.data(this, 'timer'));
	}).trigger('keyup');
	
});