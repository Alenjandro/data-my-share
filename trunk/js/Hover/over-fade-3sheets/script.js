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

	$(".menu li").append("<p class='border' style='display: none'>&nbsp;</p>")
	$(".menu li").hover(function(){
		$(this).find(".border").css("display","block");
		$(this).find(".border").css("border","2px solid #a11093");
		$(this).find(".border").css({ opacity: 0.1 });
		$(this).find(".border").stop(true,true).fadeTo(500,1.0);
	
	},function(){
		$(this).find(".border").stop(true,true).fadeTo(200,0.0);
	});
	
	$(".menu li.other").hover(function(){
		$(this).find(".border").css("display","none");
		$(this).find(".border").css("border","none");
	});
});
