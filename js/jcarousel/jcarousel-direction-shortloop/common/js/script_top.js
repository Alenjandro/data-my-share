$(function(){	
	 $(document).delegate(".hover", "hover", function() {
			$(".hover").hover(function(){
			 $(this).css('opacity', 0.5);
		  },function(){
			  $(this).css('opacity', 1);
		});
	});
});
