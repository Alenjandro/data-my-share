$(function(){
	/*$.maxCheck = function(val1, val2){
		var maxH = val1;
		if(val2>val1){maxH = val2}
		return maxH;
	}
	
	function kUp(valKey){
		valKey.keyup(function () { 
			var valueAll = $(this).val();
			var valEnd = $('#review').html(valueAll);
		}).keyup();
		return $('#review').html();
	}
	
	var se01 = $('#size01');
	
	var val01 = kUp(se01);
	$('.source pre').html('size01:' + val01);*/
	/*$.valF = function(){
		var val01 = 1;
		var val02 = 2;
		var val03 = 3;
	}
	
	
	
	$('button').click(function(){
		kUp;
		$('#review').html(val01);
	});*/
	
	String.prototype.replaceAll = function(
	strTarget, // The substring you want to replace
	strSubString // The string you want to replace in.
	){
	var strText = this;
	var intIndexOfMatch = strText.indexOf( strTarget );
	 
	// Keep looping while an instance of the target string
	// still exists in the string.
	while (intIndexOfMatch != -1){
	// Relace out the current instance.
	strText = strText.replace( strTarget, strSubString )
	 
	// Get the index of any next matching substring.
	intIndexOfMatch = strText.indexOf( strTarget );
	}
	 
	// Return the updated string with ALL the target strings
	// replaced out with the new substring.
	return( strText );
	}
	
	$('.fieldButton button').click(function(){
		var btnVal = $(this).val();
		if(btnVal == "Ok"){
			$('.fieldButton button').val("inputTxt")
			$('.fieldButton button').html("Ok");
			$('textarea').show();
			$('textarea').focus();
			$('.review').hide();
		}else if(btnVal == "inputTxt"){
			$('.fieldButton button').val("Ok")
			var txtVal = $('textarea').val();
			var reTxt = txtVal.replaceAll("\n","<br />");
			var boxH = $('textarea').height();
			$('.review').html(reTxt);
			$('.fieldButton button').html("Nhap text");			
			$('textarea').hide();
			$('.review').css('height',boxH);
			$('.review').show();
		}
	})
});