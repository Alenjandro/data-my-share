// JavaScript Document
$(function(){
	// rollover
	$('.imgover').each(function(){
		this.osrc = $(this).attr('src');
		this.rollover = new Image();
		this.rollover.src = this.osrc.replace(/(\.gif|\.jpg|\.png)/, "_o$1");
	}).hover(function(){
		$(this).attr('src',this.rollover.src);
	},function(){
		$(this).attr('src',this.osrc);
	});
});

$(function () {
	$('.bubbleInfo li').each(function () {
		var distance = 5;
		var time = 250;
		var hideDelay = 100;

		var hideDelayTimer = null;

		var beingShown = false;
		var shown = false;
		var trigger = $('.trigger', this);
		var info = $('.popup', this).css('opacity', 0);


		$([trigger.get(0), info.get(0)]).mouseover(function () {
			if (hideDelayTimer) clearTimeout(hideDelayTimer);
			if (beingShown || shown) {
				// don't trigger the animation again
				return;
			} else {
				// reset position of info box
				beingShown = true;

				info.css({
					top: -90,
					display: 'block'
				}).animate({
					top: '-=' + distance + 'px',
					opacity: 1
				}, time, 'swing', function() {
					beingShown = false;
					shown = true;
				});
			}

			return false;
		}).mouseout(function () {
			if (hideDelayTimer) clearTimeout(hideDelayTimer);
			hideDelayTimer = setTimeout(function () {
				hideDelayTimer = null;
				info.animate({
					top: '+=' + distance + 'px',
					opacity: 0
				}, time, 'swing', function () {
					shown = false;
					info.css('display', 'none');
				});

			}, hideDelay);

			return false;
		});
	});
});