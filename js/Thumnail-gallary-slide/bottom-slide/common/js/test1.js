var isIE6 = navigator.userAgent.indexOf('WINIE 6') !== -1

$(function() {
	var menubarTimer;
	var $menubar = $('#menubar');
	var menubarDefBtm = $menubar.css('bottom');
	
	if(!isIE6) {
		$menubar
			.toggle( //toggle
				function() {
					clearTimeout(menubarTimer);
					$(this).stop().animate({bottom:0}, "normal");
				},
				function() {
					menubarTimer = setTimeout($.proxy(function() {
						$(this).stop().animate({bottom:menubarDefBtm}, "normal");
					}, $(this)), 300);
				}	
			);
	}

});
