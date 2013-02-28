
$(function(){
	
	var height = $(window).height();
	var width = $(window).width();
	var bodyH = $('body').height();
	var selectList = $('.selectList').height();
	var movie = $('.movieSection').height();
	
	$('body#login').css('height', height + 'px');
	if(height >= selectList) {
		$('body#select').css('height', height + 'px');
	}
		
	$('.movieSection').css('height', height + 'px');
	$('.movieImage img').css('height', height + 'px');
		
	if(width<=height) {
		$('.movieSection').css('height', height/2 + 'px');
		$('.movieImage img').css('height', 'auto');
	}
		 
	$(window).bind('orientationchange', function() {
		var height = $(window).height();
		var width = $(window).width();
		var bodyH = $('body').height();
		var selectList = $('.selectList').height();
		var movie = $('.movieSection').height();
	
		$('body#login').css('height', height + 'px');
		if(height >= selectList) {
			$('body#select').css('height', height + 'px');
		}
		
		$('.movieSection').css('height', height + 'px');
		$('.movieImage img').css('height', height + 'px');
		
		 if(width<=height) {
			$('.movieSection').css('height', height/2 + 'px');
			$('.movieImage img').css('height', 'auto');
		 }
	});
	
	$('.main .infoContent').hide();
	$('.main .arrowButton').click(function(e){
		$(this).toggleClass("active").next().slideToggle("slow").toggleClass('open');
		e.preventDefault();
	});
	
	$('.linkList li').each(function(index){
		$('.title').addClass('item0'+index);
		$('.title').removeClass('item00');
	});
	
	$('.linkList li').click(function() {
		if($(this).attr('class') != 'all') {
			var listItem = $('.linkList li');
			var eachItem = (listItem.index(this));
			var id = $('.item0' + eachItem);
			
			$('.linkList li').removeClass('active');
			$(this).addClass('active');
		
			if($('table th, table td').find('*').className != id){
				$('table th, table td').css('display','none');
				id.show();
			}
		
		} else {
			$('.linkList li').removeClass('active');
			$(this).addClass('active');
			$('table').find('td,th').show();
		}
		
		var Li = $(this).text();
		$('.infoContent .search span').html(Li);
	});
	
	$('.linkList li.all').click(function(){
		$('table').find('td,th').show();
	});
	
	$('.infoContent .search input').keyup(function () {     
 		this.value = this.value.replace(/[^1-9\.]/g,'');
	});
});