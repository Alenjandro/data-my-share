$(document).ready(function(){
	// rollover
	$('.imgover').each(function() {
		var osrc = $(this).attr('src');
		var hsrc = osrc.replace(/(\.gif|\.jpg|\.png)/, '_o$1');
		$.data(this, 'osrc', osrc);
		$.data(this, 'hsrc', hsrc);
		$('<img>').attr('src', hsrc);
	}).hover(function() {
		$(this).attr('src', $.data(this, 'hsrc'));
	},function() {
		$(this).attr('src', $.data(this, 'osrc'));
	});

	// set css
	$('#hFontSize').removeClass('noScript');
	var $alt_css = $('link[rel=\'alternate stylesheet\']');
	var setCss = function(title) {
		var $css = $alt_css.filter('[title=' + title + ']');
		if ($css.length) {
			$alt_css.attr('disabled', 'disabled');
			$css.removeAttr('disabled');
			var date = new Date();
			date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
			$.cookie('css', title, {path: '/', expires: date});
		}
	};
	// default css
	setCss($.cookie('css'));
	$('#hFontSize a').click(function() {
		var fontsize = $(this).attr('href').replace(/^#/, '');
		setCss(fontsize);
		return false;
	});

	// for tbNav style
	if ($('.tbNav').length) {
		$('.tbNav td:has(a)').hover(function() {
			$(this).addClass('hover');
		}, function() {
			$(this).removeClass('hover');
		}).click(function() {
			$tblink = $(this).find('a');
			tbhref = $tblink.attr('href');
			tbtarget = $tblink.prop('target');
			if (tbtarget.length) {
				// open new window
				window.open(tbhref, tbtarget);
			} else {
				location.href = tbhref;
			}
		});
	}

  // lnav select
	if ($('.lNav.auto').length) {
		$('.nav2, nav3').hide();
		if ($('#base_path').length) {
			// manual path (input:hidden value)
			pathname = $('#base_path').val();
		} else {
			// auto path
			pathname = location.pathname;
		}
		$currentAnch = $('.lNav').find("a[href='" + pathname + "']");
		$currentAnch.parent().addClass('current');
		$currentAnch.parents('li:has(ul)').addClass('open');
		$('.lNav').find('.open.current').addClass('open2');
		$('.lNav').find('.open ul').show();
	}
});
