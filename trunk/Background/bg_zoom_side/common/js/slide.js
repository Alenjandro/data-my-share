$(function(){
		   
	$('.biggerLink').biggerlink();
		   
	$("#gallery").append('<p class="bgGallery"></p>');
	
	$('#pane1').jScrollPane();
		   
	$('#wrapSupersize').append('<div id="supersized"></div>');
	
	$.fn.supersized.options = {  
			startwidth: 1200,  
			startheight: 800,
			vertical_center: 1,
			slideshow: 1,
			navigation: 1,
			thumbnail_navigation: 1,
			transition: 1, //0-None, 1-Fade, 2-slide top, 3-slide right, 4-slide bottom, 5-slide left
			pause_hover: 0,
			slide_counter: 1,
			slide_captions: 1,
			slide_interval: 5000,
			slides : [
				{image : 'images/img_main01.jpg', title : '', url : 'javascript:;'},
				{image : 'images/img_main02.jpg', title : '', url : 'javascript:;'},
				{image : 'images/img_main03.jpg', title : '', url : 'javascript:;'},
				{image : 'images/img_main04.jpg', title : '', url : 'javascript:;'},
				{image : 'images/img_main05.jpg', title : '', url : 'javascript:;'},
				{image : 'images/img_main06.jpg', title : '', url : 'javascript:;'}
			]
	};
	$('#supersized').supersized();
	
	/*$('#next').hover(function() {
		$(this).addClass('next');
	},
	function() {
		$(this).removeClass('next');	  
	});
	
	$('#previous').hover(function() {
		$(this).addClass('previous');
	},
	function() {
		$(this).removeClass('previous');	  
	});*/
	
		
});