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


// ACTIVE LINK ANCHOR
	$('.lNav li a').click(function(){
		/* Danh cho Link trang nay qua trang khac, khac class
		var urlHash = location.hash;
		var classHash = urlHash.slice(1);
		$('.lNav li a').removeClass();
		$(this).addClass(classHash);*/
		
		
		/* Danh cho Link trong trang, khac class */
		/*var urlAttr = $(this).attr('href');
		var classAttr = urlAttr.slice(1);
		$('.lNav li a').removeClass();
		$(this).addClass(classAttr);*/
		
		
		/* Danh cho Link trong trang, giong class */
		var urlAttr = $(this).attr('href');
		var classAttr = urlAttr.slice(1);
		$('.lNav li a').removeClass();
		$(this).addClass('active');
	})
	
});

