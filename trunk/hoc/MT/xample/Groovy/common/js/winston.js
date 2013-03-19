$(document).ready(function() {

	$('code').each(function(){
		$(this).html($.trim($(this).html()));
	});
	
	$('.lightbox').lightbox({
		fileLoadingImage: '../guarantee/images/loading.gif',
		fileBottomNavCloseImage: '../guarantee/images/ico_close.gif'
	});
	
});

ChiliBook.recipeFolder     = "/wp-content/themes/winston/js/chili/";
ChiliBook.stylesheetFolder = "/wp-content/themes/winston/js/chili/";