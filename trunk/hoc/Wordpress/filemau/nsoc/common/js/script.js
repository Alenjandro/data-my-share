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
	
	$('#fontSwitch').append('<script type="text/javascript">documenttextsizer.setup("texttoggler")</script>');
	
	var L=$("ul.lNavNews li").length;
	$("ul.lNavNews li:eq("+(L-1)+")").addClass('lNavLast');
	
});


function formSubmit(frm)
{
document.getElementById(frm1).submit();
}