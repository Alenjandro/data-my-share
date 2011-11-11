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
	
	//続きを読むボタンの追加
	var $moreInfo = $('.moreInfo');
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
	
	/* iPhone4 parse error
	var $moreBtn = $('<p>', {
						class: 'moreBtn'
					})
					.append($('<a>', {
								href: '#',
								class: 'btn1 arrowBtmBtn',
							})
							.append($('<span>',{
										text: '続きを読む'
									})
							)
					);
	*/
	
	$moreInfo
		.each(function() {	
			var $_t = $(this);		
			var $_btn = $moreBtn.clone().insertAfter($(this));
			
			$_btn
				.find('a')
				.toggleRelContent($_t, {effect: true}, function() {
					var $_t = $(this);
					if($_t.hasClass('open')) {
						$_t.removeClass('arrowBtmBtn').addClass('arrowTopBtn');;
						$_t.find('span').text('閉じる');
					} else {
						$_t.removeClass('arrowTopBtn').addClass('arrowBtmBtn');
						$_t.find('span').text('続きを読む');
					}
				});
		});
	
	//検討中リスト
	var $consListBtn = $('.considerationListBtn a');
	$consListBtn.each(function() {
		$(this).toggleRelContent($(this).parent().next(), {effect:true});
	});
	
	
});