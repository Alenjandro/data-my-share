$(function(){
		
	$("#cGradient01,#cGradient0n").change(function() {
   		var cb = $("#cGradient01").val();
		var cbn = $("#cGradient0n").val();
		$('#review').css('background-color','#'+cb);	
		//$('#review').css('background-image','linear-gradient(bottom, #0000ff 30%, #330000 70%)');
		$('#review').css('background-image', '-moz-linear-gradient(30% 70% 90deg,' + '#' + cb + ', #' + cbn + ')');
		$('#review').css('background-image', '-ms-linear-gradient(30% 70% 90deg,' + '#' + cb + ', #' + cbn + ')');
		$('#review').css('background-image', '-o-linear-gradient(bottom, #' + cb + ' 30%, #' + cbn + ' 70%)');
		$('#review').css('background-image', '-webkit-gradient(linear, left top, left bottom, from(#'+ cb +'), to(#' + cbn + '))');
		$('.generator input').keyup(function () {
			var valueH = $('.hItem input').val();
			var valueW = $('.wItem input').val();
			var offset01 = $('#offset01').val();
			var offset02 = $('#offset02').val();
			var gStyle = $('input[name=gStyle]:checked').val();
			$('.styleCode pre').html("height: "+ valueH +"px; <br />"+
				"width: "+ valueW +"px; <br />"+
				"background-color: #cc0000; <br />"+
				"background: -moz-linear-gradient(bottom, #"+cb+" "+offset01+"%, #"+cbn+" "+offset02+"%);");/*+
				"background: -o-linear-gradient(bottom, #"+cb+" "+offset01+"%, #"+cbn+" "+offset02+"%); <br />"+
				"background: -ms-linear-gradient(bottom, #"+cb+" "+offset01+"%, #"+cbn+" "+offset02+"%); <br />"+
				"background: -webkit-gradient(linear,left bottom,left top,color-stop(0.3, #"+cb+"),color-stop(0.7, #"+cbn+"));");*/
				
				/*$('.tam').html("height: "+ valueH +"px;"+
				"width: "+ valueW +"px;"+
				"background-color: #"+cb+";"+
				"background-image: -moz-linear-gradient("+offset01+"% "+offset02+"% 90deg, #"+cb+", #"+cbn+");");*/
			$('#review').css('background-image', '-moz-linear-gradient('+offset01+'% '+offset02+'% 90deg,' + '#' + cb + ', #' + cbn + ')');
			$('#review').css('background-image', '-ms-linear-gradient('+offset01+'% '+offset02+'% 90deg,' + '#' + cb + ', #' + cbn + ')');
			$('#review').css('background-image', '-o-linear-gradient(bottom, #' + cb + ' '+offset01+'%, #' + cbn + ' '+offset02+'%)');
			$('#review').css('background-image', '-webkit-gradient(linear, left top, left bottom, from(#'+ cb +'), to(#' + cbn + '))');
			
			switch(gStyle)
			{
			case 'linear':
			  $('#review').css('background-image', '-moz-linear-gradient('+offset01+'% '+offset02+'% 90deg,' + '#' + cb + ', #' + cbn + ')');
			  break;
			case 'circle':
			  $('#review').css('background-image', '-moz-radial-gradient('+offset01+'% '+offset02+'% 90deg circle,' + '#' + cb + ', #' + cbn + ')');
			  break;
			case 'ellipse':
			  $('#review').css('background-image', '-moz-radial-gradient('+offset01+'% '+offset02+'% 90deg ellipse,' + '#' + cb + ', #' + cbn + ')');
			  break;
			default:
 			  $('#review').css('background-image', '-moz-linear-gradient('+offset01+'% '+offset02+'% 90deg,' + '#' + cb + ', #' + cbn + ')');
			} 
			
		}).keyup();
	});
});

$(function(){
	// configuration
	var minH = 30;
	var maxH = 600;
	
	var minW = 30;
	var maxW = 600;
	
	var max1000 = 1000;
	
	var max100 = 100;
	
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
	$('.hItem input').keyup(function () {
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
	$('.wItem input').keyup(function () {
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
		if(cornerInput >= max1000){
			$(this).val(1000);
		}
	}).keyup();
	
	$(".maxBackS input").keyup(function () {
		var cornerInput = $(this).val();
		if(cornerInput >= max100){
			$(this).val(100);
		}
	}).keyup();
	
	/*$('#offset01').keyup(function () {
		var attrVal = $('.tam').html();
		$('#review').css('background-image', '-moz-linear-gradient('+attrVal+')');
	}).keyup();*/
	
	/*$('#offset02').keyup(function () {
		var attrVal = $('.tam').html();
		$('#review').css({'background-image' : '-moz-linear-gradient('+attrVal+')'});
	}).keyup();*/
	
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
		if(wb >= max100){
			$(this).val(max100);
    		$("#review").css("border-width", max100 +'px');
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
	
	/*$('.generator input').keyup(function () {
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
		
	}).keyup();*/
});