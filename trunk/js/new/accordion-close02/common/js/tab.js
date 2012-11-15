/**
* Basic tab
*
**/
$.fn.tab = function(options) {
	var options = $.extend({
		selector_tab: '.tabList',
		selector_panel: '.panel',
		class_selected: 'selected'
	}, options); 
	
	return this.each(function() {
		var $tabArea = $(this);
		var $tab = $(options.selector_tab + ' a', $tabArea);
		var $tabPanel = $(options.selector_panel, $tabArea);
		
		$tabPanel.filter(':not(' + $tab.filter('.' + options.class_selected).attr('href') + ')').hide();
		$tab.unbind('click').click(function() {
			$tab.removeClass(options.class_selected);
			$(this).addClass(options.class_selected);
			$tabPanel.hide();
			$($(this).attr("href")).show();
			
			return false;
		});

	});
}

$(window).load(function() {	
	//tab
	$(".tabSection").tab({
		selector_tab: '.tabList',
		selector_panel: '.panel'
	});

});