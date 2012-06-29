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
		$(".styleList li:odd").addClass("right");

	
	$('ul.tabList .tab01').click(function(){
		$("ul.info li").show();
	});
	
	$('ul.tabList .tab02').click(function(){
		$("ul.info li").hide();
		$(".style03").show();
	});
	
	$('ul.tabList .tab03').click(function(){
		$("ul.info li").hide();
		$(".style02").show();
	});
	
	$('ul.tabList .tab04').click(function(){
		$("ul.info li").hide();
		$(".style01").show();
	});
	
	$('ul.tabList .tab05').click(function(){
		$("ul.info li").hide();
		$(".style04").show();
	});
	
	$('ul.tabList .tab06').click(function(){
		$("ul.info li").show();
		$(".style01").hide();
		$(".style02").hide();
		$(".style03").hide();
		$(".style04").hide();
	});
	
});

