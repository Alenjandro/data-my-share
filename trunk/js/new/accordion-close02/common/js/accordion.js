function initMenu() {

	$('.accordinList dd').hide();
	
	$('.accordinList dt a').click(function(e) {
		var checkElement = $(this).parent().next();
		e.preventDefault();
		$('.accordinList dd .close a').click(function(e){
			e.preventDefault();
			$(this).parent().parent().slideUp('normal');
			$(this).parent().parent().parent().find('dt').removeClass('open');
			//$('html,body').scrollTop($(this).parents().parent().find('dt').offset().top);//scroll
	 	});	
    
      if((checkElement.is('dd')) && (checkElement.is(':visible'))) {
        	checkElement.slideUp('normal');
			$(this).parent().removeClass('open');
		 	//$(this).removeClass('open');
        }
      if((checkElement.is('dd')) && (!checkElement.is(':visible'))) {
		 if((checkElement.is('dd')) && (!checkElement.is(':visible'))) {

		 }
        checkElement.slideDown('normal');
		$(this).parent().addClass('open');
        return false;		
        }
		
      }
    );
  }
$(document).ready(function() {initMenu();});