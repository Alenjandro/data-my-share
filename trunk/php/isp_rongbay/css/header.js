var clicked = false;
var clicked1 = false;

function fn_click_chooseCityButton(value){	
	//jQuery("#chooseCityButton").click(function () {
	jQuery("#chooseCity").slideToggle("fast");
	jQuery("#chooseCat").slideUp("fast");
	jQuery("#chooseCatButton").removeClass("btnHmenuMoreCurrent").addClass("btnHmenuMore");
	if (value.className == 'otherHover'){
		jQuery(value).removeClass("otherHover").addClass("otherCurrent");
		clicked1 = true;
	}
	else if (clicked1 == true){
		jQuery(value).removeClass("otherCurrent").addClass("other");
	}		
	//});
}

function fn_over_chooseCityButton(value){
	jQuery(value).addClass("otherHover").removeClass("other");
}

function fn_out_chooseCityButton(value){
	jQuery(value).addClass("other").removeClass("otherHover");
}

function fn_click_boxClose(){	
	//jQuery("img.boxClose").click(function () {
	jQuery("#chooseCity").slideUp("fast");
	jQuery("#chooseCat").slideUp("fast");
	jQuery("#chooseCatButton").addClass("btnHmenuMore").removeClass("btnHmenuMoreCurrent");
	jQuery("#chooseCityButton").removeClass("otherCurrent").addClass("other");	
	//});
}

function fn_over_boxClose(value){
	jQuery(value).css({cursor:"pointer"});
}

function fn_out_boxClose(value){
	jQuery(value).css({cursor:"none"});
}

function fn_over_City(value){
	jQuery(value).addClass("CityHover").removeClass("City");
}

function fn_out_City(value){
	 jQuery(value).addClass("City").removeClass("CityHover");
}

jQuery(document).ready(function() {							
  //jQuery('#top_link').mouseover(function () {jQuery(this).css('backgound', '#0085cf')});  
});

