$(function(){
	
	String.prototype.replaceAll = function(
	strTarget,
	strSubString
	){
	var strText = this;
	var intIndexOfMatch = strText.indexOf( strTarget );
	 
	while (intIndexOfMatch != -1){
	strText = strText.replace( strTarget, strSubString )
	 
	intIndexOfMatch = strText.indexOf( strTarget );
	}
	return( strText );
	}
	
	$('.fieldChange .review').hide();
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
			$('.fieldButton button').html("Nhap text");	
			
			
			var txtVal = $('textarea').val();
			var matchTxt = txtVal.match("\n");
			if(matchTxt==null){
				$('.fieldChange .review').html(txtVal);	
			}else{
				var reTxt = txtVal.replaceAll("\n","<br />");		
				$('.fieldChange .review').html(reTxt);
			}
			
			$('textarea').hide();
			var boxH = $('textarea').height();
			$('.fieldChange .review').css('height',boxH);
			$('.fieldChange .review').show();
		}
	})
});