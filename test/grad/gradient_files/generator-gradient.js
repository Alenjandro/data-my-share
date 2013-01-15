function positionL(gPos) {
	
}

$(function(){
		
	/*$("#cGradient01,#cGradient0n").change(function() {
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
			/*$('#review').css('background-image', '-moz-linear-gradient('+offset01+'% '+offset02+'% 90deg,' + '#' + cb + ', #' + cbn + ')');
			$('#review').css('background-image', '-ms-linear-gradient('+offset01+'% '+offset02+'% 90deg,' + '#' + cb + ', #' + cbn + ')');
			$('#review').css('background-image', '-o-linear-gradient(bottom, #' + cb + ' '+offset01+'%, #' + cbn + ' '+offset02+'%)');
			$('#review').css('background-image', '-webkit-gradient(linear, left top, left bottom, from(#'+ cb +'), to(#' + cbn + '))');
			
			
			
		}).keyup();
	});*/
	
	$(".gPosLinear button").click(function () {
		var gPos = $(this).val();
		var cb = $("#cGradient01").val();
		var cbn = $("#cGradient0n").val();
		$(".gPosLinear button").removeClass('active');
		$(this).addClass('active');
		$('#review').css('background-image', 'linear-gradient('+gPos+', #'+cb+' 0%, #'+cbn+' 100%)');
	});
	
	$(".gStyle button").click(function () {
		var gStyle = $(this).text();
		
		if(gStyle=="linear"){
			$('.gPosLinear').show();
			$('.gPosCircle, .gPosEllipse, .sizeOffset, .gSizeCircle, .gSizeEllipse').hide();
			var gPos = $(".gPosLinear button").val();
			$(".gPosLinear button").click(function () {
				var gPos = $(this).val();
				$(".gPosLinear button").removeClass('active');
				$(this).addClass('active');
				$('#review').css('background-image', 'linear-gradient('+gPos+', #cc0000 0%, #330000 100%)');
			});
			
			$('#review').css('background-image', 'linear-gradient('+gPos+', #cc0000 0%, #330000 100%)');
		}else if(gStyle=="circle"){
			$('.gPosCircle, .sizeOffset, .gSizeCircle').show();
			$('.gPosLinear, .gPosEllipse, .gSizeEllipse').hide();
			var gSize = $(".gSizeCircle button.active").val();
			var gPos = $(".gPosCircle button.active").val();
			
			$(".gPosCircle button").click(function () {
				var gPos = $(this).val();
				var gSize = $(".gSizeCircle button.active").val();
				$(".gPosCircle button").removeClass('active');
				$(this).addClass('active');
				$('#review').css('background-image', 'radial-gradient(circle '+gSize+' '+gPos+', #cc0000 0%, #330000 100%)');
			});
			
			$(".gSizeCircle button").click(function () {
				var gSize = $(this).val();
				var gPos = $(".gPosCircle button.active").val();
				$(".gSizeCircle button").removeClass('active');
				$(this).addClass('active');
				$('#review').css('background-image', 'radial-gradient(circle '+gSize+' '+gPos+', #cc0000 0%, #330000 100%)');
			});
			
			$('#review').css('background-image', 'radial-gradient(circle '+gSize+' '+gPos+', #cc0000 0%, #330000 100%)');
		}else if(gStyle=="ellipse"){
			$('.gPosEllipse, .sizeOffse, .gSizeEllipse').show();
			$('.gPosLinear, .gPosCircle, .gSizeCircle').hide();
			
			var gSize = $(".gSizeEllipse button.active").val();
			var gPos = $(".gPosCircle button.active").val();
			
			$(".gPosEllipse button").click(function () {
				var gPos = $(this).val();
				var gSize = $(".gSizeEllipse button.active").val();
				$(".gPosEllipse button").removeClass('active');
				$(this).addClass('active');
				$('#review').css('background-image', 'radial-gradient(ellipse '+gSize+' '+gPos+', #cc0000 0%, #330000 100%)');
			});
			
			$(".gSizeEllipse button").click(function () {
				var gSize = $(this).val();
				var gPos = $(".gPosEllipse button.active").val();
				$(".gSizeEllipse button").removeClass('active');
				$(this).addClass('active');
				$('#review').css('background-image', 'radial-gradient(ellipse '+gSize+' '+gPos+', #cc0000 0%, #330000 100%)');
			});
			
			$('#review').css('background-image', 'radial-gradient(ellipse '+gSize+' '+gPos+', #cc0000 0%, #330000 100%)');
			
		}else {
			$('.gPosLinear').show();
			$('.gPosCircle, .gPosEllipse, .sizeOffset, .posList').hide();
			$('#review').css('background-image', '-moz-linear-gradient(0% 100% 90deg, #cc0000, #330000)');
		}
	});
	
	$('input').change(function() {
		var cb = $("#cGradient01").val();
		var cbn = $("#cGradient0n").val();
		$('#review').css('background-image', '-moz-linear-gradient(0% 100% 90deg, #'+cb+', #'+cbn+')');
		$(".gStyle button").click(function () {
			var gStyle = $(this).text();
			if(gStyle=="linear"){
				var gPos = $(".gPosLinear button").val();
				$(".gPosLinear button").click(function () {
					var cb = $("#cGradient01").val();
					var cbn = $("#cGradient0n").val();
					var gPos = $(this).val();
					$('#review').css('background-image', 'linear-gradient('+gPos+', #'+cb+' 0%, #'+cbn+' 100%)');
				});
				$('#review').css('background-image', 'linear-gradient('+gPos+', #'+cb+' 0%, #'+cbn+' 100%)');
			}else if(gStyle=="circle"){
				var gSize = $(".gSizeCircle button.active").val();
				var gPos = $(".gPosCircle button.active").val();
				
				$(".gPosCircle button").click(function () {
					var gPos = $(this).val();
					var cb = $("#cGradient01").val();
					var cbn = $("#cGradient0n").val();
					var gSize = $(".gSizeCircle button.active").val();
					$('#review').css('background-image', 'radial-gradient(circle '+gSize+' '+gPos+', #'+cb+' 0%, #'+cbn+' 100%)');
				});
				
				$(".gSizeCircle button").click(function () {
					var gSize = $(this).val();
					var cb = $("#cGradient01").val();
					var cbn = $("#cGradient0n").val();
					var gPos = $(".gPosCircle button.active").val();
					$('#review').css('background-image', 'radial-gradient(circle '+gSize+' '+gPos+', #'+cb+' 0%, #'+cbn+' 100%)');
				});
				
				$('#review').css('background-image', 'radial-gradient(circle '+gSize+' '+gPos+', #'+cb+' 0%, #'+cbn+' 100%)');
			}else if(gStyle=="ellipse"){
				
				var gSize = $(".gSizeEllipse button.active").val();
				var gPos = $(".gPosCircle button.active").val();
				
				$(".gPosEllipse button").click(function () {
					var gPos = $(this).val();
					var cb = $("#cGradient01").val();
					var cbn = $("#cGradient0n").val();
					var gSize = $(".gSizeEllipse button.active").val();
					$('#review').css('background-image', 'radial-gradient(ellipse '+gSize+' '+gPos+', #'+cb+' 0%, #'+cbn+' 100%)');
				});
				
				$(".gSizeEllipse button").click(function () {
					var gSize = $(this).val();
					var cb = $("#cGradient01").val();
					var cbn = $("#cGradient0n").val();
					var gPos = $(".gPosEllipse button.active").val();
					$('#review').css('background-image', 'radial-gradient(ellipse '+gSize+' '+gPos+', #'+cb+' 0%, #'+cbn+' 100%)');
				});
				
				$('#review').css('background-image', 'radial-gradient(ellipse '+gSize+' '+gPos+', #'+cb+' 0%, #'+cbn+' 100%)');
			}else {
				$('#review').css('background-image', '-moz-linear-gradient(0% 100% 90deg, #'+cb+', #'+cbn+')');
			}
		});
			
	});
	
	$( ".offset > span.slider" ).each(function() {
		function refreshSwatch() {
			var valD = $(this).slider( "value" );
			$(this).next().html(valD);
			var hs = $('.hShadow').html();
			var vs = $('.vShadow').html();
			var bs = $('.bShadow').html();
			var cs01 = $('#cShadow').val();
			
			var bgc01 = $("#bgColor").val();
			var fc01 = $("#fColor").val();
			var fs01 = $('#fSize').val();
			
			$("#cShadow").change(function() {
				var cs= $("#cShadow").val();
				$('#review').css('text-shadow',hs+'px '+vs+'px '+bs+'px '+'#'+cs);
				
			});
			$('#review').css('text-shadow',hs+'px '+vs+'px '+bs+'px '+'#'+cs01);
			$('.sourceTxt pre').html('background: #'+bgc01+'; <br />'+
'font-size: '+fs01+'px; <br />'+
'color: #'+fc01+'; <br />'+
'text-shadow: #'+cs01+' '+hs+'px '+vs+'px '+bs+'px;');
		}
		
		var value = parseInt( $( this ).text(), 10 );
		$( this ).empty().slider({
			value: value,
			range: "min",
			value: 4,
			min: 0,
			max: 100,
			animate: true,
			orientation: "horizontal",
			slide: refreshSwatch,
			change: refreshSwatch
		});
		$(this).next().html($(this).slider( "value" ));
	});
});

$(function(){
	// configuration
	var min30 = 30;
	var max100 = 100;
	var max300 = 300;
	var max600 = 600;
	var max1000 = 1000;
	
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
		
		if(valueH >max300){
			$(this).val(max300);
    		$("#review").css("height", max300+'px');
		}else if(valueH == "" || valueH < min30){
			$(this).val(min30);
			$("#review").css("height", min30+'px');
		}else{$("#review").css("height", valueH+'px');}
    }).keyup();
	
	// Chieu rong nho nhat 30px lon nhat 600px
	$('.wItem input').keyup(function () {
    	var valueW = $(this).val();
		
		if(valueW >max600){
    		$("#review").css("width", max600+'px');
			$(this).val(max600);
		}else if(valueW == "" || valueW <= min30){
			$("#review").css("width", min30+'px');
			$(this).val(min30);
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