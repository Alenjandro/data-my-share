$j = jQuery;
$j(document).ready(function(){
	
	//hide message_body after the first one
	$j(".message_list .message_body:gt(0)").hide();
	
	//hide message li after the 5th
	$j(".message_list li:gt(50)").hide();

	
	//toggle message_body
	$j(".message_head").click(function(){
		$j(this).next(".message_body").slideToggle(500)
		return false;
	});

	//collapse all messages
	$j(".collpase_all_message").click(function(){
		$j(".message_body").slideUp(500)
		return false;
	});

	//show all messages
	$j(".show_all_message").click(function(){
		$j(this).hide()
		$j(".show_recent_only").show()
		$j(".message_list li:gt(4)").slideDown()
		return false;
	});

	//show recent messages only
	$j(".show_recent_only").click(function(){
		$j(this).hide()
		$j(".show_all_message").show()
		$j(".message_list li:gt(4)").slideUp()
		return false;
	});

});