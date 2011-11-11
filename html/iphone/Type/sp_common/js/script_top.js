$(function() {
	
	//slide toggle
	var slideKey = $('#indexNav > ul > li a.base');
	
	slideKey.each(function() {
		$(this).toggleRelContent($(this).next(), {effect:true});	
	});
	
	// toggle
	$('#indexNMemberNav2 > a').toggleRelContent();
	
});
