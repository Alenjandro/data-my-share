$(function() {
	//tab
	$('#entryMemberTab').tab();
	
	//complete::slide
	var csma = $('#completeSkillMatchArea');
	var csmaSlideKey = $('#completeSkillMatchArea a.base');
	
	csmaSlideKey.each(function() {
		var $_t = $($(this).attr('href')).find('.detailList');
		$(this).toggleRelContent($_t, {effect: true});
	});
	
	//resume::clone item
	$('.fmCloneContent a').click(function() {
	 	var $self = $(this);
		var $id = $(this).attr('href');
		var $tBase = $($id);
		
		if($tBase.length < 0) {
			return false;
		}
		
		var $tItem = $tBase.find('> li');
		var $tItemEx = $tItem.filter(':first-child');
		var $tItemLen = $tItem.length;
		var $tClone = $tItemEx.clone();
		
		$tClone.find('label,input,select').each(function() {
			var $_t = $(this);
			var $oname = $_t.attr('name');
			var $oid = $_t.attr('id');
			var $ofor = $_t.attr('for');
			var $ovalue = $_t.attr('value');
			var tag = $_t.get(0).nodeName.toLowerCase();
			
			if(tag === 'label') {
				$_t.attr('for', $ofor.replace(/([a-zA-Z0-9]+)[0-9]+/, '$1' + ($tItemLen + 1)));
			} else if(tag === 'select') {
				var $_opt = $_t.find('option').removeAttr('selected');
				$_opt.filter(':first-child').attr('selected', 'selected');
			} else if (tag === 'input') {
				$_t.attr('value', '');
			}
			
			if($oname) {
				$_t.attr('name', $oname.replace(/([a-zA-Z0-9]+)[0-9]+/, '$1' + ($tItemLen + 1)));
			}
			
			if($oid) {
				$_t.attr('id', $oid.replace(/([a-zA-Z0-9]+)[0-9]+/, '$1' + ($tItemLen + 1)));
			}
			
		});
		
		$tBase.append($tClone);
		
		return false;
	});
	
	//template
	var expTemplLabel = new Array(
		"ソフトウェア関連エンジニア",
		"機械設計エンジニア/回路設計エンジニア",
		"半導体関連",
		"電気通信技術関連/生産技術/品質・生産管理",
		"セールス・サービスエンジニア/FAE",
		"人事総務",
		"経理",
		"マーケティング/広報",
		"経営企画",
		"事務",
		"アシスタント",
		"法人営業/個人営業/IT営業",
		"販売・サービス関連職",
		"ITコンサルタント",
		"コンサルタント",
		"建築・設備、土木関連",
		"Webデザイナー"
	);
	
	var expTemplContents = new Array (
"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n　　《プロジェクト概要》\n\n\n　　■プロジェクト期間：▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n　　■業務内容\n\n\n　　■開発工程\n\n\n　　■役割\n\n\n　　■開発規模\n\n\n　　■開発環境\n\n\n　　　　[機種]\n\n\n　　　　[OS]\n\n\n　　　　[言語]\n\n\n　　　　[アプリケーション]\n\n\n【実績・業務成果】\n\n\n【得意分野】\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n《プロジェクト概要》\n\n\n　■業務内容\n\n\n　■担当業務\n\n\n　■役割\n\n\n　■開発規模\n\n\n　■開発環境\n\n\n【実績・業務成果】\n\n\n【取得技術】\n\n\n【得意分野】\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n《プロジェクト概要》\n\n\n　■業務内容\n\n\n　■担当業務\n\n\n　■役割\n\n\n　■開発規模\n\n\n　■開発環境\n\n\n　■主な開発製品/ツール\n\n\n【実績・業務成果】\n\n\n【取得技術】\n\n\n【得意分野】\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n《プロジェクト概要》\n\n\n　■業務内容\n\n\n　■担当業務\n\n\n　■役割\n\n\n【実績・業務成果】\n\n\n【取得技術】\n\n\n【取得資格】\n\n\n▲▽▲▽年▲▽月取得\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n《プロジェクト概要》\n\n\n　■業務内容\n\n\n　■担当業務\n\n\n　■役割\n\n\n　■取り扱い製品\n\n\n【実績・業務成果】\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n　■業務内容\n\n\n　　《採用業務》\n\n\n　　　　[担当業務]\n\n\n　　　　[規模]\n\n\n　　　　[実績]\n\n\n　　《給与管理》\n\n\n　　《労務》\n\n\n　　《人事制度企画》\n\n\n　　《教育・研修》\n\n\n　　《総務関連》\n\n\n　■役割\n\n\n【実績・業務成果】\n\n\n【得意分野】\n\n\n【マネジメント経験】\n\n\n【PCスキル】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n　■業務内容\n\n\n　■役割\n\n\n　■管理ツール(ソフト)\n\n\n【実績・業務成果】\n\n\n【得意分野】\n\n\n【マネジメント経験】\n\n\n【PCスキル】\n\n\n【取得資格】\n\n\n▲▽▲▽年▲▽月取得\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n　■業務内容\n\n\n　■役割\n\n\n　■規模\n\n\n【実績・業務成果】\n\n\n【マネジメント経験】\n\n\n【PCスキル】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n　■業務内容\n\n\n　■役割\n\n\n【実績・業務成果】\n\n\n【マネジメント経験】\n\n\n【PCスキル】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n【実績・業務成果】\n\n\n【PCスキル】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n　■業務内容\n\n\n　■役割\n\n\n【実績・業務成果】\n\n\n【PCスキル】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n《プロジェクト概要》\n\n\n　[担当製品（サービス）の概要]\n\n\n　[営業スタイル]　新規開拓▲▽％　、既存顧客▲▽％\n\n\n　[担当エリア]\n\n\n　[取引顧客]　担当社数▲▽件～▲▽件\n\n\n　[担当（顧客の業種・エリア）]\n\n\n　[実績]　▲▽▲▽年度売上実績：▲▽▲▽万円（達成率▲▽％）\n\n\n【業務成果】\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n【業務成果】\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n【保有資格】\n\n\n▲▽▲▽年▲▽月取得\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n《プロジェクト概要》\n\n\n　■業務内容\n\n\n　■役割\n\n\n　■規模\n\n\n　■開発環境\n\n\n　　　[機種]\n\n\n　　　[OS]\n\n\n　　　[言語]\n\n\n　　　[アプリケーション]\n\n\n【実績・業務成果】\n\n\n【得意分野】\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n《プロジェクト概要》\n\n\n　■業務内容\n\n\n　■役割\n\n\n　■規模\n\n\n【実績・業務成果】\n\n\n【得意分野】\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n《プロジェクト概要》\n\n\n　■業務内容\n\n\n　■役割\n\n\n　■規模\n\n\n【業務成果】\n\n\n【マネジメント経験】\n\n\n【アピールポイント】\n\n\n【保有資格】\n\n\n▲▽▲▽年▲▽月取得\n\n\n",
		"【事業内容】\n\n\n【職務経歴要約】\n\n\n【所属歴】\n\n\n▲▽▲▽年▲▽月\n\n\n【職務経歴詳細】\n\n\n▲▽▲▽年▲▽月～▲▽▲▽年▲▽月\n\n\n《プロジェクト概要》\n\n\n　■業務内容\n\n\n　■役割\n\n\n　■規模\n\n\n　■使用ツール\n\n\n【業務成果】\n\n\n【マネジメント経験】\n\n\n【PCスキル】\n\n\n【得意分野】\n\n\n【アピールポイント】\n\n\n"
	);
	
	var $expTemplTextArea = $('#fmCareerDutyContent');
	var $expTemplSelect = $('<select>').attr({name: 'fmCareerDutyTemplate', id: 'fmCareerDutyTemplate'});
	var $expTemplBtn = $('<a>').attr({'href': '#', 'class': 'btn1 arrowRBtn'}).append('<span>雛形を呼び出す</span>');
	var $expTemplNotice = $('<p>').addClass('note').html('※［▲▽］が入力フォームに残っていると、保存することができません。');
	
	
	$expTemplSelect.append(
						$('<option>')
							.attr('value', 0)
							.html('選択してください')
					);
	
	for(var i = 1, len = expTemplLabel.length; i <= len; i++) {
		$expTemplSelect.append(
							$('<option>')
								.attr('value', i)
								.html(expTemplLabel[i])
						);
	}
	
	$expTemplBtn.click(function() {
		var _selectedIndex = $expTemplSelect.find('option:selected').attr('value');
		
		if(_selectedIndex == 0) {
			alert('プルダウンで雛型を選択してください。');
			return false;
		} else {
			if($expTemplTextArea.attr('value').length > 0) {
				if( !window.confirm("職務内容を選択された雛型で上書きします。よろしいですか？")) {
					return false;
				}
			}
			
			$expTemplTextArea
				.attr('value', expTemplContents[_selectedIndex - 1])
				.trigger('keyup');
			
			//form update
			if($expTemplTextArea.hasClass('fmCountArea')) {
				$expTemplTextArea.trigger('keyup');
			}
			
		}
		
		return false;
	});
	
	$expTemplTextArea.parent().before($expTemplSelect, $expTemplBtn, $expTemplNotice);
	
	
});