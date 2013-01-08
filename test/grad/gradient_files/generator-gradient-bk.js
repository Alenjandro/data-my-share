$(function(){
		
	$("#cGradient01,#cGradient0n").change(function() {
   		var cb = $("#cGradient01").val();
		var cbn = $("#cGradient0n").val();
		$('#review').css('background-color','#'+cb);	
		//$('#review').css('background-image','linear-gradient(bottom, #0000ff 30%, #330000 70%)');
		$('#review').css({'background-image' : '-moz-linear-gradient(30% 70% 90deg,' + '#' + cb + ', #' + cbn + ')'});
		$('#review').css({'background-image' : '-ms-linear-gradient(30% 70% 90deg,' + '#' + cb + ', #' + cbn + ')'});
		$('#review').css({'background-image' : '-o-linear-gradient(bottom, #' + cb + ' 30%, #' + cbn + ' 70%)'});
		$('#review').css('background-image', '-webkit-gradient(linear, left top, left bottom, from(#'+ cb +'), to(#' + cbn + '))');
		$('.generator input').keyup(function () {
			var tl = $('.tlRadius input').val();
			var tr = $('.trRadius input').val();
			var bl = $('.blRadius input').val();
			var br = $('.brRadius input').val();
			var valueH = $('.hRadius input').val();
			var valueW = $('.wRadius input').val();
			var wb = $('#wBorder').val();
			function displayVals(){
				var sValue = $('#sBorder').val();
				$('.styleCode pre').html("height: "+ valueH +"px; <br />"+
				"width: "+ valueW +"px; <br />"+
				"border: " + wb + "px " + sValue + " #" + cb + "; <br />"+
				"border-radius: "+ tl +"px " + tr +"px "+ bl +"px " + br +"px; <br />"+
				"-moz-border-radius: "+ tl +"px " + tr +"px "+ bl +"px " + br +"px; <br />"+
				"-webkit-border-radius: "+ tl +"px " + tr +"px "+ bl +"px " + br +"px;");
			}
			$("#sBorder").change(displayVals);
			displayVals();
			
		}).keyup();
	});
});

$(function(){
	// configuration
	var minH = 30;
	var maxH = 600;
	
	var minW = 30;
	var maxW = 600;
	
	var maxR = 1000;
	
	var maxWBdr = 100;
	
	// Chi chap nhan nhap so
	$(".generator input").keydown(function(event) {
 
        if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
            return;
        }
        else {
 
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                event.preventDefault();
            }
        }
    });
	
	// Chieu cao nho nhat 30px lon nhat 600px
	$('.hRadius input').keyup(function () {
    	var valueH = $(this).val();
		
		if(valueH >maxH){
			$(this).val(maxH);
    		$("#review").css("height", maxH+'px');
		}else if(valueH == "" || valueH < minH){
			$(this).val(minH);
			$("#review").css("height", minH+'px');
		}else{$("#review").css("height", valueH+'px');}
    }).keyup();
	
	// Chieu rong nho nhat 30px lon nhat 600px
	$('.wRadius input').keyup(function () {
    	var valueW = $(this).val();
		
		if(valueW >maxW){
    		$("#review").css("width", maxW+'px');
			$(this).val(maxW);
		}else if(valueW == "" || valueW <= minW){
			$("#review").css("width", minW+'px');
			$(this).val(minW);
		}else{$("#review").css("width", valueW+'px');}
    }).keyup();
	
	// Neu gia tri nhap la rong thi gia tri tra ve la 0
	$(".zeroBack input").keyup(function () {
		var cornerInput = $(this).val();
		if(cornerInput == ""){
			$(this).val(0);
		}
	}).keyup();
	
	$(".maxBack input").keyup(function () {
		var cornerInput = $(this).val();
		if(cornerInput >= maxR){
			$(this).val(1000);
		}
	}).keyup();
	
	/*// Tinh va gan gia tri cho border-radius
	$('.tlRadius input').keyup(function () {
    	var tl = $(this).val();
		$(".allRadius input").val("");
    	$("#review").css("border-top-left-radius", tl+'px');
    }).keyup();
	
	$('.trRadius input').keyup(function () {
    	var tr = $(this).val();
		$(".allRadius input").val("");
    	$("#review").css("border-top-right-radius", tr+'px');
    }).keyup();
	
	$('.blRadius input').keyup(function () {
    	var bl = $(this).val();
		$(".allRadius input").val("");
    	$("#review").css("border-bottom-left-radius", bl+'px');
    }).keyup();
	
	$('.brRadius input').keyup(function () {
    	var br = $(this).val();
		$(".allRadius input").val("");
    	$("#review").css("border-bottom-right-radius", br+'px');
    }).keyup();
	
	$('.allRadius input').keyup(function () {
    	var valueAll = $(this).val();
		if(valueAll != ""){
			$(".corner input").val(valueAll);
    		$("#review").css("border-radius", valueAll+'px');
		}
    }).keyup();
	
	// Style cho border
	$('#wBorder').keyup(function () {
    	var wb = $(this).val();
		if(wb >= maxWBdr){
			$(this).val(maxWBdr);
    		$("#review").css("border-width", maxWBdr +'px');
		}else $("#review").css("border-width", wb+'px');
    }).keyup();
	
	function displayVals(){
		var sValue = $('#sBorder').val();
		$("#review").css("border-style", sValue);
	}
	$("#sBorder").change(displayVals);
    displayVals();*/
	
	//var cb = $.jPicker.List[0].color.active.val('hex'); $('#review').html(cb);
	//$("#review").css({
//              backgroundColor: hex && '#' + hex || 'transparent'
//            });
	
	$('.generator input').keyup(function () {
		var tl = $('.tlRadius input').val();
		var tr = $('.trRadius input').val();
		var bl = $('.blRadius input').val();
		var br = $('.brRadius input').val();
		var valueH = $('.hRadius input').val();
		var valueW = $('.wRadius input').val();
		var wb = $('#wBorder').val();
		function displayVals(){
			var sValue = $('#sBorder').val();
			$('.styleCode pre').html("height: "+ valueH +"px; <br />"+
			"width: "+ valueW +"px; <br />"+
			"border: " + wb + "px " + sValue + " #FF0000" + "; <br />"+
			"border-radius: "+ tl +"px " + tr +"px "+ bl +"px " + br +"px;<br />"+
			"-moz-border-radius: "+ tl +"px " + tr +"px "+ bl +"px " + br +"px;<br />"+
			"-webkit-border-radius: "+ tl +"px " + tr +"px "+ bl +"px " + br +"px;");
		}
		$("#sBorder").change(displayVals);
		displayVals();
		
	}).keyup();
});