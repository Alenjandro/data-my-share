/*
Supersized - Fullscreen Slideshow jQuery Plugin
Version 3.0
By Sam Dunn (www.buildinternet.com // www.onemightyroar.com)
Version: supersized.3.0.js
Website: www.buildinternet.com/project/supersized
*/

(function($){

	//Resize image on ready or resize
	$.fn.supersized = function() {
		
		
		
		$.inAnimation = false;
		$.paused = false;
		
		var options = $.extend($.fn.supersized.defaults, $.fn.supersized.options);
		$.currentSlide = options.start_slide - 1;
		
		
		$(window).bind("load", function(){
			
			$('#loading').hide();
			$('#supersized').fadeIn('fast');
			
			$('#controls-wrapper').show();
			
			if (options.thumbnail_navigation == 1){
			
				/*****Set up thumbnails****/
				//Load previous thumbnail
				$.currentSlide - 1 < 0  ? prevThumb = options.slides.length - 1 : prevThumb = $.currentSlide - 1;
				//$('#prevthumb').show().html($("<img/>").attr("src", 'images/btn_prev.gif'));
				
				//Load next thumbnail
				$.currentSlide == options.slides.length - 1 ? nextThumb = 0 : nextThumb = $.currentSlide + 1;
				//$('#nextthumb').show().html($("<img/>").attr("src", 'images/btn_next.gif'));
		
			}
			
			$('#supersized').resizenow();
			
			
		});
		
				
		$(document).ready(function() {
			$('#supersized').resizenow(); 
		});
		
		//Pause when hover on image
		$('#supersized').hover(function() {
	   		if (options.slideshow == 1 && options.pause_hover == 1){
	   			if(!($.paused) && options.navigation == 1){
	   				$('#pauseplay').attr("src", "images/pause.png"); 
	   				clearInterval(slideshow_interval);
	   			}
	   		}
	   		if($.inAnimation) return false; //*******Pull title from array
	   	}, function() {
			if (options.slideshow == 1 && options.pause_hover == 1){
				if(!($.paused) && options.navigation == 1){
					$('#pauseplay').attr("src", "images/pause_dull.png");
					slideshow_interval = setInterval(nextslide, options.slide_interval);
				} 
			}
				//*******Pull title from array
	   	});
		
		$(window).bind("resize", function(){
    		$('#supersized').resizenow(); 
		});
		
		$('#supersized').hide();
		$('#controls-wrapper').hide();
	};
	
	//Adjust image size
	$.fn.resizenow = function() {
		var t = $(this);
		var options = $.extend($.fn.supersized.defaults, $.fn.supersized.options);
	  	return t.each(function() {
	  		
			//Define image ratio
			var ratio = options.startheight/options.startwidth;
			
			
			//Gather browser and current image size
			var imagewidth = t.width();
			var imageheight = t.height();
			var browserwidth = $(window).width();
			var browserheight = $(window).height();
			var offset;
			
			var width = $(window).width();
	        var height = $(window).height();
	        var width_half = width/2;
	
	        var cssNext = {
	                  'height' : height + 'px',
					  'position' : 'absolute',
					  'right' : 0,
					  'top' : 0,
					  'width' : width_half + 'px'
	              }
				  
			var cssPrevious = {
	                  'height' : height + 'px',
					  'position' : 'absolute',
					  'left' : 0,
					  'top' : 0,
					  'width' : width_half + 'px'
	              }

			//Resize image to proper ratio
			if ((browserheight/browserwidth) > ratio){
			    t.height(browserheight);
			    t.width(browserheight / ratio);
			    t.children().height(browserheight);
			    t.children().width(browserheight / ratio);
			} else {
			    t.width(browserwidth);
			    t.height(browserwidth * ratio);
			    t.children().width(browserwidth);
			    t.children().height(browserwidth * ratio);
			}
			if (options.vertical_center == 1){
				t.children().css('left', (browserwidth - t.width())/2);
				t.children().css('top', (browserheight - t.height())/2);
			}
			return false;
		});
	};
	
	
	
	$.fn.supersized.defaults = { 
			startwidth: 4,  
			startheight: 3,
			vertical_center: 1,
			slideshow: 0,
			navigation:1,
			thumbnail_navigation: 0,
			transition: 1, //0-None, 1-Fade, 2-slide top, 3-slide right, 4-slide bottom, 5-slide left
			pause_hover: 0,
			slide_counter: 1,
			slide_captions: 1,
			slide_interval: 5000,
			start_slide: 1
	};
	
	
})(jQuery);

