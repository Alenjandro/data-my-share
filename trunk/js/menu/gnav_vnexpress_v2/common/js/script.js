$(function(){
		
		$('#gNav dd ul:eq('+0+') li').each(function(){
			if($(this).find('img').css('visibility')=='hidden'){
				var i= $(this).attr('id');
				$(this).parents('#gNav').find('ul.' + i).addClass('show active');
			}
		});
		
		$('#gNav dd ul:eq('+0+') li').mouseover(function(){
			if($(this).parents('#gNav').find('ul').is('.show')){
				$(this).parents('#gNav').find('ul').removeClass('show');	
			}
			var $_id = $(this).attr('id');
			$(this).parents('#gNav').find('ul.'+ $_id).addClass('show');
		});


		$('#gNav dd').mouseleave(function(){			
			$(this).parents('#gNav').find('ul').removeClass('show');
			// ul show default
			$(this).parents('#gNav').find('ul.active').addClass('show');
		});

});
