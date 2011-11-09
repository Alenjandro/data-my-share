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
	
	$(".pageTop a").click(function(){
		$('html,body').animate({ scrollTop: $($(this).attr("href")).offset().top }, 800,'swing');
		return false;
	})
	
	$('.rollover').opOver();
		
});