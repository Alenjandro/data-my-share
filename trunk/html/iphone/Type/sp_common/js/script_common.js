$(function() {
	//global nav
	$('#gNav dt a').toggleRelContent();
	
	//label
	$('form label').click(function() {
		var $_t = $('#' + $(this).attr('for'));
		
		if($_t.length <= 0) {
			return;
		}
		
		var tag = $_t.get(0).nodeName.toLowerCase();
		
		if(tag === 'input') {
			var $_tType = $_t.attr('type');
			
			if($_tType === 'text' || $_tType === 'password' || $_tType === 'number' || $_tType === 'email' || $_tType === 'tel') {
				$_t.focus();
			} else if($_tType === 'checkbox' || $_tType === 'radio') {
				$_t.attr('checked', !$_t.attr('checked'));
			}
		} else if (tag === 'textarea' || tag === 'select') {
			$_t.focus();
		}
		
		return false;
	});
	
	//count area
	var $fmCountArea = $('form textarea.fmCountArea');
	var maxLen = 1000;
	
	$fmCountArea.each(function() {
		var $_self = $(this);
		$_self.after(
			$('<p/>')
				.attr('id', $(this).attr('id') + 'Cnt')
				.addClass('fmCountTxt')
			);
	}).live('keyup change', function() {
		var $_cnt = $('#' + $(this).attr('id') + 'Cnt');
		if($_cnt.length > 0) {
			var cntTxt = maxLen - $(this).attr('value').length;
			if(cntTxt >= 0) {
				$_cnt.removeClass('over');
			} else {
				$_cnt.addClass('over');
			}
			$_cnt.text(($(this).attr('value').length) + '•¶Žš“ü—Í‚³‚ê‚Ä‚¢‚Ü‚·');
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
	
	//backBtn
	$('a.backBtn').click(function() {
		history.back();
		return false;
	});
	
});

//toggle content
$.fn.toggleRelContent = function(target, conf, callback) {
	var defaults = {
		effect: false,	// none or slide
		speed: 'fast',	// slide speed
		easing: ''		// slide easing
	}
	
	var opt = $.extend(defaults, conf);
	
	return this.each(function() {
		var $_self = $(this);
		var $_t = target || $($(this).attr('href'));
		
		if($_t.length > 0) {
			if(!$_self.hasClass('open')) {
				$_t.css('display', 'none');
			}
			
			$_self.click(function() {
				if($_t.filter(':visible').length > 0) {
					$_self.removeClass('open');
					if(opt.effect) {
						$_t.slideUp(opt.speed, opt.easing);
					} else {
						$_t.hide();
					}
				} else {
					$_self.addClass('open');
					if(opt.effect) {
						$_t.slideDown(opt.speed, opt.easing);
					} else {
						$_t.show();
					}
				}
				
				if($.isFunction(callback)) {
					callback.apply($(this));
				}
				
				return false;
			});
		}
	});  
}

//tab
$.fn.tab = function() {
	return this.each(function() {
		var $_tab = $(this);
		var $_tabIndex = $_tab.find('> .tabIndex li a');
		var $_tabPanel = $_tab.find('> .tabPanel');
		
		$_tabPanel.filter(':not(' + $_tabIndex.filter('.selected').attr('href') + ')').hide();
		$_tabIndex.click(function() {
			$_tabIndex.removeClass('selected');
			$(this).addClass('selected');
			$_tabPanel.hide();
			$($(this).attr("href")).show();
			return false;
		});

	});
}