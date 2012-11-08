$(function() {
	var $base = $('#jobOfferDetailInfo');
	var $slideTrigger = $base.find('h2 .base');

	
	//JobOfferDetail slide menu
	$slideTrigger.each(function() {
		var $_inner = $(this).parent().next('.innerNav, .innerContent');
		$(this).toggleRelContent($_inner,{effect: true});
		
		if($_inner.hasClass('innerNav')) {
			$_inner.find('> dt a').each(function() {
				$(this).toggleRelContent($(this).parent().next('dd'), {effect: true});
			});
		}
	});
	
	var $dtslideTrigger = $base.find('dt.base');

	
	//JobOfferDetail slide menu
	$dtslideTrigger.each(function() {
		var $_inner = $(this).next('dd');
		$(this).toggleRelContent($_inner,{effect: true});
	});
	
/*	$('dt.base').toggle(
							function(){
								$(this).next('dd').slideDown('fast');
								$(this).css('background','yellow');
							},
							function(){
								$(this).next('dd').slideUp('fast');
								$(this).css('background','yellow');
							}
	);*/
	
	
	//続きを読むボタンの追加
	var $moreInfo = $('.moreInfo');
	var $showInfo = $('.showInfo');
	var $moreBtn = $('<p>')
						.addClass('moreBtn')
						.append(
							$('<a>')
								.attr('href', '#')
								.addClass('btn1 arrowBtmBtn')
								.append(
									$('<span>').text('続きを読む')
								)
						);
						
	var $moreTextBtn = $('<p>')
						.addClass('detail')
						.append(
							$('<a>')
								.attr('href', '#')
								.addClass('aPlusL')
								.append(
									$('<span>').text('さらに詳しく設定')
								)
	);
	
	$moreInfo
		.each(function() {	
			var $_t = $(this).find('.hiddenTxt');//クラス名をつける場合		
			var $_btn = $moreBtn.clone().insertAfter($(this));
			
			$_btn
				.find('a')
				.toggleRelContent($_t, {}, function() {
					var $_t = $(this);
					if($_t.hasClass('open')) {
						$_t.removeClass('arrowBtmBtn').addClass('arrowTopBtn');;
						$_t.find('span').text('閉じる');
					} else {
						$_t.removeClass('arrowTopBtn').addClass('arrowBtmBtn');
						$_t.find('span').text('続きを読む');
						window.scrollTo($_t.offset().left, $_t.offset().top);
					}
				});
		});
		
	$showInfo
		.each(function() {	
			if($(this).is('.hiddenTxt')){
				var $_t =$(this);
			}
			else {
				var $_t = $(this).find('.hiddenTxt');
			}//クラス名をつける場合		
			var $_btn = $moreBtn.clone().insertAfter($(this));
			
			$_btn
				.find('a')
				.toggleRelContent($_t, {effect:true}, function() {
					var $_t = $(this);
					if($_t.hasClass('open')) {
						$_t.removeClass('arrowBtmBtn').addClass('arrowTopBtn');;
						$_t.find('span').text('閉じる');
					} else {
						$_t.removeClass('arrowTopBtn').addClass('arrowBtmBtn');
						$_t.find('span').text('続きを読む');
						window.scrollTo($_t.offset().left, $_t.offset().top);
					}
				});
		});
		
	
	var $btnSet = $('.btnSet li a.btn4');
		$btnSet.each(function() {
		$(this).toggleRelContent($(this).parents().next('.inner'), {effect:true});
	});
	
	//検討中リスト
	var $consListBtn = $('.considerationListBtn a');
	$consListBtn.each(function() {
		$(this).toggleRelContent($(this).parent().next(), {effect:true});
	});
	
/*	var $checkMoreBtn = $('.checkMoreBtn a');
	$checkMoreBtn.each(function() {
		$(this).toggleRelContent($(this).parents().find(".checkMore"), {effect:true});
	});*/
	
	$('.checkMoreBtn a').toggle(
							function(){
								var nId2 = $(this).parent('.checkMoreBtn').attr('id');
								$(this).parent().prev('table').find('.checkMore').slideDown();
								$(this).removeClass('aPlusL');
								$(this).addClass('aArrow7');
								$(this).text('閉じる');
								$(this).parent().prev('.checkMore').slideDown();
								$(this).parent().prev('dl').find('.checkMore').slideDown();
								$(this).addClass('clicked');
							},
							function(){
								var nId2 = $(this).parent('.checkMoreBtn').attr('id');
								$(this).parent().prev('table').find('.checkMore').slideUp();
								$(this).parent().prev('.checkMore').slideUp();
								$(this).parent().prev('dl').find('.checkMore').slideUp();
								if($(this).is('.clicked')){
									$(this).removeClass('.clicked');
									$(this).addClass('aPlusL');
									$(this).removeClass('aArrow7');
									$(this).text('さらに詳しく設定');
									setTimeout(function(){location.href='#'+nId2},'900');
								}

							}
	);
	
	
	$('#textMore').each(function(){
		s = $(this).text();
		if (s.length > 7) {
			subText = s.substring(0,7) + '…';
			$(this).html(subText);
		}
		
	});
	
	$('.moreLine').each(function(){
		s = $(this).text();
		if (s.length > 23) {
			subText = s.substring(0,23) + '…';
			$(this).html(subText);
		}
		
	});

});